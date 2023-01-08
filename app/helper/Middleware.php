<?php

class Middleware{

    // public function checkCookie($remember_token){
    //     $userModel = $this->loadModel('User');
    //     $cookieFound = $userModel->checkCookie($remember_token);
    //     if($cookieFound != null){
    //             Session::set('userrole', $cookieFound->user_role);
    //             Session::set('userID', $cookieFound->userID);
    //             Session::set('username', $cookieFound->username);
    //             Middleware::redirect(Session::get('userrole') . '/home');
    //             exit();
    //     }else{
    //         return;
    //    }
    // }

    public static function redirect($page){
        header('location:' . URLROOT . '/' . $page);
    }
    
    public static function authorizeUser($current_userrole, $authorized_role){
        if($current_userrole == $authorized_role){
            return;
        }
        else{
            Middleware::redirect('access/restrict');
        }
    }

    public static function isLoggedIn(){
        if(Session::isLoggedIn()){
            Middleware::redirect('access/restrict');
            echo 'Error';
            exit();
        }
    }

    public static function isNotLoggedIn(){
        if(!Session::isLoggedIn()){
            Middleware::redirect('access/unauth');
            exit();
        }
    }
}