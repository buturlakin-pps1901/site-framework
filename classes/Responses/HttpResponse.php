<?php
/**
 * Created by PhpStorm.
 * User: alexey
 * Date: 01.04.2018
 * Time: 17:51
 */

namespace SiteFramework\Responses;


class HttpResponse
{
    const CONTENT_TYPE_TEXTHTML="text/html";
    const CONTENT_TYPE_JSON="application/json";
    const ENCODING_UTF8="utf8";

    private $_contentType=self::CONTENT_TYPE_TEXTHTML;
    private $_contentEncoding=self::ENCODING_UTF8;


    function getContentType():string{
        $ct=$this->_contentType;
        if($ct==self::CONTENT_TYPE_TEXTHTML){
            return "Content-Type: ".$ct."; encoding=".$this->_contentEncoding;
        }else{
            return "Content-Type: ".$this->_contentType;
        }
    }

    function setContentType($contentType):void{
        $this->_contentType=$contentType;
    }

    function setEncoding($encoding){
        $this->_contentEncoding=$encoding;
    }
}