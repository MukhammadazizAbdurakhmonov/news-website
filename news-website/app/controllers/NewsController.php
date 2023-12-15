<?php
/**
 * NewsController
 * 
 * CRUD operations for news
 */
class NewsController extends Controller{
    
    /**
     * News model
     *
     * @var [object]
     */
    private $newsModel;

    /**
     * Category model
     *
     * @var [object]
     */
    private $categoryModel;

    /**
     * Loading news and category models
     */
    public function __construct(){
        if(!$_SESSION['is_logged_in']){
            header('Location:'.URLROOT.'/auth/login');
        }
        $this->newsModel = $this->model('News');
        $this->categoryModel = $this->model('Category');
        
    }

    /**
     * Displaying news to admin page
     *
     * @return void
     */
    public function index(){
        $news = $this->newsModel->getAllNews();
        
        $data = [
            'news'=>$news
        ];
        $this->view('admin/news/index', $data);
    }

    /**
     * Displaying a form to a create news and store news 
     *
     * @return void
     */
    public function create(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            /**Incoming data form form */
            $data = [
                'news_title'=>$_POST['news_title'],
                'news_content'=>$_POST['news_content'],
                'news_image'=>'',
                'category_id'=>$_POST['category'],
                'author_id'=>$_SESSION['user_id']
            ];

            /**Imgae upload to public folder */
            $fileName = $_FILES['news_image']['name'];
            $fileTmpName = $_FILES['news_image']['tmp_name'];
            $fileNameNew = uniqid('', true).'_'.date("d-m-Y", time()).'_'.$fileName;
            $fileDestination = 'images/'.$fileNameNew;
            $data['news_image'] = $fileNameNew;
            move_uploaded_file($_FILES['news_image']['tmp_name'], $fileDestination);
            if($this->newsModel->addNews($data)){
                header('Location:'.URLROOT.'/news/index');
            }
        }

        $categories = $this->categoryModel->getAllCategories();
        $data = [
            'categories'=>$categories
        ];

        $this->view('admin/news/create', $data);
    }

    
    /**
     * Displaying the form to edit the news and update the news
     *
     * @return void
     */
    public function edit($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $data = [
                'id'=>$id,
                'news_title'=>$_POST['news_title'],
                'news_image'=>'',
                'news_content'=>$_POST['news_content'],
                'category_id'=>$_POST['category']
            ];

            
            $news = $this->newsModel->getNewsById($id);

            if(is_uploaded_file($_FILES['news_image']['tmp_name']) && isset($_FILES['news_image']))
            {

                $old_image = 'images/'.$news->news_image;

                if(file_exists($old_image)){

                    unlink($old_image);

                    $fileName = $_FILES['news_image']['name'];

                    $fileTmpName = $_FILES['news_image']['tmp_name'];

                    $fileNameNew = uniqid('', true).$fileName;

                    $fileDestination = 'images/'.$fileNameNew;

                    $data['news_image'] = $fileNameNew;
            
                    move_uploaded_file($_FILES['news_image']['tmp_name'], $fileDestination);
                }
            }
            else
            {
                $data['news_image'] = $news->news_image;
            }

            if($this->newsModel->updateNews($data)){
                header('Location:'.URLROOT.'/news/index');
            } else{
                die('Something went wrong');
            }
        }
        

        $news = $this->newsModel->getNewsById($id);
        $categories = $this->categoryModel->getAllCategories();
        
        $data = [
            'news' => $news,
            'categories'=>$categories
        ];

        $this->view('admin/news/edit', $data);
    }

    /**
     * Showing the indivudal news
     *
     * @return void
     */
    public function show($id){

        $news = $this->newsModel->getNewsById($id);
        
        $data = [
            'news'=>$news
        ];
        

        $this->view('admin/news/show', $data);
    }

    /**
     * Deleteing the indivudal news
     *
     * @return void
     */
    public function delete($id){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $news = $this->newsModel->getNewsById($id);

            $old_image = 'images/'.$news->news_image;

            if(file_exists($old_image)){
                unlink($old_image);
            }

            if($this->newsModel->deleteNews($id)){
                header('Location:'.URLROOT.'/news/index');
            }
            else{
                die('Something went wrong');
            }

            header('Location:'.URLROOT.'/news/index');
        }
    }
}