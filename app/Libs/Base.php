<?php

/**
 * Lib Namespace
 * php version 8
 *
 * @category Library
 * @package  NocodeSDK
 * @author   Luiz Eduardo Oliveira Fonseca <luizeof@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     https://github.com/luizeof/stackingwidgets
 */

namespace App\Libs;

use App\Libs\HandleData;

/**
 * Describe this Class
 *
 * @category Library
 * @package  NocodeSDK
 * @author   Luiz Eduardo Oliveira Fonseca <luizeof@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://pear.php.net/package/PackageName
 */
class Base extends HandleData
{
    /**
     * Initialize this Class
     *
     * @param [type] $userAgent User Agent String
     */
    public function __construct($userAgent)
    {
        $this->userAgent  = $userAgent;

        return $this->handle();
    }

    /**
     * Run the Class and return output
     *
     * @param [type] $userAgent User Agent String
     *
     * @return array
     */
    public static function run($userAgent): array
    {
        return (new self($userAgent))->getOutputData();
    }

    /**
     * Execution Workflow
     *
     * @return void
     */
    protected function handle()
    {
        //
    }
}
