<?php
    include ('../classes/image-contr.classes.php');
  
    if(isset($_POST["load"])){
        if( !empty( $_FILES["image"]["name"] ) ){

            $fileName = basename($_FILES["image"]["name"]);
            echo 'Prueba para ver si puedo ver el name';
            $imageType = strtolower( pathinfo($fileName,PATHINFO_EXTENSION) );
            $imageType = $imageType . 'hola';
            $allowedTypes = array('png','jpg','gif');
            if( in_array($imageType,$allowedTypes) ){

                $imageName = $_FILES["image"]["tmp_name"];
                $image64 = base64_encode(file_get_contents($imageName));
                $realImage = 'data:image/'.$imageType.';base64,'.$image64;
                ImageContr::withImage($realImage)->uploadImage();

            }else{
                header("location: ../index.php?error=non-valid-extension");
                exit();
            }
        }
        else{
            header("location: ../upload.php?error=no-file-selected");
            exit();
        }
        
        header("location: ../upload.php?error=none");
        exit();
    }
    else if(isset($_POST["search"])){
        $imageId = $_POST["imageId"];
        ImageContr::withImageId($imageId)->searchImage();
        header("location: ../search.php?error=none");
        exit();
    }
?>