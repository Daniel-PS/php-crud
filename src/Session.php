<?php
namespace App;

class Session
{
    private static $sessionStarted = false;

    public static function set($key, $value)
    {
        self::startSession();

        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        self::startSession();

        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    public static function clear($key)
    {
        self::startSession();

        unset($_SESSION[$key]);
    }

    public static function startSession()
    {
        if (! Session::$sessionStarted) {
            session_start();
            Session::$sessionStarted = true;
        }
    }

}