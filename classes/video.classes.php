<?php 
    include "../classes/dbh.classes.php";

    class Video extends Dbh{

        protected function upload($video){
            $stmt = $this->connect()->prepare('INSERT INTO BD_VIDEO(VIDEO_BLOB,CREATION_DATE) VALUES(?,sysdate());');
            if(!$stmt->execute(array($video))){
                $stmt = null;
                header("location: ../upload_video.php?error=stmtfailed");
                exit();
            }
            $stmt = null;
        }

        protected function search($videoId){
            $stmt = $this->connect()->prepare('SELECT VIDEO_BLOB FROM BD_VIDEO WHERE VIDEO_ID = ?;');
            if(!$stmt->execute(array($videoId))){
                $stmt = null;
                header("location: ../search_video.php?error=stmtfailed");
                exit();
            }

            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location: ../search_video.php?error=videoNotFound");
                exit();
            }

            $videoRow = $stmt->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION["VIDEO_SEARCH"] = $videoRow[0]["VIDEO_BLOB"];
            $stmt = null;
        }

    }
?>