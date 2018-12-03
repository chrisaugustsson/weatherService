<?php

namespace Anax\WeatherService;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;
use Anax\Curl\Curl;
use Anax\LocationProvider\Ipstack;
use Anax\Mock\CacheMock;

/**
 * Test the FlatFileContentController.
 */
class CurlTest extends TestCase
{

    // Create the di container.
    protected $di;
    protected $controller;



    /**
     * Prepare before each test.
     */
    protected function setUp()
    {
        global $di;

        // Setup di
        $this->di = new DIFactoryConfig();
        $this->di->loadServices(ANAX_INSTALL_PATH . "/config/di");
        $this->di->loadServices(ANAX_INSTALL_PATH . "/test/config/di");

        // View helpers uses the global $di so it needs its value
        $di = $this->di;

        // Init the modules needed
        $cache = new CacheMock;
        $this->curl = new Curl($cache);
    }


    /**
     *
     */
    public function testCacheFunction()
    {
        $actual = $this->curl->get("true");
        $exp = true;

        $this->assertEquals($exp, $actual);
    }
}
