<?php
    class News {
        private $db;

        function __construct() {
            $this->db = new Database;
        }

        public function getNews(){
            $this->db->query('SELECT *,
                                news.id as newsId,
                                users.id as userId,
                                news.created_at as newCreated,
                                users.created_at as userCreated
                                FROM news
                                INNER JOIN users
                                ON news.user_id = users.id
                                ORDER BY news.created_at DESC
                                ');
                                
            $results = $this->db->resultSet();

            return $results;
        }

        public function getImage($id){
            $this->db->query('SELECT image FROM news WHERE id = :id');
            $this->db->bind(':id', $data['id']);
            $images = $this->db->single();
            return $images;
        }
        public function addNews($data){
            $this->db->query('INSERT INTO news (title, user_id, body) VALUES (:title, :user_id, :body)');

            //Binding Value
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':body', $data['body']);

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
        public function getNewsById($id){
            $this->db->query('SELECT * FROM news WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }
        public function updateNews($data){
            $this->db->query('UPDATE news SET title = :title, body = :body WHERE id = :id');

            //Binding Value
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':body', $data['body']);

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
        public function deleteNews($id){
            $this->db->query('DELETE FROM news WHERE id = :id');

            //Binding Value
            $this->db->bind(':id', $id);

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
    }