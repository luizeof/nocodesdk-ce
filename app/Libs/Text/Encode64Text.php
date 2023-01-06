<?php

namespace App\Libs\Text;

use Throwable;
use App\Libs\HandleData;

class Encode64Text extends HandleData
{
    public function __construct($text)
    {
        $this->text = $text;
        return $this->handle();
    }

    public static function run($text)
    {
        return (new self($text))->getOutputData();
    }

    protected function handle()
    {
        try {
            $this->outputData = [
                'processed' => true,
                'data' => [
                    'success' => true,
                    'input' => $this->inputData,
                    'output' => [
                        'text' => base64_encode($this->text)
                    ]
                ]
            ];
        } catch (Throwable $exception) {
            $this->outputData = [
                'processed' => true,
                'data' => [
                    'success' => false,
                    'input' => $this->inputData,
                    'output' => [
                        'error' => $exception->getMessage(),
                    ]
                ]
            ];
        }
    }
}
