<?php

namespace Blog\model;

use Blog\model\Comment;

use PDO;

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, post_id, author, comment, status, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute([$postId]);

        return $comments;
    }

    public function getAdminComments()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, author, comment, status, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr, post_id FROM comments WHERE status = 1 ORDER BY comment_date DESC');

        return $req;

    }

    // Add comment
    public function createComment(Comment $comment)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO comments(post_id, author, comment, status, comment_date) VALUES (?,?, ?, 0, NOW())');
        $req->execute([
            $comment->getPostId(),
            $comment->getAuthor(),
            $comment->getComment()
        ]);

        return $req;
    }

    public function getComment($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT post_id FROM comments WHERE id = ?');
        $req->execute([$postId]);
        $req->fetch();
//        var_dump($req);

        return $req;
    }

    public function getNbComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT COUNT(*) AS nb_comments FROM comments WHERE post_id = ?');
        $comments->execute([$postId]);
        $nbComments = $comments->fetch();

        return $nbComments;
    }

    public function getNbCommentAdmin()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT COUNT(comments.id) AS nb_comments, posts.title AS title, posts.content AS content, posts.id AS post_id, posts.creation_date AS creation_date_fr FROM comments
            INNER JOIN posts ON comments.post_id = posts.id
            GROUP BY comments.post_id');

        return $req;
    }

    public function updateStatusComment($commentId)
    {

        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET status = 1 WHERE id = ?');
        $newStatus = $req->execute([$commentId]);
//        var_dump($newStatus);
        return $newStatus;
    }

    public function deleteComment($commentId)
    {
        $db = $this->dbConnect();
        $deleteComment = $db->prepare('DELETE FROM comments WHERE id = ?');
        $deleteComment->execute([$commentId]);
    }

//    public function readOneComment($postId, $commentId)
//    {
//        $db = $this->dbConnect();
//        $comment = $db->prepare('SELECT id, author, comment, comment_date, post_id FROM comments WHERE post_id = ? AND id = ?');
//        $comment->execute(array($postId, $commentId));
//        $myComment = $comment->fetch();
//
//        return $myComment;
//    }
    // public function update($author, $comment, $postId, $id)
    // {
    //     var_dump($author, $comment, $postId, $id);
    //     $db = $this->dbConnect();
    //     $commentPo = $db->prepare('UPDATE comments SET author = :author, comment = :comment, comment_date = NOW() WHERE post_id = :post_id AND id = :id');

    //     $modifiedLine = $commentPo->execute(array(
    //         'author' => $author,
    //         'comment' => $comment,
    //         'post_id' => $postId,
    //         'id' => $id
    //     ));

    //     return $modifiedLine;
    // }
}
