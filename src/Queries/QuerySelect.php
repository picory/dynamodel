<?php
/**
 * Created by PhpStorm.
 * User: gzonemacpro
 * Date: 2019-03-09
 * Time: 14:53
 */

namespace Picory\Dynamodel\Queries;

use Picory\Dynamodel\DynaModel;

class QuerySelect
{
    static function set(DynaModel $model, $params)
    {
        call_user_func(array($model->db, 'select'), $params['fields']);
    }
}