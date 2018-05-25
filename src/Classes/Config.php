<?php

namespace Classes;

class Config {
    //Static storage of the config as an array
    
    private static $config;
    private static $config_file_path = "./config/config.json";
    /**
     * This is grab the json file and load it
     */

    public static function loadConfig()
    {
        return static::$config = json_decode(file_get_contents(static::$config_file_path),TRUE);
    }
    /**
     * This function will return the value of a specific config
     *
     * @param string $key
     * @return array|bool
     */
    
    public static function getConfig($key='')
    {
        //check if config has not been loaded
        if(!static::$config)
        {
            static::$config = static::loadConfig();
        }
        if(isset(static::$config[$key]))
        {
            return static::$config[$key];
        }
        return false;
    }
}
