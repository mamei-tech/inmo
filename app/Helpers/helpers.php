<?php

/* *** General Helpers *** */

/** return only number
 * */

use Carbon\Carbon;

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


if (! function_exists('humanize_date')) {
    /**
     * Return a formatted Carbon date.
     *
     * @param Carbon $date
     * @param  string $format
     * @return string
     */
    function humanize_date(Carbon $date, $format = 'd F Y, H:i'): string
    {
        return $date->format($format);
    }
}