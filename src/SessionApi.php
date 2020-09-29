<?php

namespace ToddWebNet\Apis;

use ToddWebNet\BaseApi;

class SessionApi extends BaseApi
{
    public function createSession()
    {
    }

    public function getSession($sessionId)
    {
    }

    public function setSessionValue($sessionId, $key, $value = null)
    {
        if ($value === null && is_array($key)) {

        } else {

        }
    }

}