<?php

/* *** General Helpers *** */

/** return only number
 * */
if (! function_exists('route__')) {
    function route__($name, $parameters = [], $absolute = true, $route = null)
    {
        $lparameters = array();

        if (!is_array($parameters)){// && is_string($parameters)) {
            $lparameters[$parameters] = $parameters;
        } else
            $lparameters = $parameters;

        if (!isset($lparameters["lang"])) $lparameters["lang"] = App::getLocale();

        return app('url')->route($name, $lparameters, $absolute, $route);
//        return app('url')->route($name, $parameters, $absolute);
    }
}