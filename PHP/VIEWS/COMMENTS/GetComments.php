<?php
require('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\CONTROLLERS\CommentsController.php');
$commentController = new CommentsController();
$comments = $commentController->GetComments();
$total_comments = count($comments);
$comments_this_month = 0;
foreach ($comments as $comment) {
    if (date('Y-m', strtotime($comment->date)) == date('Y-m')) {
        $comments_this_month++;
    }
}
?>