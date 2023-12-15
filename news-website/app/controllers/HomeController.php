<?php
/**
 * HomeController
 * 
 * Displaying information for front pages to users
 * 
 */
class HomeController extends Controller {

    /**
     * category model
     *
     * @var [object]
     */
    private $categoryModel;

    /**
     * news model 
     *
     * @var [object]
     */
    private $newsModel;

    /**
     * news model 
     *
     * @var [object]
     */
    private $mainNewsModel;

    /**
     * news model 
     *
     * @var [object]
     */
    private $articleModel;

    /**
     * Loading category and news models
     */
    public function __construct(){
      $this->categoryModel = $this->model('Category');
      $this->newsModel = $this->model('News');
      $this->mainNewsModel = $this->model('MainNews');
      $this->articleModel = $this->model('Article');
    }
    
    /**
     * Home page
     *
     * @return void
     */
    public function index(){

      $categories = $this->categoryModel->getAllCategories();
      $news = $this->newsModel->getNewsLimit(3, 0);
      $mainnews = $this->mainNewsModel->getAllNews();
      $worldnews = $this->newsModel->getNewsByCategory('World', 4, 0);
      $sportnews = $this->newsModel->getNewsByCategory('Sport', 3, 0);
      $articles = $this->articleModel->getArticleLimit(5, 0);

      $data = [
        'categories'=>$categories,
        'news' => $news,
        'mainnews' => $mainnews,
        'worldnews'=>$worldnews,
        'sportnews'=>$sportnews,
        'articles'=>$articles,
      ];
      

      $this->view('front-pages/index', $data);
    }

    /**
     * Displaying news related to that category
     *
     * @param [varchar] $category_name
     * @return void
     */
    public function category($category_name){
      
      $paginator = new Paginator($_GET['page'] ?? 1, 4, $this->newsModel->getTotal());
      
      $news = $this->newsModel->getNewsByCategory($category_name, $paginator->limit, $paginator->offset);
      $categories = $this->categoryModel->getAllCategories();
      
      $data = [
        'news' => $news,
        'paginator'=>$paginator,
        'categories'=>$categories
      ];

      $this->view('front-pages/news-lists', $data);
    }

    public function news(){
      $paginator = new Paginator($_GET['page'] ?? 1, 6, $this->newsModel->getTotal());
      
      $news = $this->newsModel->getNewsLists($paginator->limit, $paginator->offset);
      $categories = $this->categoryModel->getAllCategories();
      
      $data = [
        'news' => $news,
        'paginator'=>$paginator,
        'categories'=>$categories
      ];

      $this->view('front-pages/news-lists', $data);
    }

    public function show($id){
      if(!empty($this->newsModel->getNewsById($id))){
        $categories = $this->categoryModel->getAllCategories();
        $news = $this->newsModel->getNewsById($id);
        
        
        $data = [
            'news'=>$news,
            'categories'=>$categories
        ];
        
  
        $this->view('front-pages/news-detail', $data);
      }else{
        die('Not found');
      }
  }

  public function mainnews_show($id){
    if(!empty($this->mainNewsModel->getNewsById($id))){
      $categories = $this->categoryModel->getAllCategories();
      $mainnews = $this->mainNewsModel->getNewsById($id);
      
      
      $data = [
          'mainnews'=>$mainnews,
          'categories'=>$categories
      ];
      

      $this->view('front-pages/mainnews-detail', $data);
    }else{
      die('Not found');
    }
}

  public function articles(){
      $paginator = new Paginator($_GET['page'] ?? 1, 4, $this->articleModel->getTotal());

      $categories = $this->categoryModel->getAllCategories();
      $articles = $this->articleModel->getArticleByLimit($paginator->limit, $paginator->offset);
      
      $data = [
        'articles' => $articles,
        'categories' => $categories,
        'paginator'=>$paginator,
      ];

      $this->view('front-pages/article-lists', $data);
  }

  public function article($id){
    if(!empty($this->articleModel->getArticleById($id))){
      $categories = $this->categoryModel->getAllCategories();
      $article = $this->articleModel->getArticleById($id);
      
      
      $data = [
          'article'=>$article,
          'categories'=>$categories
      ];
      

      $this->view('front-pages/article-detail', $data);
    }else{
      die('Not found');
    }
}

public function about_us(){
  $categories = $this->categoryModel->getAllCategories();
  $data = [
    'categories'=>$categories
];
  $this->view('front-pages/about-us', $data);
}
}