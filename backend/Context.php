<?php

/**
 * Class Context
 *
 * Stores instances of objects
 */
class Context
{
    private static $values = [];

    /**
     * ApplicationContext constructor.
     */
    private function __construct()
    {
        /*
         * Private constructor
         * This class should not be instantiated
         */
    }

    /**
     * Stores a value
     *
     * @param string $name
     * @param string|int|float|double $value
     */
    public static function storeValue(string $name, $value) {
        self::$values[$name] = $value;
    }

    /**
     * Retrieves a value
     *
     * @param string $name
     * @return string|int|float|double
     */
    public static function retrieveValue(string $name) {
        return self::$values[$name];
    }
}