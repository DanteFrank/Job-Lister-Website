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

    //Get Job DEtails for a single page
    public function getJob($id) {
        $this->db->query("SELECT * FROM jobs WHERE id = :id");

        $this->db->bind(":id", $id);

        //Assign ROw
        $row = $this->db->singleSet();

        return $row;
    }

    //Create Job
    public function create($data) {
        //Insert Query
        $this->db->query(
            "INSERT INTO
            jobs(category_id, company, job_title, description, salary, location, contact_user, contact_email)
            VALUES (:category_id, :company, :job_title, :description, :salary, :location, :contact_user, :contact_email)"
        );

        //Bind Data
        $this->db->bind(':category_id', $data['category_id']);
        $this->db->bind(':company', $data['company']);
        $this->db->bind(':job_title', $data['job_title']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':salary', $data['salary']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':contact_user', $data['contact_user']);
        $this->db->bind(':contact_email', $data['contact_email']);

        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    //Delete Job
    public function delete($id) {
        //Insert Query
        $this->db->query("DELETE FROM jobs WHERE id = $id");

        //Execute statement
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    //Update Job Information
    public function update($id, $data){
         
        //Insert Query
        $this->db->query("UPDATE jobs
            SET
            category_id = :category_id,
            company = :company,
            job_title = :job_title,
            description = :description,
            salary = :salary,
            location = :location,
            contact_user = :contact_user,
            contact_email = :contact_email
            WHERE id = $id
        ");
         

        //Bind Data
        $this->db->bind(':category_id', $data['category_id']);
        $this->db->bind(':company', $data['company']);
        $this->db->bind(':job_title', $data['job_title']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':salary', $data['salary']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':contact_user', $data['contact_user']);
        $this->db->bind(':contact_email', $data['contact_email']);

        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}