<?php

class CommunityModel{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getSinglePost($id){
        $this->db->query('SELECT * FROM posts WHERE post_id = :postID');
        $this->db->bind(':postID', $id);
        $post = $this->db->getRes();
        return $post;
    }

    public function getAllPosts(){
        $this->db->query('SELECT * FROM posts');
        $posts = $this->db->getAllRes();
        return $posts;
    }

    public function addNewPost($data){
        $this->db->query('INSERT INTO posts(post_title, category,post_thumbnail, post_desc,author) VALUES (:post_title, :category, :post_thumbnail, :post_desc, :author)');
        $this->db->bind(':post_title', $data['title']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':post_thumbnail', $data['post_thumbnail']);
        $this->db->bind(':post_desc', $data['post_desc']);
        $this->db->bind(':author', $data['author']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function updatePost($postID, $newData){
        $this->db->query('UPDATE posts SET post_title = :post_title, category = :category, post_thumbnail = :thumbnail, post_desc = :post_desc WHERE post_id = :postID');
        $this->db->bind(':post_title', $newData['title']);
        $this->db->bind(':category', $newData['category']);
        $this->db->bind(':thumbnail', $newData['post_thumbnail']);
        $this->db->bind(':post_desc', $newData['post_desc']);
        $this->db->bind('postID', $postID);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function deletePost($postID){
        $this->db->query('DELETE FROM posts WHERE post_id = :postID');
        $this->db->bind(':postID', $postID);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function searchPosts($keyword){
        $this->db->query('SELECT * FROM posts WHERE post_title LIKE :keyword OR post_desc LIKE :keyword OR category LIKE :keyword');
        $this->db->bind(':keyword', $keyword);
        $posts = $this->db->getAllRes();
        return json_encode($posts);
    }

    public function getBestPosts(){
        $this->db->query('SELECT * FROM posts ORDER BY votes DESC');
        $posts = $this->db->getAllRes();
        return json_encode($posts);
    }

    public function getLatestPosts(){
        $this->db->query('SELECT * FROM posts ORDER BY posted_at DESC');
        $posts = $this->db->getAllRes();
        return json_encode($posts);
    }

    public function getSavedPosts($author){
        $this->db->query('SELECT * FROM saved_post WHERE post_author = :author');
        $this->db->bind(':author', $author);
        $posts = $this->db->getAllRes();
        return json_encode($posts);
    }

    public function getPostsByUser($author){
        $this->db->query('SELECT * FROM posts WHERE author = :author');
        $this->db->bind(':author', $author);
        $posts = $this->db->getAllRes();
        return json_encode($posts);
    }

    public function getAllComments($id){
        $this->db->query('SELECT * FROM comments WHERE post_id = :id');
        $this->db->bind(':id', $id);
        $comments = $this->db->getAllRes();
        return $comments;
    }
}