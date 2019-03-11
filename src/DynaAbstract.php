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


class DynaAbstract
{
    public function count()
    {
        $this->count = true;
    }

//  public function where()
//    {
//        $args = func_get_args();
//        $this->where[] = $args;
//    }

    public function fields()
    {
    }

    public function take($db, $params)
    {
        QueryLimit::set($db, $params);
    }

    public function __call($callback, $args)
    {
        if (property_exists($this, $callback)) {
            $args = func_get_args();
            $this->{$callback} = $args[1];
        } else {
            dd($callback);
        }
    }
}
