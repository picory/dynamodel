<?php
/**
 * Created by PhpStorm.
 * User: gzonemacpro
 * Date: 2019-03-08
 * Time: 23:06
 */

namespace Picory\Dynamodel;

use Picory\Dynamodel\Database\DatabaseInstance;
use Picory\Dynamodel\Queries\QuerySelect;
use Picory\Dynamodel\Queries\QueryCount;
use Picory\Dynamodel\Queries\QueryWhere;
use Picory\Dynamodel\Queries\QueryOrderby;
use Picory\Dynamodel\Queries\QueryGroupby;
use Picory\Dynamodel\Queries\QueryLimit;

class DynaModel extends DynaAbstract
{
    public $where = [];
    public $whereIn = [];
    public $orWhere = [];

    public $orderby = [];
    public $groupby = [];

    public $count = false;

    public $db = null;

    public function select(Array $params)
    {
        QueryWhere::set($this);
        $rows['count'] = QueryCount::get($this);

        QuerySelect::set($this, $params);
        QueryOrderby::set($this);
        QueryGroupby::set($this);
        QueryLimit::set($this, $params);
        $rows['data'] = $this->db->get();

        // echo $this->db->toSql();

        return $rows;
    }

    public function insert(Array $params)
    {
        return QueryInsert::set($this, $params);
    }

    public function insertGetId(Array $params)
    {
        return QueryInsert::get_id($this, $params);
    }

    public function update($callFunc = '', Array $params)
    {}

    public function delete($callsFunc = '', array $params)
    {}

    public function connect(Object $model)
    {
        $connection = $model->connection;
        $table = $model->table;

        $this->db = DatabaseInstance::conn($connection, $table);
    }
}