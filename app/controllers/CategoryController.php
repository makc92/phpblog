<?php

namespace App\controllers;
use App\Classes\QueryBuilder;


class CategoryController
{
    private $db;

    public function __construct(QueryBuilder $db)
    {
        $this->db = $db;
    }

    public function get_all_category()
    {
        $category = $this->db->getAll('category');
        return $category;
    }
}