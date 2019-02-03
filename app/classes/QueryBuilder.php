<?php

namespace App\Classes;
use PDO;
use Aura\SqlQuery\QueryFactory;

class QueryBuilder
{
    private $pdo;
    private $queryFactory;

    public function __construct(PDO $pdo, QueryFactory $queryFactory){
        $this->pdo = $pdo;
        $this->queryFactory = $queryFactory;
    }
    /*получить все записи*/
    public function getAll($table, $order= 'id'){
        $select = $this->queryFactory->newSelect();
        $select->cols(['*'])
            ->orderBy(["$order DESC"])
            ->from($table);
        $sth = $this->pdo->prepare($select->getStatement());

        $sth->execute($select->getBindValues());

        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    /*добавить запись*/
    public function insert($data, $table){
        $insert = $this->queryFactory->newInsert();
        $insert
            ->into($table)                   // INTO this table
            ->cols($data);

        $sth = $this->pdo->prepare($insert->getStatement());

        $sth->execute($insert->getBindValues());

    }
    /*обновить запись*/
    public function update($table, $data, $id){
        $update = $this->queryFactory->newUpdate();

        $update
            ->table($table)                  // update this table
            ->cols($data)
            ->where('id = :id')     // bind this value to the condition
            ->bindValue('id', $id);   // bind one value to a placeholder
        $sth = $this->pdo->prepare($update->getStatement());

        $sth->execute($update->getBindValues());
    }
    /*удалить запись*/
    public function delete($table, $id){
        $delete = $this->queryFactory->newDelete();
        $delete
            ->from($table)
            ->where('id = :id')
            ->bindValue('id', $id);
        $sth = $this->pdo->prepare($delete->getStatement());
        $sth->execute($delete->getBindValues());
    }
    /*получить одну запись*/
    public function getOne($table, $id)
    {
        $select = $this->queryFactory->newSelect();
        $select->cols(['*'])
            ->from($table)
            ->where('id = :id')
            ->bindValue('id', $id);
        $sth = $this->pdo->prepare($select->getStatement());

        $sth->execute($select->getBindValues());

        $result = $sth->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getAllbyID($table,$col,$order='id',$id){
        $select = $this->queryFactory->newSelect();
        $select->cols(['*'])
            ->from($table)
            ->where("$col = :id")
            ->bindValue('id', $id)
            ->orderBy(["$order DESC"]);
        $sth = $this->pdo->prepare($select->getStatement());

        $sth->execute($select->getBindValues());

        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getByName($table,$col ,$row, $name){
        $select = $this->queryFactory->newSelect();
        $select->cols([$col])
            ->from($table)
            ->where("$row = :name")
            ->bindValue('name', $name);
        $sth = $this->pdo->prepare($select->getStatement());

        $sth->execute($select->getBindValues());

        $result = $sth->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getAllPaginateById($table,$order= 'id',$col, $id, $paging = 1, $page = 1){
        $select = $this->queryFactory->newSelect();
        $select->cols(['*'])
            ->orderBy(["$order DESC"])
            ->from($table)
            ->setPaging($paging)
            ->page($page)
            ->where("$col = :id")
            ->bindValue('id', $id);
        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getAllPaginate($table, $paging = 1, $page = 1, $order= 'id'){
        $select = $this->queryFactory->newSelect();
        $select->cols(['*'])
            ->orderBy(["$order DESC"])
            ->from($table)
            ->setPaging($paging)
            ->page($page);
        $sth = $this->pdo->prepare($select->getStatement());

        $sth->execute($select->getBindValues());

        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}