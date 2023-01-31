<?php
    Session::init();
    class Facility_Provider extends Controller{
        private $ListingModel;
        public function __construct(){
            Middleware::authorizeUser(Session::get('userrole'), 'facility_provider');
            $this->ListingModel = $this->loadModel('Listing');
        }

        public function index(){

        }

        public function home(){
            echo 'This is the homepage of Facility Provider';
        }

        public function addNewListing(){
            $this->ListingModel->addListing();
        }
    }

?>