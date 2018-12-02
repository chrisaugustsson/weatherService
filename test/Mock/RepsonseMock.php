<?php

namespace Anax\Mock;
use Anax\Response\ResponseUtility;

class ResponseMock extends ResponseUtility
{
    public function redirect(string $url) : object
    {
        return [
            "res" => "Redirected to " . $url
        ];
    }
}