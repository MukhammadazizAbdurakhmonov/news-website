<?php

/**
 * Category
 * 
 * Model for category table
 */
class Category{

    /**
     * Database connection
     *
     * @var [object]
     */
    private $db;

    /**
     * Loading database connection
     */
    public function __construct(){
        $this->db = new Database;
    }

    /**
     * Adding a new category
     *
     * @param [array] $data
     * @return boolean
     */
    public function addCategory($data){
        $this->db->query('INSERT INTO categories (category_name) VALUES(:category_name)');
        // Bind values
        $this->db->bind(':category_name', $data['category_name']);
  
        // Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }

      /**
       * Updating a category
       *
       * @param [array] $data
       * @return boolean
       */
      public function updateCategory($data){
        $this->db->query('UPDATE categories SET category_name = :category_name WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':category_name', $data['category_name']);
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }

      /**
       * Getting all categories
       *
       * @return array
       */
      public function getAllCategories(){
         $this->db->query('SELECT * FROM categories');
         $this->db->execute();
         return $this->db->results();
      }

      /**
       * 
       *
       * @param [type] $category_name
       * @return void
       */
      public function getCategoryByName($category_name){
        $this->db->query('SELECT * FROM categories WHERE category_name = :category_name');
        $this->db->bind(':category_name', $category_name);
        $this->db->execute();
        return $this->db->singleResult();
      }


      public function getCategoryById($id){
        $this->db->query('SELECT * FROM categories WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
        return $this->db->singleResult();
      }

      public function deleteCategory($id){
        $this->db->query('DELETE FROM categories WHERE id = :id');
        $this->db->bind(':id', $id);

        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }
}