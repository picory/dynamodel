<?php
/**
 * Created by PhpStorm.
 * User: gzonemacpro
 * Date: 2019-03-08
 * Time: 23:14
 */

namespace Picory\Dynamodel\Queries;


class QueryWhere
{
    private static $db;

    static function set($db, $model)
    {
        self::$db = $db;

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

        return self::$db;
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
}
