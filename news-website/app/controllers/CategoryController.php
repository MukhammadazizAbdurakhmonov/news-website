<?php

/**
 * CategoryController
 * 
 * CRUD operations for categories
 */
class CategoryController extends Controller{

    /**
     * Category model
     *
     * @var [string]
     */
    public $categoryModel;

    /**
     * Loading category model
     */
    public function __construct(){
        if(!$_SESSION['is_logged_in']){
            header('Location:'.URLROOT.'/auth/login');
        }
        $this->categoryModel = $this->model('Category');

    }

    /**
     * Displaying categories in admin page
     *
     * @return void
     */
    public function index(){
        
        $categories = $this->categoryModel->getAllCategories();
        $data = [
            'categories'=>$categories
        ];
        $this->view('admin/categories/index', $data);
    }

    /**
     * Displaying a form to create a new category and create a category
     *
     * @return void
     */
    public function create(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'category_name' => $_POST['category_name']
            ];

            $this->categoryModel->addCategory($data);

            header('Location:'.URLROOT.'/category/index');
        }
        else{
            $this->view('admin/categories/create');
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
                'category_name'=>$_POST['category_name']
            ];
            
            if($this->categoryModel->updateCategory($data)){
                header('Location:'.URLROOT.'/category/index');
            } else{
                die('Something went wrong');
            }
        } 
        $category = $this->categoryModel->getCategoryById($id);
        
        $data = [
            'category' => $category
        ];

        $this->view('admin/categories/edit', $data);
    }

    /**
     * Deleting the article
     *
     * @param [integer] $id the article id
     * @return void
     */
    public function delete($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if($this->categoryModel->deleteCategory($id)){
                header('Location:'.URLROOT.'/category/index');
            }
            else{
                die('Something went wrong');
            }

            header('Location:'.URLROOT.'/category/index');
        }
    }
}