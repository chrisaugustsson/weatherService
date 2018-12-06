<?php

namespace Anax\WeatherService;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;
use Anax\Curl\Curl;
use Anax\LocationProvider\Ipstack;
use Anax\Mock\CacheMock;
use Anax\Mock\CurlMock;

/**
 * Test the FlatFileContentController.
 */
class IpStackTest extends TestCase
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
        $curlIpStack = new CurlMock();
        $cfg = $di->get("configuration");
        $this->locationProvider = new Ipstack($curlIpStack, $cfg);
    }


    /**
     *
     */
    public function testGetters()
    {
        $this->locationProvider->setLocation("92.232.60.151");

        $ip = $this->locationProvider->getIp();
        $type = $this->locationProvider->getType();

        $expIp = "92.232.60.151";
        $expType = "ipv4";

        $this->assertEquals($ip, $expIp);
        $this->assertEquals($type, $expType);
    }
}
