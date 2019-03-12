<?php
/**
 * Created by PhpStorm.
 * User: gzonemacpro
 * Date: 2019-03-08
 * Time: 23:12
 */
namespace Picory\Dynamodel\Queries;

use Picory\Dynamodel\DynaModel;

class QueryInsert
{
    public static $db;

    static function get(DynaModel $model, Array $params)
    {
        $fields = self::fields($model, $params);

        return $model->db->insert($fields);
    }

    static function get_id(DynaModel $model, Array $params)
    {
        $fields = self::fields($model, $params);

        return $model->db->insertGetId($fields);
    }

    static function fields(DynaModel $model, Array $params)
    {
        $fields = array();

        foreach ($params as $field => $value) {
            switch ($field) {
                case 'fields':
                case 'limit':
                    continue;
                    break;
                case 'table': // Table 내용이 있으면 강제로 조정
                    $model->table = $value;
                    $model->db = DB::table($model->table);
                    continue;
                    break;
                default:
                    $fields[$field] = $value;
            }
        }

        return $fields;
    }
}