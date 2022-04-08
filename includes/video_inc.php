<?php
    include ('../classes/video-contr.classes.php');
  
    if(isset($_POST["load"])){
        if( !empty( $_FILES["video"]["name"] ) ){

            $fileName = basename($_FILES["video"]["name"]);
            $videoType = strtolower( pathinfo($fileName,PATHINFO_EXTENSION) );
            $allowedTypes = array('mp4','wav');
            
            if( in_array($videoType,$allowedTypes) ){

                $videoName = $_FILES["video"]["tmp_name"]; //Ruta del servidor donde esta el video temporalmente mientras procesamos
                $video64 = base64_encode(file_get_contents($videoName));
                $realVideo = 'data:video/'.$videoType.';base64,'.$video64;
                VideoContr::withVideo($realVideo)->uploadVideo();

            }else{
                header("location: ../upload_video.php?error=non-valid-extension");
                exit();
            }
        }
        else{
            header("location: ../upload_video.php?error=no-file-selected");
            exit();
        }
        
        header("location: ../upload_video.php?error=none");
        exit();
    }
    else if(isset($_POST["search"])){
        $videoId = $_POST["videoId"];
        VideoContr::withVideoId($videoId)->searchVideo();
        header("location: ../search_video.php?error=none");
        exit();
    }
?>