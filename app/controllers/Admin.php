<?php
    class Admin extends Controller {
        public function __construct() {
            if(!isLoggedIn()){ //fungsi berada di Session helper
                redirect('');
            }
            $this->postModel = $this->model('Post');
            $this->userModel = $this->model('User');
            $this->newsModel = $this->model('News');
        }
        public function index(){
            
            $this->view('admin/index');
        }
        public function posts(){
            $posts = $this->postModel->getPosts();
            $data = [
                'posts' => $posts
            ];
            $this->view('admin/posts', $data);
        }
        public function users(){
            $data = [
                
            ];
            $this->view('admin/users', $data);
        }

        public function show($id){
            $post = $this->postModel->getPostById($id);
            $user = $this->userModel->getUserById($post->user_id);
            $data = [
                'post' => $post,
                'user' => $user
            ];
            $this->view('admin/show', $data);
        }

        public function delete($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //cek post
                $post = $this->postModel->getPostById($id);
                //cek user
                if($post->user_id != $_SESSION['user_id']){
                    redirect('admin/posts');
                }
                
                if($this->postModel->deletePost($id)){
                    flash('post_message', 'Post dihapus!');
                    redirect('admin/posts');
                } else {
                    die('Ada yang salah! silahkan coba lagi!');
                }
            } else {
                redirect('admin/posts');
            }
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
                    if($this->postModel->updatePost($data)){
                        flash('post_message', 'Post Diedit!');
                        redirect('posts');
                    }else{
                        die('Ada yang salah! Silahkan coba lagi!');
                    }
                } else {
                    $this->view('admin/edit', $data);
                }
            }else{
                //cek post
                $post = $this->postModel->getPostById($id);
                //cek user
                if($post->user_id != $_SESSION['user_id']){
                    flashRed('post_message', 'Tidak diizinkan!');
                    redirect('admin/posts');
                }
                $data = [
                    'id' => $id,
                    'title' => $post->title,
                    'body' => $post->body
    
                ];
                $this->view('admin/edit', $data);
            }
        }
        public function add(){
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
                    if($this->postModel->addPost($data)){
                        flash('post_message', 'Post Ditambahkan');
                        redirect('admin');
                    }else{
                        die('Ada yang salah! Silahkan coba lagi!');
                    }
                } else {
                    $this->view('admin/add', $data);
                }
            }else{
                $data = [
                    'title' => '',
                    'body' => ''
    
                ];
                $this->view('admin/add', $data);
            }
        }
        public function news(){
            $news = $this->newsModel->getNews();
            $data = [
                'news' => $news
            ];
            $this->view('admin/news', $data);
        }
        public function shows($id){
            $news = $this->newsModel->getNewsById($id);
            $user = $this->userModel->getUserById($news->user_id);
            $data = [
                'news' => $news,
                'user' => $user
            ];
            $this->view('admin/shows', $data);
        }
    }