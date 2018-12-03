<?php

namespace Anax\Mock;

class CacheMock
{
    public function get($dummyParam)
    {
        if ($dummyParam === "true") {
            return true;
        }
        return null;
    }

    public function set($dummyKey, $dummyValue)
    {
        return null;
    }
}