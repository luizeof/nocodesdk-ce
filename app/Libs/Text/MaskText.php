<?php

namespace App\Libs\Text;

use Throwable;
use App\Libs\HandleData;
use Illuminate\Support\Str;

class MaskText extends HandleData
{
    public function __construct($text, $offset, $char)
    {
        $this->text = $text;
        $this->offset = $offset;
        $this->char = $char;
        return $this->handle();
    }

    public static function run($text, $offset, $char)
    {
        return (new self($text, $offset, $char))->getOutputData();
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
                        'text' => Str::mask($this->text, $this->char, $this->offset)
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
