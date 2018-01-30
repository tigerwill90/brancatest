<?php
/**
 * Created by PhpStorm.
 * User: Sylvain
 * Date: 29.01.2018
 * Time: 17:36
 */

namespace Tigerwill90\Tests;

use Branca\Branca;

/**
 * This test work with paragonie/sodium_compat v1.5.3
 * but trigger "pack(): 64-bit format codes are not available for 32-bit versions of PHP"
 * with v1.5.5
 */
class BrancaTest extends \PHPUnit_Framework_TestCase {

    /** @test */
    public function testBranca() : void {
        if (PHP_INT_SIZE === 4) {error_log("PHP 32-bit");} else {error_log("PHP 64-bit, test should work");}
        $branca = new Branca("supersecretkeyyoushouldnotcommit");
        $payload = ["name" => "Foo", "size" => 3];
        $token = $branca->encode(json_encode($payload));
        error_log($token);
        $decoded = json_decode($branca->decode($token), true);
        $this->assertEquals($payload, $decoded);
    }

}