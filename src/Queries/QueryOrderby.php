<?php
/**
 * Created by PhpStorm.
 * User: gzonemacpro
 * Date: 2019-03-08
 * Time: 23:14
 */

namespace Picory\Dynamodel\Queries;


class QueryOrderby
{
    static function set($db, $model)
    {
        if (count($model->orders) < 1) return;

        foreach ($model->orders as $orders) {
            call_user_func_array(array($db, 'orderby'), $orders);
        }
    }

}