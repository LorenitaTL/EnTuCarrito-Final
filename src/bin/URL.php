<?php
class URL{
    public static function base(){
        //planetamain.com
        $base_dir = str_replace(basename($_SERVER["SCRIPT_NAME"]), "",$_SERVER["SCRIPT_NAME"]);
        $baseURL = (isset($_SERVER["HTTPS"]) ? "https" : "http") . "://{$_SERVER["HTTP_HOST"]}{$base_dir}";
        return trim($baseURL, "/");
    }

    public static function to($url){
        $url = trim($url, "/");
        return URL::base()."/{$url}";
    }

    public static function getFull(){
        //planetamain.com/cursos?parametro=1
        return (isset($_SERVER["HTTPS"]) ? "https" : "http") . "://{$_SERVER["HTTP_POST"]}{$_SERVER["REQUEST_URI"]}";
    }
}