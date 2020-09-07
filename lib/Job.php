<?php

class Job {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    //Fetch All Jobs with their Categories
    public function getAllJobs() {
        $this->db->query("SELECT jobs.*, categories.name AS cname 
                            FROM jobs
                            INNER JOIN categories
                            ON jobs.category_id = categories.id
                            ORDER BY post_date DESC"
                            
                        );

        //Assign Result
        $results = $this->db->resultSet();
         
        return $results;
    }

    // Fetch All Categories
    public function getCategories() {
        $this->db->query("SELECT * FROM categories");

        //Assign Result
        $results = $this->db->resultSet();

        return $results;
    }

    //Fetch Jobs By Categories
    public function getByCategory($category) {
        $this->db->query("SELECT jobs.*, categories.name AS cname 
                            FROM jobs
                            INNER JOIN categories
                            ON jobs.category_id = categories.id
                            WHERE jobs.category_id = $category
                            ORDER BY post_date DESC"
                            
                        );

        //Assign Result
        $results = $this->db->resultSet();

        return $results;
    }

    //Fetch Single Category
    public function getCategory($category_id) {
        $this->db->query("SELECT * FROM categories WHERE id = :category_id");

        $this->db->bind(":category_id", $category_id);

        //Assign ROw
        $row = $this->db->singleSet();

        return $row;

    }



}