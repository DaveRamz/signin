<?php
include "../classes/dbh.classes.php";
class Comments extends Dbh{

    protected function getComments($newsId){
        
        $stmt = $this->connect()->prepare('CALL P_GET_COMMENT_NEWS(?);');
        if(!$stmt->execute(array($newsId))){  
            $stmt = null;
            header("location: ../comments.php?error=stmt_failed");
            exit();
        }
        if($stmt->rowCount() == 0){
            $stmt = null;
            header("location: ../comments.php?error=no_comments_found");
            exit();
        }

        $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
        session_start();
        $_SESSION["NEWS_COMMENTS"] = $comments;
        $stmt = null;
        return $comments;
    }
}
?>