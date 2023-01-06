<?php

namespace Tests\Unit\EmailAddress;

use PHPUnit\Framework\TestCase;
use App\Libs\EmailAddress\BasicValidation;

class BasicValidationTest extends TestCase
{
    /**
     * Tet if E-mail Format is Valid
     *
     * @return void
     */
    public function test_email_format_is_valid()
    {
        $output = BasicValidation::run('luizeof@gmail.com');
        $this->assertTrue($output['valid_format']);
    }

    /**
     * Tet if E-mail Format is Valid
     *
     * @return void
     */
    public function test_email_format_is_invalid()
    {
        $output = BasicValidation::run('luizeof@gmail..com');
        $this->assertFalse($output['valid_format']);
    }

}
