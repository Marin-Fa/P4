<?php

namespace Blog\controller;

use Blog\model\{
    PostManager,
    CommentManager
};

class PostController
{
    public $msg = "";
    public $p = "";

    public function listPosts()
    {
        $postManager = new PostManager(); // Creation obj 
        $posts = $postManager->getPosts(); // Call the function
        $this->msg = "Jean Forteroche";
        $this->p = "Far far away, behind the mountains, far from the industrial wolrd, lives the peacefull place in the world.";


        require 'view/listPostsView.php';
    }
    public function post()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $postManager = new PostManager();
            $commentManager = new CommentManager();
            $post = $postManager->getPost($_GET['id']);
            $comments = $commentManager->getComments($_GET['id']);
        } else {
            throw new \Exception('Aucun identifiant de billet envoyé');
        }

        require 'view/postView.php';
    }
}
