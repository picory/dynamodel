<?php
/**
 * Created by PhpStorm.
 * User: gzonemacpro
 * Date: 2019-03-10
 * Time: 23:42
 */

namespace Picory\Dynamodel;

use Picory\Dynamodel\Queries\QueryCount;
use Picory\Dynamodel\Queries\QueryWhere;
use Picory\Dynamodel\Queries\QueryFields;
use Picory\Dynamodel\Queries\QueryOrderby;
use Picory\Dynamodel\Queries\QueryLimit;


class ModelsAbstract
{
    public function count($db, $model)
    {
        return QueryCount::get($db, $model);
    }

    public function where($db, $model)
    {
        QueryWhere::set($db, $model);
    }

    public function fields($db, $params)
    {
        QueryFields::set($db, $params);
    }

    public function orderby($db, $model)
    {
        QueryOrderby::set($db, $model);
    }

    public function take($db, $params)
    {
        QueryLimit::set($db, $params);
    }
}
