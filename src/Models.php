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

class Models extends ModelsAbstract
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
            $this->where($this->db, $this->model);
        }

        // 카운트
        if ($this->model->count) {
            $rows['total'] = $this->count($this->db, $this->model);
        }

        $this->fields($this->db, $params);
        $this->orderby($this->db, $this->model);
        $this->take($this->db, $params);

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