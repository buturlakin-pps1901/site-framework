<?php
/**
 * Created by PhpStorm.
 * User: alexey
 * Date: 01.04.2018
 * Time: 17:46
 */

namespace SiteFramework\Requests;


use SiteFramework\Responses\HttpResponse;

abstract class HttpRequest
{
    abstract function GetResponse():HttpResponse;

}