<?php
/**
 * Configuration file for DI container.
 */
return [

    // Services to add to the container.
    "services" => [
        "curl" => [
            "shared" => true,
            "callback" => function () {
                $cache = new \Anax\Mock\CacheMock;
                $curl = new \Anax\Mock\CurlMock();

                return $curl;
            }
        ],
    ],
];
