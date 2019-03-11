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

    public function fetch(Array $params)
    {
        QueryWhere::set($this);
        $rows['count'] = QueryCount::get($this);

        QuerySelect::set($this, $params);
        QueryOrderby::set($this);
        QueryLimit::set($this, $params);
        $rows['data'] = $this->db->get();

        return $rows;
    }

    public function insert($callFunc = '', Array $params)
    {}

    public function insertById($callFunc = '', Array $params)
    {}

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