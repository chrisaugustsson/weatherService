<?php

namespace Anax\WeatherService;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;
use Anax\Curl\Curl;
use Anax\LocationProvider\Ipstack;

/**
 * Test the FlatFileContentController.
 */
class WeatherControllerTest extends TestCase
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

        // Setup the controller
        $this->controller = new WeatherController();
        $this->controller->setDI($this->di);
        //$this->controller->initialize();
    }


    public function testindexActionGet()
    {
        $res = $this->controller->indexActionGet();

        $exp = "Forecast from IP";
        $this->assertContains($exp, $res["title"]);
    }

    public function testIpActionGet()
    {
        $request = $this->di->get("request");
        $request->setGet("ip", "92.232.60.151");
        $res = $this->controller->ipActionGet();

        $exp = "Local weather";
        $this->assertContains($exp, $res["title"]);
    }

    public function testHistoryAction()
    {
        $request = $this->di->get("request");
        $request->setGet("ip", "92.232.60.151");

        $res = $this->controller->historyActionGet();

        $exp = "Local weather";
        $this->assertContains($exp, $res["title"]);
    }

    public function testIpActionGetInvalidIp()
    {
        $request = $this->di->get("request");
        $request->setGet("ip", "92.232.60.x");

        $res = $this->controller->ipActionGet();

        $exp = "Local weather";
        $this->assertContains($exp, $res);
    }
}