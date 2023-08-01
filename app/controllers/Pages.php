<?php
    class Pages extends Controller {
        public function __construct(){

        }

        public function index(){
            if(isLoggedIn()){
                redirect('posts');
            }

            $data = [
                'title' => 'EFG News',
                'description' => 'Simple Webpages Network built on the EFG News Framework'
            ];

            $this->view('pages/index', $data);
        }

        public function about(){
            $data = [
                'title' => 'About Us',
                'description' => 'App to Share News'
            ];
            $this->view('pages/about', $data);
        }
    }