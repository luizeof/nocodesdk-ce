<?php

namespace App\Libs\EmailAddress;

use Throwable;
use App\Libs\HandleData;
use EmailValidation\EmailValidatorFactory;

class BasicValidation extends HandleData
{

    public function __construct($email)
    {
        $this->email  = $email;

        return $this->handle();
    }

    public static function run($email): array
    {
        return (new self($email))->getOutputData();
    }

    protected function handle()
    {
        try {
            $data = (EmailValidatorFactory::create(strtolower($this->email)))
                ->getValidationResults()
                ->asArray();

            $data["email"] = strtolower($this->email);

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
