<?php
/**
 * Created by PhpStorm.
 * User: Sylvain
 * Date: 29.01.2018
 * Time: 17:36
 */

namespace Tigerwill90\Tests;

use Branca\Branca;

class BrancaTest extends \PHPUnit_Framework_TestCase {

    /** @test */
    public function testBranca() : void {
        if (PHP_INT_SIZE === 4) {error_log("PHP 32-bits");} else {error_log("PHP 64-bits");}
        $branca = new Branca("supersecretkeyyoushouldnotcommit");
        $payload = ["name" => "Foo", "size" => 3];
        $token = $branca->encode(json_encode($payload));
        error_log($token);
        $decoded = json_decode($branca->decode($token), true);
        $this->assertEquals($payload, $decoded);
    }

}