<?php

/**
 * AdminController
 * 
 * Displaying dashboard for admin
 */
class AdminController extends Controller{
    /**
     * Displaying dashboard for admin
     *
     * @return void
     */
    public function index(){
        if(!$_SESSION['is_logged_in'] or $_SESSION['user_editor'] != 1){
            header('Location:'.URLROOT.'/auth/login');
        } 
        $this->view('admin/dashboard');
    }
}