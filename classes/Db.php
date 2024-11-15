<?php
/*
 * Design Pattern Singleton
 * in order to have 1 object in the class
 */
class Db
{
    private static object $dbh;

    public static function getConnection(): object
    {
        if (!isset(self::$dbh)) {
            /* Connect to a MySQL database using driver invocation */
            try {
                self::$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWD); // $dbh data base handle / handle = Resource
            } catch (PDOException $e) {
                throw new Exception($e);
            }
        }
        return self::$dbh;
    }
}