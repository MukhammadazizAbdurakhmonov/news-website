<?php
/**
 * NewsController
 * 
 * CRUD operations for main news
 */
class MainnewsController extends Controller{
    
    /**
     * News model
     *
     * @var [object]
     */
    private $mainNewsModel;

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
        $this->mainNewsModel = $this->model('MainNews');
        $this->categoryModel = $this->model('Category');
        
    }

    /**
     * Displaying news to admin page
     *
     * @return void
     */
    public function index(){
        $news = $this->mainNewsModel->getAllNews();
        
        $data = [
            'news'=>$news
        ];
        $this->view('admin/main-news/index', $data);
    }

    /**
     * Displaying a form to a create news and store news 
     *
     * @return void
     */
    public function create(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $data = [
                'main_news_title'=>$_POST['main_news_title'],
                'main_news_content'=>$_POST['main_news_content'],
                'main_news_headline'=>$_POST['main_news_headline'],
                'main_news_image'=>'',
                'category_id'=>$_POST['category'],
                'author_id'=>$_SESSION['user_id']
            ];

            $fileName = $_FILES['main_news_image']['name'];
            $fileTmpName = $_FILES['main_news_image']['tmp_name'];

            $fileNameNew = uniqid('', true).'_'.date("d-m-Y", time()).'_'.$fileName;

            $fileDestination = 'images/'.$fileNameNew;

            $data['main_news_image'] = $fileNameNew;
            

            move_uploaded_file($_FILES['main_news_image']['tmp_name'], $fileDestination);


            if($this->mainNewsModel->addNews($data)){
                header('Location:'.URLROOT.'/mainnews/index');
            }
        }


        $categories = $this->categoryModel->getAllCategories();

        $data = [
            'categories'=>$categories
        ];

        $this->view('admin/main-news/create', $data);
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
                'main_news_title'=>$_POST['main_news_title'],
                'main_news_image'=>'',
                'main_news_content'=>$_POST['main_news_content'],
                'category_id'=>$_POST['category']
            ];

            
            $news = $this->mainNewsModel->getNewsById($id);

            if(is_uploaded_file($_FILES['main_news_image']['tmp_name']) && isset($_FILES['main_news_image']))
            {

                $old_image = 'images/'.$news->main_news_image;

                if(file_exists($old_image)){

                    unlink($old_image);

                    $fileName = $_FILES['main_news_image']['name'];

                    $fileTmpName = $_FILES['main_news_image']['tmp_name'];

                    $fileNameNew = uniqid('', true).$fileName;

                    $fileDestination = 'images/'.$fileNameNew;

                    $data['main_news_image'] = $fileNameNew;
            
                    move_uploaded_file($_FILES['main_news_image']['tmp_name'], $fileDestination);
                }
            }
            else
            {
                $data['news_image'] = $news->news_image;
            }

            if($this->mainNewsModel->updateNews($data)){
                header('Location:'.URLROOT.'/mainnews/index');
            } else{
                die('Something went wrong');
            }
        }
        

        $news = $this->mainNewsModel->getNewsById($id);
        $categories = $this->categoryModel->getAllCategories();
        
        $data = [
            'news' => $news,
            'categories'=>$categories
        ];

        $this->view('admin/main-news/edit', $data);
    }

    /**
     * Showing the indivudal news
     *
     * @return void
     */
    public function show($id){

        $news = $this->mainNewsModel->getNewsById($id);
        
        $data = [
            'news'=>$news
        ];

        $this->view('admin/main-news/show', $data);
    }

    /**
     * Deleteing the indivudal news
     *
     * @return void
     */
    public function delete($id){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $news = $this->mainNewsModel->getNewsById($id);

            $old_image = 'images/'.$news->main_news_image;

            if(file_exists($old_image)){
                unlink($old_image);
            }

            if($this->mainNewsModel->deleteNews($id)){
                header('Location:'.URLROOT.'/mainnews/index');
            }
            else{
                die('Something went wrong');
            }

            header('Location:'.URLROOT.'/mainnews/index');
        }
    }
}