<?php

namespace App\Libs\Text;

use Throwable;
use App\Libs\HandleData;
use Stringy\StaticStringy as S;

class BetweenText extends HandleData
{
    public function __construct($text, $start, $end)
    {
        $this->text = $text;
        $this->start = $start;
        $this->end = $end;
        return $this->handle();
    }

    public static function run($text, $start, $end)
    {
        return (new self($text, $start, $end))->getOutputData();
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
                        'text' => S::between($this->text, $this->start, $this->end)
                    ]
                ]
            ];
        } catch (Throwable $exception) {
            $this->outputData = [
                'processed' => true,
                'data' => [
                    'success' => false,
                    'input' => [
                        'text' => $this->text,
                        'start' => $this->start,
                        'end' => $this->end,
                    ],
                    'output' => [
                        'error' => $exception->getMessage(),
                    ]
                ]
            ];
        }
    }
}
