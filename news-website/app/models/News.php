<?php 

/**
 * News model
 * 
 */
class News{

  private $db;
  
  public function __construct(){
      $this->db = new Database;
  }

  public function addNews($data){
    $this->db->query('INSERT INTO news (news_title, news_content, news_image, author_id, category_id) VALUES(:news_title, :news_content, :news_image, :author_id, :category_id)');
    $this->db->bind(':news_title', $data['news_title']);
    $this->db->bind(':news_content', $data['news_content']);
    $this->db->bind(':news_image', $data['news_image']);
    $this->db->bind(':author_id', $data['author_id']);
    $this->db->bind(':category_id', $data['category_id']);

    if($this->db->execute()){
      return true;
    } else {
      return false;
    }
  }

  public function updateNews($data){
    $this->db->query('UPDATE news SET news_title = :news_title, news_content = :news_content, news_image = :news_image, category_id = :category_id WHERE id = :id');
    $this->db->bind(':id', $data['id']);
    $this->db->bind(':news_title', $data['news_title']);
    $this->db->bind(':news_content', $data['news_content']);
    $this->db->bind(':news_image', $data['news_image']);
    $this->db->bind(':category_id', $data['category_id']);

    if($this->db->execute()){
      return true;
    } else {
      return false;
    }
  }

  public function deleteNews($id){
    $this->db->query('DELETE FROM news WHERE id = :id');
    $this->db->bind(':id', $id);

    if($this->db->execute()){
      return true;
    } else {
      return false;
    }
  }

    public function getAllNews(){
        $this->db->query('SELECT news.news_title, news.news_content, news.id, news.news_image, news.created_at, categories.category_name 
                          FROM news JOIN categories ON news.category_id = categories.id');
        $this->db->execute();
        return $this->db->results();
    }

    public function getTotal(){
        $this->db->query('SELECT COUNT(*) FROM news');
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getNewsLimit($limit, $offset){
        $this->db->query('SELECT news.id, news.category_id, news.news_title, news.news_image, news.created_at, categories.category_name 
                          FROM news, categories 
                          WHERE news.category_id = categories.id 
                          ORDER BY created_at 
                          LIMIT :limit OFFSET :offset');
        $this->db->bind(':limit', $limit, PDO::PARAM_INT);
        $this->db->bind(':offset', $offset, PDO::PARAM_INT);
        $this->db->execute();
        return $this->db->results();
    }

    public function getNewsByCategory($category_name, $limit, $offset){
        $this->db->query('SELECT news.id, news.category_id, news.news_title, news.news_image, news.created_at, categories.category_name FROM news 
                        INNER JOIN categories ON news.category_id = categories.id 
                        WHERE category_name = :category_name 
                        LIMIT :limit OFFSET :offset');
        $this->db->bind(':category_name', $category_name);
        $this->db->bind(':limit', $limit, PDO::PARAM_INT);
        $this->db->bind(':offset', $offset, PDO::PARAM_INT);
        $this->db->execute();
        return $this->db->results();
    }

    public function getNewsLists($limit, $offset){
      $this->db->query('SELECT news.id, news.category_id, news.news_title, news.news_image, news.created_at, categories.category_name 
                        FROM news, categories, users 
                        WHERE news.category_id = categories.id
                        LIMIT :limit OFFSET :offset');
      $this->db->bind(':limit', $limit, PDO::PARAM_INT);
      $this->db->bind(':offset', $offset, PDO::PARAM_INT);
      $this->db->execute();
      return $this->db->results();
    }

    public function getNewsById($id){
        $this->db->query('SELECT * FROM news, categories, users 
                          WHERE news.id = :id AND news.category_id = categories.id AND news.author_id = users.id');
        $this->db->bind(':id', $id);
        $this->db->execute();
        return $this->db->singleResult();
    }
}