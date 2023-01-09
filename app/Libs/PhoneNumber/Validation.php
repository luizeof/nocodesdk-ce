<?php

namespace App\Libs\PhoneNumber;

use Throwable;
use App\Libs\HandleData;
use League\ISO3166\ISO3166;
use Propaganistas\LaravelPhone\PhoneNumber;
use App\Exceptions\PhoneNumber\InvalidPhoneNumberException;

class Validation extends HandleData
{

    public function __construct($phone, $country)
    {
        $this->phone = ($phone);
        $this->country = ($country);
        return $this->handle();
    }

    public static function run($phone, $country = null)
    {
        return (new self($phone, $country))->getOutputData();
    }

    public function detectCountry()
    {
        if (strlen($this->country) > 0) {
            return [$this->country];
        }

        $countries = [];
        foreach ((new ISO3166) as $country) {
            if (isset($country['alpha2'])) {
                try {
                    $parser = PhoneNumber::make($this->phone, $country['alpha2']);
                    if ($parser->isOfCountry($country['alpha2'])) {
                        $countries[] = $country['alpha2'];
                    }
                } catch (Throwable $t) {
                    //
                }
            }
        }
        return $countries;
    }

    protected function handle()
    {
        try {
            $countries = $this->detectCountry();

            if (count($countries) == 0) {
                throw new InvalidPhoneNumberException('Invalid Phone Number: ' . $this->phone);
            }

            $items = [];
            foreach ($countries as $code) {
                $parser = PhoneNumber::make($this->phone, $code);
                $items[] = [
                    'validFormat' => true,
                    'E164' => $parser->formatE164(),
                    'International' => $parser->formatInternational(),
                    'RFC3966' => $parser->formatRFC3966(),
                    'National' => $parser->formatNational(),
                    'Country' => $parser->getCountry(),
                    'Type' => $parser->getType(),
                    'Numbers' => preg_replace('/[^0-9]/', '', $parser->formatE164()),
                    'Length' => strlen(preg_replace('/[^0-9]/', '', $parser->formatE164())),
                ];
            }

            $this->outputData = [
                'processed' => true,
                'data' => [
                    'success' => true,
                    'input' => $this->inputData,
                    'output' => (count($items) == 1) ? $items[0] : $items
                ]
            ];
        } catch (Throwable $exception) {
            $this->outputData = [
                'processed' => true,
                'data' => [
                    'success' => false,
                    'input' => $this->inputData,
                    'output' => [
                        'input' => $this->phone,
                        'Length' => strlen(preg_replace('/[^0-9]/', '', $this->phone)),
                        'validFormat' => false,
                        'error' => $exception->getMessage(),
                    ]
                ]
            ];
        }
    }
}
