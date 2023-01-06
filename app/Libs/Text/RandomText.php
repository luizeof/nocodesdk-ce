<?php

namespace App\Libs\Text;

use Throwable;
use App\Libs\HandleData;
use Illuminate\Support\Str;

class RandomText extends HandleData
{
    public function __construct($size)
    {
        $this->size = $size;
        return $this->handle();
    }

    public static function run($size)
    {
        return (new self($size))->getOutputData();
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
                        'text' => Str::random($this->size)
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
