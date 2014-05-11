<?php
/**
 * Created by PhpStorm.
 * User: babenoff
 * Date: 08.05.14
 * Time: 12:56
 */

namespace Amulet\Helper;


class StrHelper
{

    const KEYWORD_REGEX = "/{(const)([#:])([^}]+)}/";

    protected static $keyWords = [
        "ROOT_DIR" => ROOT_DIR,
        "DATA_DIR" => DATA_DIR,
        "RES_DIR" => RES_DIR,
        "APP_DIR" => APP_DIR
    ];

    /**
     * Converts 'table_name' to 'TableName'
     * @static
     * @param string $word
     * @return string
     */
    public static function classify($word)
    {
        return str_replace(" ", "", ucwords(strtr($word, "_-", "  ")));
    }

    /**
     * TableName -> table_name
     * @static
     * @param string $word
     * @return string
     */
    public static function tableize($word)
    {
        return strtolower(preg_replace('~(?<=\\w)([A-Z])~', '_$1', $word));
    }

    /**
     * Замена ключевых слов
     * @example {const:ROOT_DIR}
     * @param string $string
     * @return string
     */
    public static function replaceKeyWords($string)
    {
        $keyWords = static::$keyWords;
        return preg_replace_callback(
            static::KEYWORD_REGEX,
            function($matches)use($keyWords){
                $keyWord = $matches[3];
                $ret = "";
                if(isset($keyWords[$keyWord]))
                {
                    $ret = $keyWords[$keyWord];
                }
                return $ret;
            },
            $string
        );
    }

    public static function parseClassAction($string)
    {
        return explode("::", $string);
    }
} 