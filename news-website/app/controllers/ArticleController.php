<?php 

/**
 * ArticleController
 * 
 * CRUD operations for articles
 */
class ArticleController extends Controller{

    private $articleModel;
    public function __construct(){
        if(!$_SESSION['is_logged_in']){
            header('Location:'.URLROOT.'/auth/login');
        }
        $this->articleModel = $this->model('Article');
    }


    /**
     * Displaying categories in admin page
     *
     * @return void
     */
    public function index(){
        
        $articles = $this->articleModel->getAllArticles();
        $data = [
            'articles'=>$articles
        ];
        $this->view('admin/articles/index', $data);
    }

    /**
     * Displaying a form to create a new category and create a category
     *
     * @return void
     */
    public function create(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'article_title' => $_POST['article_title'],
                'article_content' => $_POST['article_content'],
                'author_id'=>$_SESSION['user_id']
            ];

            $this->articleModel->addArticle($data);

            header('Location:'.URLROOT.'/article/index');
        }
        else{
            $this->view('admin/articles/create');
        }
    }

    /**
     * Displaying a form to update the category and update the category
     *
     * @param [integer] $id the category id
     * @return void
     */
    public function edit($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'id'=>$id,
                'article_title'=>$_POST['article_title'],
                'article_content'=>$_POST['article_content']
            ];
            
            if($this->articleModel->updateArticle($data)){
                header('Location:'.URLROOT.'/article/index');
            } else{
                die('Something went wrong');
            }
        } 
        $article = $this->articleModel->getArticleById($id);

        $data = [
            'article' => $article
        ];

        $this->view('admin/articles/edit', $data);
    }

    public function show($id){

        $article = $this->articleModel->getArticleById($id);
        
        $data = [
            'article'=>$article
        ];
        

        $this->view('admin/articles/show', $data);
    }


    /**
     * Deleting the article
     *
     * @param [integer] $id the article id
     * @return void
     */
    public function delete($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if($this->articleModel->deletearticle($id)){
                header('Location:'.URLROOT.'/article/index');
            }
            else{
                die('Something went wrong');
            }

            header('Location:'.URLROOT.'/article/index');
        }
    }
}