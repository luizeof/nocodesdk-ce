<?php

namespace App\Libs\PersonName;

use Throwable;
use App\Libs\HandleData;

class Normalize extends HandleData
{
    public function __construct($name)
    {
        $this->name = $name;
        return $this->handle();
    }

    public static function run($name)
    {
        return (new self($name))->getOutputData();
    }

    protected function handle()
    {
        try {
            $segments = preg_split('/\s/', trim(preg_replace('/\s+/', ' ', $this->name)), 2);

            $first = $segments[0];

            $last  = $segments[1] ?? null;

            preg_match_all('/([[:word:]])[[:word:]]*/i', preg_replace('/(\(|\[).*(\)|\])/', '', $this->name), $initials);

            $initials = implode('', end($initials));

            $familiar = $last ? "{$first} {$last[0]}." : $first;

            $abbreviated = $last ? "{$first[0]}. {$last}" : $first;

            $sorted = $last ? "{$last}, {$first}" : $first;

            $mentionable = strtolower(preg_replace('/\s+/', '', substr($familiar, 0, -1)));

            $this->outputData = [
                'processed' => true,
                'data' => [
                    'success' => true,
                    'input' => $this->inputData,
                    'output' => [
                        "full_name" => ucwords($last ? "{$first} {$last}" : $first), // "David Heinemeier Hansson"
                        "first" =>  ucwords($first),       // "David"
                        "last" =>  ucwords($last),        // "Heinemeier Hansson"
                        "initials" =>  $initials,    // "DHH"
                        "familiar" =>  ucwords($familiar),    // "David H."
                        "abbreviated" =>  ucwords($abbreviated), // "D. Heinemeier Hansson"
                        "sorted" =>  ucwords($sorted),      // "Heinemeier Hansson, David"
                        "mentionable" =>  $mentionable, // "davidh"
                        "length" => strlen($this->name),
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
