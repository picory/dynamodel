<?php
/**
 * Created by PhpStorm.
 * User: gzonemacpro
 * Date: 2019-03-08
 * Time: 23:14
 */

namespace Picory\Dynamodel\Queries;

use Picory\Dynamodel\DynaModel;

class QueryWhere
{
    private static $db;

    static function set(DynaModel $model)
    {
        self::$db = $model->db;

        if ($model->where) {
            foreach ($model->where as $where) {
                self::where($where);
            }
        }

        if ($model->whereIn) {
            foreach ($model->whereIn as $where) {
                self::whereIn($where);
            }
        }

        if (empty($model->orWhere) === false) {
            foreach ($model->whereIn as $where) {
                self::orWhere($where);
            }
        }
    }

    static function where()
    {
        $args = func_get_args();
        call_user_func_array(array(self::$db, __FUNCTION__), $args[0]);
    }

    static function whereIn()
    {
        $args = func_get_args();
        call_user_func_array(array(self::$db, __FUNCTION__), $args[0]);
    }

    static function orWhere()
    {
        $args = func_get_args();
        call_user_func_array(array(self::$db, __FUNCTION__), $args[0]);
    }
}
