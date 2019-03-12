<?php
/**
 * Created by PhpStorm.
 * User: gzonemacpro
 * Date: 2019-03-08
 * Time: 23:15
 */

namespace Picory\Dynamodel\Queries;

use Picory\Dynamodel\DynaModel;

class QueryGroupby
{
    public static $db;

    static function set(DynaModel $model)
    {
        if (count($model->groupby) < 1) return;

        foreach ($model->groupby as $group) {
            call_user_func_array(array($model->db, 'groupby'), $group);
        }
    }

}