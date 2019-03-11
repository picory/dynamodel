<?php
/**
 * Created by PhpStorm.
 * User: gzonemacpro
 * Date: 2019-03-08
 * Time: 23:14
 */

namespace Picory\Dynamodel\Queries;


use Picory\Dynamodel\DynaModel;

class QueryOrderby
{
    static function set(DynaModel $model)
    {
        if (count($model->orderby) < 1) return;

        foreach ($model->orderby as $orders) {
            call_user_func_array(array($model->db, 'orderby'), $orders);
        }
    }

}