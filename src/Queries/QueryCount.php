<?php
/**
 * Created by PhpStorm.
 * User: gzonemacpro
 * Date: 2019-03-10
 * Time: 02:14
 */

namespace Picory\Dynamodel\Queries;


class QueryCount
{
    static function get($db, $model)
    {
        if ($model->count) {
            return $db->count();
        }
    }

}