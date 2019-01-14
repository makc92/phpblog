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
    public function getAll($table){
        $select = $this->queryFactory->newSelect();
        $select->cols(['*'])
            ->from($table);
        $sth = $this->pdo->prepare($select->getStatement());

        $sth->execute($select->getBindValues());

        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getAllPaginate($table){
        $select = $this->queryFactory->newSelect();
        $select->cols(['*'])
            ->from($table)
            ->setPaging(3)
            ->page($_GET['page'] ?? 1);
        $sth = $this->pdo->prepare($select->getStatement());

        $sth->execute($select->getBindValues());

        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function insert($data, $table){
        $insert = $this->queryFactory->newInsert();
        $insert
            ->into($table)                   // INTO this table
            ->cols($data);

        $sth = $this->pdo->prepare($insert->getStatement());

        $sth->execute($insert->getBindValues());

    }
    public function faker(){
        $faker = Factory::create();
//            d($faker);die;
        $insert = $this->queryFactory->newInsert();
        $insert->into('posts')     ;              // INTO this table
        for ($i = 0; $i < 5; $i ++) {
            $insert
                ->cols([
                    'title' => $faker->words(3,true)
                ]);
//                $insert->addRow();
        }


        $sth = $this->pdo->prepare($insert->getStatement());

        $sth->execute($insert->getBindValues());

    }
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
    public function delete($table, $id){
        $delete = $this->queryFactory->newDelete();
        $delete
            ->from($table)
            ->where('id = :id')
            ->bindValue('id', $id);
        $sth = $this->pdo->prepare($delete->getStatement());
        $sth->execute($delete->getBindValues());
    }

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
}