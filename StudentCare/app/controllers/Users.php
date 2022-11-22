<?php

    class Users extends Controller{
        public function __construct(){
            
        }

        public function login(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Log the user in and start the session
                echo 'User is Logging in';
            }else{
               //Send the login view with relevant data
               $data = [

               ];

               $this->loadView('login', $data);
            }
        }

        public function register(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Log the user in and start the session
                echo 'User is Registering';
            }else{
               //Send the login view with relevant data
               $data = [

               ];

               $this->loadView('common-register', $data);
            }
        }
    
    
    }
