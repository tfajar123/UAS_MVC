<?php
    class Artikel extends Controller {
        public function __construct() {
            /*//Jika belum login, halaman posts tidak bisa dilihat
            if(!isLoggedIn()){ //fungsi berada di Session helper
                redirect('users/login');
            }*/
            $this->newsModel = $this->model('News');
            $this->userModel = $this->model('User');
        }

        public function index ()
        {
            //redirect('');
            $this->view('artikel/index');
        }

        public function add() {
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      
                $data = [
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'user_id' => $_SESSION['user_id'],
                    'title_err' => '',
                    'body_err' => ''
                ];

                //Validasi data
                if(empty($data['title'])){
                    $data['title_err'] = 'Mohon masukkan judul!';
                }
                if(empty($data['body'])){
                    $data['body_err'] = 'Mohon masukkan isi teks!';
                }

                //memastikan tidak ada error
                if(empty($data['title_err']) && empty($data['body_err'])){
                    if($this->newsModel->addNews($data)){
                        flash('post_message', 'Artikel telah Ditambahkan');
                        redirect('admin/news');
                    }else{
                        die('Ada yang salah! Silahkan coba lagi!');
                    }
                } else {
                    $this->view('artikel/add', $data);
                }
            }else{
                $data = [
                    'title' => '',
                    'body' => ''
                ];
                $this->view('artikel/add', $data);
            }
        }
        public function show($id){
            $news = $this->newsModel->getNewsById($id);
            $user = $this->userModel->getUserById($news->user_id);
            $currentURL = $this->getCurrentPageURL();
            $data = [
                'news' => $news,
                'user' => $user,
                'currentURL' => $currentURL
            ];
            $this->view('artikel/show', $data);
        }

        public function edit($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      
                $data = [
                    'id' => $id,
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'user_id' => $_SESSION['user_id'],
                    'title_err' => '',
                    'body_err' => ''
                ];

                //Validasi data
                if(empty($data['title'])){
                    $data['title_err'] = 'Mohon masukkan judul!';
                }
                if(empty($data['body'])){
                    $data['body_err'] = 'Mohon masukkan isi teks!';
                }

                //memastikan tidak ada error
                if(empty($data['title_err']) && empty($data['body_err'])){
                    if($this->newsModel->updateNews($data)){
                        flash('post_message', 'Artikel Diedit!');
                        redirect('admin/news');
                    }else{
                        die('Ada yang salah! Silahkan coba lagi!');
                    }
                } else {
                    $this->view('artikel/edit', $data);
                }
            }else{
                //cek post
                $news = $this->newsModel->getNewsById($id);
                //cek user
                if($news->user_id != $_SESSION['user_id']){
                    redirect('admin/news');
                }
                $data = [
                    'id' => $id,
                    'title' => $news->title,
                    'body' => $news->body
    
                ];
                $this->view('artikel/edit', $data);
            }
        }
        public function delete($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //cek post
                $news = $this->newsModel->getNewsById($id);
                //cek user
                if($news->user_id != $_SESSION['user_id']){
                    redirect('admin/news');
                }
                
                if($this->newsModel->deleteNews($id)){
                    flash('post_message', 'Post dihapus!');
                    redirect('admin/news');
                } else {
                    die('Ada yang salah! silahkan coba lagi!');
                }
            } else {
                redirect('admin/news');
            }
        }
        // Fungsi untuk mendapatkan URL halaman saat ini
        function getCurrentPageURL() {
            $pageURL = 'http';
            // if ($_SERVER["HTTPS"] == "on") {
            //     $pageURL .= "s";
            // }
            $pageURL .= "://";
            if ($_SERVER["SERVER_PORT"] != "80") {
                $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
            } else {
                $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
            }
            return $pageURL;
        }
    }