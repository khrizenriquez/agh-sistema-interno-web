<?php

namespace App\Http\Controllers;

use App\Libs\htmlpurifier\HTMLPurifier;

class SecurityController extends Controller {

    public static function purifyArray($array, $htmlAllowed) {
        $resultado = array();
        foreach ($array as $key => $value) {
            $resultado[static::purifyParameter($key, false)] = (is_array($value)) ? static::purifyArray($value, $htmlAllowed) : static::purifyParameter($value, $htmlAllowed);
        }
        return $resultado;
    }

    public static function purifyParameter($param, $htmlAllowed) {
        $config = \HTMLPurifier_Config::createDefault();
        if ($htmlAllowed) {
            $config->set('HTML.Allowed', 'div,ul,li,a[href],p,b,table,h1,h2,h3,h4,h5,ol,span[style],strong,em,br');
        } else {
            $config->set('HTML.Allowed', '');
        }
        $purifier = new \HTMLPurifier($config);
        $param = $purifier->purify($param);
        if (!$htmlAllowed) {
            $param = htmlentities($param, ENT_QUOTES);
            $param = str_replace('&amp;', '&', $param);
        }
        return $param;
    }

    public static function mergeParameters() {
        $parameters = array();
        foreach ($_REQUEST as $key => $value) {
            $parameters[$key] = $value;
        }
        foreach ($_GET as $key => $value) {
            $parameters[$key] = $value;
        }
        foreach ($_POST as $key => $value) {
            $parameters[$key] = $value;
        }
        return $parameters;
    }

}
