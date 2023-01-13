<?php

namespace App\Libs\EmailAddress;

use Throwable;
use App\Libs\HandleData;
use EmailValidation\EmailValidatorFactory;

class BasicValidation extends HandleData
{

    public function __construct($email)
    {
        $this->email  = strtolower($email);

        return $this->handle();
    }

    public static function run($email): array
    {
        return (new self($email))->getOutputData();
    }

    protected function handle()
    {
        try {
            $data = (EmailValidatorFactory::create(($this->email)))
                ->getValidationResults()
                ->asArray();

            $data["email"] = ($this->email);

            $this->outputData = [
                'processed' => true,
                'data' => [
                    'success' => true,
                    'input' => $this->inputData,
                    'output' => $data
                ]
            ];
        } catch (Throwable $exception) {
            $this->outputData = [
                'processed' => true,
                "data" => [
                    'success' => false,
                    'input' => $this->inputData,
                    'output' => [
                        'input' => $this->email,
                        'error' => $exception->getMessage(),
                    ]
                ]
            ];
        }
    }
}
