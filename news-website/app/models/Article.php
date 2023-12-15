<?php

/**
 * Category
 * 
 * Model for category table
 */
class Article{

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
    public function addArticle($data){
        $this->db->query('INSERT INTO articles (article_title, article_content, author_id) VALUES(:article_title, :article_content, :author_id)');
        // Bind values
        $this->db->bind(':article_title', $data['article_title']);
        $this->db->bind(':article_content', $data['article_content']);
        $this->db->bind(':author_id', $data['author_id']);
        
  
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
      public function updateArticle($data){
        $this->db->query('UPDATE articles SET article_title = :article_title, article_content = :article_content WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':article_title', $data['article_title']);
        $this->db->bind(':article_content', $data['article_content']);
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
      public function getAllArticles(){
         $this->db->query('SELECT * FROM articles');
         $this->db->execute();
         return $this->db->results();
      }

      public function getArticleByLimit($limit, $offset){
        $this->db->query('SELECT * 
                          FROM articles 
                          LIMIT :limit OFFSET :offset');
        $this->db->bind(':limit', $limit, PDO::PARAM_INT);
        $this->db->bind(':offset', $offset, PDO::PARAM_INT);
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

      public function getArticleLimit($limit, $offset){
        $this->db->query('SELECT * 
                          FROM articles
                          ORDER BY created_at 
                          LIMIT :limit OFFSET :offset');
        $this->db->bind(':limit', $limit, PDO::PARAM_INT);
        $this->db->bind(':offset', $offset, PDO::PARAM_INT);
        $this->db->execute();
        return $this->db->results();
    }


      public function getArticleById($id){
        $this->db->query('SELECT * FROM articles WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
        return $this->db->singleResult();
      }

      public function getTotal(){
        $this->db->query('SELECT COUNT(*) FROM articles');
        $this->db->execute();
        return $this->db->rowCount();
    }

      public function deleteArticle($id){
        $this->db->query('DELETE FROM articles WHERE id = :id');
        $this->db->bind(':id', $id);

        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }
}