<?php

namespace App\Libs\Text;

use Throwable;
use App\Libs\HandleData;
use Illuminate\Support\Str;

class PadBothText extends HandleData
{
    public function __construct($text, $size, $char)
    {
        $this->text = $text;
        $this->size = $size;
        $this->char = $char;
        return $this->handle();
    }

    public static function run($text, $size, $char)
    {
        return (new self($text, $size, $char))->getOutputData();
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
                        'text' => Str::padBoth($this->text, $this->size, $this->char)
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
