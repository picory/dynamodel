<?php
/**
 * Created by PhpStorm.
 * User: gzonemacpro
 * Date: 2019-03-10
 * Time: 03:04
 */

namespace Picory\Dynamodel\Queries;


use Picory\Dynamodel\DynaModel;

class QueryLimit
{
    static function set(DynaModel $model, $params)
    {
        $page = isset($params['page']) ? $params['page'] : 1;
        $limit = isset($params['limit']) ? $params['limit'] : 25;

        if ($page) self::offset($model->db, $page, $limit);
        $model->db->take($limit);
    }

    static function offset($db, $page, $limit)
    {
        $offset = (intval($page) - 1) * $limit;

        $db->offset($offset);
    }
}