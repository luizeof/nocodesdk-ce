<?php

namespace App\Libs;

use Carbon\Carbon;

abstract class HandleData implements HandleDataInterface
{
    protected $inputData = array();

    protected $outputData = array();

    protected $outputStream;

    public function getInputData()
    {
        return $this->inputData;
    }

    public function getOutputData(): array
    {
        $this->transformKeys($this->outputData);
        return ($this->outputData) ? $this->outputData : [];
    }

    public function getOutputStream(): mixed
    {
        return $this->outputStream;
    }

    public function __set($name, $value)
    {
        $this->inputData[$name] = $value;
    }

    public function __get($name): mixed
    {
        if (array_key_exists($name, $this->inputData)) {
            return $this->inputData[$name];
        }
        return null;
    }

    public function setDateField($field, $value, array &$input)
    {
        $input[$field] = Carbon::parse($value)->toDateTimeString();
        $input["{$field}Timestamp"] = Carbon::parse($value)->getTimestamp();
    }

    public function transformKeys(&$array)
    {
        if (!is_array($array)) {
            return;
        }

        foreach (array_keys($array) as $key) :
            # Working with references here to avoid copying the value,
            # since you said your data is quite large.
            $value = &$array[$key];
            unset($array[$key]);
            # This is what you actually want to do with your keys:
            #  - remove exclamation marks at the front
            #  - camelCase to snake_case
            $transformedKey = strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', ltrim($key, '!')));
            # Work recursively
            if (is_array($value)) $this->transformKeys($value);
            # Store with new key
            $array[$transformedKey] = $value;
            # Do not forget to unset references!
            unset($value);
        endforeach;
    }
}
