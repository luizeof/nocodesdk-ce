<?php

/**
 * Lib Namespace
 * php version 8
 *
 * @category Model
 * @package  StackingWidgets
 * @author   Luiz Eduardo Oliveira Fonseca <luizeof@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     https://github.com/luizeof/stackingwidgets
 */

namespace App\Libs\EmailAddress;

use Throwable;
use App\Libs\HandleData;
use EmailValidation\EmailValidatorFactory;

/**
 * Describe this Class
 *
 * @category Lib
 * @package  StackingWidgets
 * @author   Luiz Eduardo Oliveira Fonseca <luizeof@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://pear.php.net/package/PackageName
 */
class BasicValidation extends HandleData
{
    /**
     * Initialize this Class
     *
     * @param string $email Email to Validate
     */
    public function __construct($email)
    {
        $this->email  = $email;

        return $this->handle();
    }

    /**
     * Run the Class and return output
     *
     * @param string $email User Agent String
     *
     * @return array
     */
    public static function run($email): array
    {
        return (new self($email))->getOutputData();
    }

    /**
     * Execution Workflow
     *
     * @return void
     */
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
