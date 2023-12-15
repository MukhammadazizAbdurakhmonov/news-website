<?php 

class MainNews{
    
    private $db;
    public function __construct(){
        $this->db = new Database;
    }

    public function getAllNews(){
        $this->db->query('SELECT main_news.main_news_title, main_news.main_news_headline, main_news.id, main_news.main_news_image, main_news.created_at, categories.category_name FROM main_news JOIN categories ON main_news.category_id = categories.id');
        $this->db->execute();
        return $this->db->results();
    }

    public function getTotal(){
        $this->db->query('SELECT COUNT(*) FROM main_news');
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function addNews($data){
        $this->db->query('INSERT INTO main_news (main_news_title, main_news_headline, main_news_content, main_news_image, author_id, category_id) VALUES(:main_news_title, :main_news_headline, :main_news_content, :main_news_image, :author_id, :category_id)');
        $this->db->bind(':main_news_title', $data['main_news_title']);
        $this->db->bind(':main_news_headline', $data['main_news_headline']);
        $this->db->bind(':main_news_content', $data['main_news_content']);
        $this->db->bind(':main_news_image', $data['main_news_image']);
        $this->db->bind(':author_id', $data['author_id']);
        $this->db->bind(':category_id', $data['category_id']);

        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }

      public function getNewsById($id){
        $this->db->query('SELECT * FROM main_news, categories, users 
                          WHERE main_news.id = :id AND main_news.category_id = categories.id AND main_news.author_id = users.id');
        $this->db->bind(':id', $id);
        $this->db->execute();
        return $this->db->singleResult();
    }

    public function updateNews($data){
        $this->db->query('UPDATE main_news SET main_news_title = :main_news_title, main_news_headline = :main_news_headline, main_news_content = :main_news_content, main_news_image = :main_news_image, category_id = :category_id WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':main_news_title', $data['main_news_title']);
        $this->db->bind(':main_news_headline', $data['main_news_headline']);
        $this->db->bind(':main_news_content', $data['main_news_content']);
        $this->db->bind(':main_news_image', $data['main_news_image']);
        $this->db->bind(':category_id', $data['category_id']);
  
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
    }

    public function deleteNews($id){
      $this->db->query('DELETE FROM main_news WHERE id = :id');
      $this->db->bind(':id', $id);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
}