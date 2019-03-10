<?php
/**
 * Created by PhpStorm.
 * User: gzonemacpro
 * Date: 2019-03-08
 * Time: 23:06
 */

namespace Picory\Dynamodel;

use Picory\Dynamodel\Database\DatabaseInstance;
use Picory\Dynamodel\Queries\Query;
use Picory\Dynamodel\Queries\QueryFields;
use Picory\Dynamodel\Queries\QueryWhere;
use Picory\Dynamodel\Queries\QueryCount;
use Picory\Dynamodel\Queries\QueryOrderby;
use Picory\Dynamodel\Queries\QueryGroupby;
use Picory\Dynamodel\Queries\QueryLimit;

class Models
{
    public $model = null;

    public function __construct(Object $class)
    {
        $this->model = $class;
    }

    public function fetch($callFunc = '', Array $params)
    {
        // 검색 조건 정리
        call_user_func(array($this->model, $callFunc), $params);

        $this->connect();

        if ($this->model->where || $this->model->whereIn) {
            QueryWhere::set($this->db, $this->model);
        }

        // 카운트
        if ($this->model->count) {
            $rows['total'] = QueryCount::get($this->db, $this->model);
        }

        QueryFields::set($this->db, $this->model, $params);
        QueryOrderby::set($this->db, $this->model);
        QueryLimit::set($this->db, $params);

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

    public function connect()
    {
        $connection = $this->model->connection;
        $table = $this->model->table;

        $this->db = DatabaseInstance::conn($connection, $table);
    }
}