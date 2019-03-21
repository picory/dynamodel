<?php

namespace App\Http\Models;

use Picory\Dynamodel\DynaModel;

abstract class ModelAbstract
{
    public $model = null;

    public function __construct()
    {
        $this->model = new DynaModel();
        $this->model->connect($this);
    }

    public function select($callFunc, $params)
    {
        call_user_func(array($this, $callFunc), $params);

        return $this->model->select($params);
    }

    public function __call($callback, $args)
    {
        call_user_func(array($this->model, $callback), $args);
    }

    /* Static Functions */


    /**
     * @param string $callFunc
     * @param array $params
     * @return mixed
     */
    static function exec($callFunc = '', Array $params)
    {
        $rows = self::fetch_all($callFunc, $params, '');

        // 어떤 결과 값이든 출력
        return $rows;
    }

    /**
     * @param string $callFunc
     * @param array $params
     * @return mixed
     */
    static function fetch($callFunc = '', Array $params)
    {
        $rows = self::fetch_all($callFunc, $params, '');

        // 첫번째 Row만 출력
        return isset($rows[0]) ? $rows[0] : $rows;
    }


    static function fetch_all($callFunc = '', Array $params, $mode = 'all')
    {
        $className = get_called_class();
        $model = new $className();

        // select 쿼리에 카운트 추가
        if (empty($mode) === false) $model->count();

        // fetch : count 없음, fetch_all : 카운트 포함 데이터
        switch ($callFunc) {
            case 'insert':
            case 'update':
            case 'delete':
                $callback = $callFunc;
                break;
            default:
                $callback = 'select';
        }

        return call_user_func_array(array($model, $callback), array($callFunc, $params));
    }

}
