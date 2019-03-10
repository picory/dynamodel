<?php
/**
 * Created by PhpStorm.
 * User: gzonemacpro
 * Date: 2019-03-08
 * Time: 23:20
 */
namespace Picory\Dynamodel\Database;

use Illuminate\Support\Facades\DB;

class DatabaseInstance
{
    static $instances = array();
    static $database = '';

    /**
     * @param string $database
     * @return mixed
     */
    static function conn($database, $table)
    {
        if (self::$database === $database) {
            return self::$instances[$database];
        }

        if (isset(self::$instances[$database])) {
            return self::$instances[$database];
        }

        self::$instances[$database] = DB::Connection($database);

        return DB::table($table);
    }
}