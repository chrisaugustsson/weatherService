<?php

namespace Anax\Mock;

class CurlMock
{
    private $badIpStack = "http://api.ipstack.com/127.255.255.255?access_key=76d2dc7dd12afedf6fc8bf90e2a75e26";
    private $badDarkSky = "https://api.darksky.net/forecast/8878ac53b3953166ef85f85992dc6b35/10,10";
    private $ipStack = "http://api.ipstack.com";
    private $darkSky = "https://api.darksky.net";


    public function get(string $url)
    {
        $returnObject = null;
        $usedBy = strpos($url, $this->darkSky) !== false ? "darkSky" : "ipStack";

        if ($usedBy == "darkSky") {
            $returnObject = (object) [
                "currently" => (object) [
                    "temperature" => 2,
                    "icon" => "cloud",
                    "summary" => "Its all guud"
                ],
                "daily" => (object) [
                    "data" => [
                        (object) [
                            "temperatureHigh" => 1,
                            "temperatureLow" => 1,
                            "icon" => "cloud"
                            ]
                            ,
                        (object) [
                            "temperatureHigh" => 1,
                            "temperatureLow" => 1,
                            "icon" => "cloud"
                        ],
                        (object) [
                            "temperatureHigh" => 1,
                            "temperatureLow" => 1,
                            "icon" => "cloud"
                        ],
                        (object) [
                            "temperatureHigh" => 1,
                            "temperatureLow" => 1,
                            "icon" => "cloud"
                        ],
                    ]
                ]
            ];
        }

        if ( strpos($url, $this->badDarkSky) !== false ) {
            $returnObject = (object) [
                "code" => 400,
                "error" => "The given location (or time) is invalid."
            ];
        }

        if ($usedBy == "ipStack") {
            $returnObject = (object) [
                "ip"=> "92.232.60.151",
                "type" => "ipv4",
                "city" => "Liverpool",
                "country_name" => "United Kingdom",
                "latitude" => 2,
                "longitude" => 2,
            ];
        }

        if ($url == $this->badIpStack || strpos($url, "92.232.60.15x") !== false) {
            $returnObject = (object) [
                "ip" => "92.232.60.151",
                "type" => "ipv4",
                "city" => "Liverpool",
                "country_name" => "United Kingdom",
                "latitude" => 10,
                "longitude" => 10
            ];
        }

        return $returnObject;
    }

    public function getMulti(array $urls)
    {
        $returnObject = [
            (object) [
                "currently" => (object) [
                    "time" => "255589200",
                    "temperature" => 2,
                    "icon" => "cloud",
                    "summary" => "Its all guud"
                ],
            ]
        ];

        if (strpos($urls[0], $this->badDarkSky) !== false) {
            $returnObject = [(object) [
                "code" => 400,
                "error" => "The given location (or time) is invalid."
            ]];
        }

        return $returnObject;
    }
}