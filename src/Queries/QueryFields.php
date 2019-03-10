<?php
/**
 * Created by PhpStorm.
 * User: gzonemacpro
 * Date: 2019-03-10
 * Time: 01:35
 */

namespace Picory\Dynamodel\Queries;


class QueryFields
{
    static function set($db, $params)
    {
        call_user_func(array($db, 'select'), $params['fields']);
    }

}