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
    static function set($db, $model, $params)
    {
        $model->setFields($params['fields']);
        call_user_func(array($db, 'select'), $model->fields);
    }

}