<?php

namespace App\Libs\Person;

use Throwable;
use App\Libs\HandleData;

class Name extends HandleData
{

    public function __construct($name)
    {
        $this->name = mb_convert_encoding(mb_convert_case(strtolower($name), MB_CASE_TITLE, "UTF-8"), "UTF-8", "auto");
        return $this->handle();
    }

    public static function run($name)
    {
        return (new self($name))->getOutputData();
    }

    protected function handle()
    {
        try {
            $segments = mb_split(' ', (mb_ereg_replace('/\s+/', ' ', $this->name)), 2);

            $first = $segments[0];

            $last  = $segments[1] ?? null;

            preg_match_all('/([[:word:]])[[:word:]]*/i', mb_ereg_replace('/(\(|\[).*(\)|\])/', '', $this->name), $initials);

            $initials = $this->generateInitials($this->name);

            $familiar = $last ? "{$first} {$last[0]}." : $first;

            $abbreviated = $last ? "{$first[0]}. {$last}" : $first;

            $sorted = $last ? "{$last}, {$first}" : $first;

            $mentionable = mb_ereg_replace('/\s+/', '', substr($familiar, 0, -1));

            $this->outputData = [
                'processed' => true,
                'data' => [
                    'success' => true,
                    'input' => $this->inputData,
                    'output' => [
                        "full_name" => mb_convert_case($last ? "{$first} {$last}" : $first, MB_CASE_TITLE, "UTF-8"), // "David Heinemeier Hansson"
                        "first" =>  mb_convert_case($first, MB_CASE_TITLE, "UTF-8"),       // "David"
                        "last" =>  mb_convert_case($last, MB_CASE_TITLE, "UTF-8"),        // "Heinemeier Hansson"
                        "initials" =>  mb_convert_case($initials, MB_CASE_UPPER_SIMPLE, "UTF-8"),    // "DHH"
                        "familiar" =>  mb_convert_case($familiar, MB_CASE_TITLE, "UTF-8"),    // "David H."
                        "abbreviated" =>  mb_convert_case($abbreviated, MB_CASE_TITLE, "UTF-8"), // "D. Heinemeier Hansson"
                        "sorted" =>  mb_convert_case($sorted, MB_CASE_TITLE, "UTF-8"),      // "Heinemeier Hansson, David"
                        "mentionable" =>  mb_convert_case($mentionable, MB_CASE_LOWER_SIMPLE, "UTF-8"), // "davidh"
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

    /**
     * Generate initials from a name
     *
     * @param string $name
     * @return string
     */
    protected function generateInitials(string $name) : string
    {
        $words = explode(' ', $name);
        if (count($words) >= 2) {
            return mb_strtoupper(
                mb_substr($words[0], 0, 1, 'UTF-8') .
                mb_substr(end($words), 0, 1, 'UTF-8'),
            'UTF-8');
        }
        return $this->makeInitialsFromSingleWord($name);
    }

    /**
     * Make initials from a word with no spaces
     *
     * @param string $name
     * @return string
     */
    protected function makeInitialsFromSingleWord(string $name) : string
    {
        preg_match_all('#([A-Z]+)#', $name, $capitals);
        if (count($capitals[1]) >= 2) {
            return mb_substr(implode('', $capitals[1]), 0, 2, 'UTF-8');
        }
        return mb_strtoupper(mb_substr($name, 0, 2, 'UTF-8'), 'UTF-8');
    }
}
