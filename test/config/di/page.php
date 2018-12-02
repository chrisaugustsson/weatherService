<?php
/**
 * Configuration file to add as service in the Di container.
 */
return [

    // Services to add to the container.
    "services" => [
        "page" => [
            "shared" => true,
            "callback" => function () {
                $page = new \Anax\Mock\PageMock();
                return $page;
            }
        ],
    ],
];
