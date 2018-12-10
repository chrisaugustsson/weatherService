<?php

namespace Anax\WeatherService;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

class WeatherController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function indexActionGet()
    {
        $title = "Forecast from IP";

        $request = $this->di->get("request");
        $page = $this->di->get("page");

        $validIp = $request->getGet("ip") ?? "true";

        // Get users IP-address from SERVER
        $ip = $request->getServer("HTTP_X_FORWARDED_FOR");
        $page->add("weather/index", [
            "ip" => $ip,
            "valid" => $validIp
        ]);

        return $page->render([
            "title" => $title,
        ]);
    }

    public function ipActionGet()
    {
        $di = $this->di;
        $request = $di->get("request");
        $response = $di->get("response");
        $page = $di->get("page");
        $weather = $di->get("weather");

        $ip = $request->getGet("ip");
        $history = $request->getGet("history") ?? null;

        if ($history) {
            return $response->redirect("weather/history?ip=" . $ip);
        }

        $weather->setLocation($ip);

        $res = $weather->getForecast();

        if (isset($res["error"])) {
            return $response->redirect("weather?ip=false");
        }

        $data = [
            "res" => $res
        ];

        $page->add("weather/weather", $data);

        return $page->render([
            "title" => "Local weather"
        ]);
    }

    public function historyActionGet()
    {
        $di = $this->di;
        $request = $di->get("request");
        $response = $di->get("response");
        $page = $di->get("page");
        $ip = $request->getGet("ip");
        $weather = $di->get("weather");

        $weather->setLocation($ip);
        $res = $weather->getOldCast();

        if (isset($res["error"])) {
            return $response->redirect("weather?ip=false");
        }

        $data = [
            "res" => $res
        ];

        $page->add("weather/history", $data);

        return $page->render([
            "title" => "Local weather"
        ]);
    }
}
