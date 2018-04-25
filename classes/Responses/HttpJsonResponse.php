<?php
/**
 * Created by PhpStorm.
 * User: alexey
 * Date: 24.04.2018
 * Time: 11:47
 */

namespace Responses;


use SiteFramework\Responses\HttpResponse;

class HttpJsonResponse extends HttpResponse
{
    /**
     * HttpJsonResponse constructor.
     * @param array|object $jsonObject
     */
    public function __construct( $jsonObject)
    {
        $content=json_encode($jsonObject);
        parent::__construct($content, "application/json");
    }

}