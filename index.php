<?php

require_once 'Autoloader.php';

use Blog\Autoloader;

use Blog\controller\{
    PostController,
    CommentController,
    ContactController,
    UserController
};

Autoloader::register();
session_start();

/**
 * Choose the action according to the request
 */
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'post') {
        $post = new PostController();
        $post->post();
    } elseif ($_GET['action'] == 'addComment') {
        $comment = new CommentController();
        $comment->addComment($_GET['id']);
    } elseif ($_GET['action'] == 'reportComment') {
        $comment = new CommentController();
        $comment->reportComment();
    } elseif ($_GET['action'] == 'showContactPage') {
        $message = new ContactController();
        $message->showContactPage();
    } elseif ($_GET['action'] == 'addMessage') {
        $message = new ContactController();
        $message->addMessage();
    } elseif ($_GET['action'] == 'showRegisterPage') {
        $user = new UserController();
        $user->showRegisterPage();
    } elseif ($_GET['action'] == 'addNewUser') {
        $user = new UserController();
        $user->addNewUser($_POST['username'], $_POST['password']);
    } elseif ($_GET['action'] == 'showLoginPage') {
        $view = new UserController();
        $view->showLoginPage();
    } elseif ($_GET['action'] == 'welcome') {
        $userLogedIn = new UserController();
        $userLogedIn->welcome($_POST['username'], $_POST['password']);
    } elseif ($_GET['action'] == 'logOut') {
        $session = new UserController();
        $session->logOut();
    } elseif ($_GET['action'] == 'loginListPosts') {
        $post = new PostController();
        $post->loginListPosts();
    } elseif ($_GET['action'] == 'errorView') {
        $post = new PostController();
        $post->errorView();
    } elseif (!empty($_SESSION)) {
        if (($_SESSION['role']) == 'admin' && isset($_GET['action'])) {
            if ($_GET['action'] == 'showAdminPanel') {
                $admin = new UserController();
                $admin->showAdminPanel();
            } elseif
            ($_GET['action'] == 'createPostView') {
                $post = new PostController();
                $post->createPostView();
            } elseif
            ($_GET['action'] == 'sendPost') {
                $post = new PostController();
                $post->sendPost();
            } elseif
            ($_GET['action'] == 'modifyPost') {
                $post = new PostController();
                $post->modifyPost();
            } elseif
            ($_GET['action'] == 'modifyPostView') {
                $post = new PostController();
                $post->modifyPostView();
            } elseif
            ($_GET['action'] == 'deletePost') {
                $post = new PostController();
                $post->deletePost();
            } elseif
            ($_GET['action'] == 'showAdminCommentsView') {
                $comment = new userController();
                $comment->showAdminCommentsView();
            } elseif
            ($_GET['action'] == 'supComment') {
                $comment = new CommentController();
                $comment->supComment();
            }
        } else {
            $view = new UserController();
            $view->error();
        }
    } else {
        $view = new UserController();
        $view->error();
    }

} else {
    $post = new PostController();
    $post->listPosts();
}
