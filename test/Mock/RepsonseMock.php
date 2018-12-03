<?php

namespace Anax\Mock;
use Anax\Response\ResponseUtility;

class ResponseMock extends ResponseUtility
{
    public function redirect(string $url) : object
    {
        $returnObject = (object) ['property' => $url];
        return $returnObject;
    }
}