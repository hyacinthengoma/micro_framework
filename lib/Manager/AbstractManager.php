<?php
namespace Plugo\Manager;
use PDO;

require dirname(__DIR__,2). '/config/database.php';

abstract class AbstractManager
{

    private function connect(): \PDO
    {
        $db = new \PDO(
            "mysql:host=" . DB_INFOS['host'] . ";port=" . DB_INFOS['port'] . ";dbname=" . DB_INFOS['dbname'],
            DB_INFOS['username'],
            DB_INFOS['password']
        );
//        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return $db;
    }

        private function executeQuery(string $query, array $params = []): \PDOStatement {
            $db = $this->connect();
            $stmt = $db->prepare($query);
            foreach ($params as $key => $param) $stmt->bindValue($key, $param);
            $stmt->execute();
            return $stmt;
        }

    private function classToTable(string $class): string {
        $tmp = explode('\\', $class);
        return strtolower(end($tmp));
    }

    protected function readOne(string $class, int $id) {
        $query = "SELECT * FROM " . $this->classToTable($class) . " WHERE id = :id";
        $stmt = $this->executeQuery($query, [ 'id' => $id ]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, $class);
        return $stmt->fetch();
    }

    protected function readMany(string $class) {
        $query = "SELECT * FROM " . $this->classToTable($class);
        if ($stmt = $this->executeQuery($query)) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
            return $stmt->fetchAll();
        }
    }
}