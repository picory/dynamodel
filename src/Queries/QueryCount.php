<?php
/**
 * Created by PhpStorm.
 * User: gzonemacpro
 * Date: 2019-03-10
 * Time: 02:14
 */

namespace Picory\Dynamodel\Queries;

use Picory\Dynamodel\DynaModel;

class QueryCount
{
    static function get(DynaModel $model)
    {
        if ($model->count) {
            return $model->db->count();
        }
    }

}