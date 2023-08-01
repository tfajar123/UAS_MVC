<?php
    class Pages extends Controller {
        public function __construct(){

            $this->newsModel = $this->model('News');
        }

        public function index(){
            /*if(isLoggedIn()){
                redirect('posts');
            }*/
            $news = $this->newsModel->getNews();

            $data = [
                'title' => 'EFG News',
                'description' => 'Simple Webpages Network built on the EFG News Framework',
                'news' => $news
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