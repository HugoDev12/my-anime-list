<?php

namespace App;

class Image {

    private $file;
    private static $error = false;
    private static $message = "";

    private $fileName;    
    private $fileTmpPath; // The path of user's file
    private $fileExtension;
    private $fileSize; // Eventually if you want to limit size file
    


    public function __construct(array $file){
        $this->file = $file;
        $this->fileName = $this->file["name"];
        $this->fileTmpPath = $this->file["tmp_name"];
        $this->fileExtension = str_replace("image/" , "", $this->file["type"]);
        $this->fileSize = $this->file["size"];
    }

    public function error(){

        // check if there is no error in file
        if(!($this->file["error"] === UPLOAD_ERR_OK)){
            self::$error = true;
            self::$message = 'Une erreur est survenue lors du téléchargement.';
            self::$message .= 'Error:' . $_FILES['uploadedFile']['error'];
        }

        // check if the image's extension is allowed
        $allowedfileExtensions = array('jpg', 'png', 'jpeg');
        if(!in_array($this->fileExtension,$allowedfileExtensions)){
            self::$error = true;
            self::$message = 'Le type de fichier choisi n\'est pas valide. les extensions autorisées sont :' . implode(',', $allowedfileExtensions);

        }

        // check image size
        if($this->fileSize > 3145728){ //3mb size
            self::$error = true;
            self::$message = 'la taille de l\'image choisie est trop importante.';
        }

        return self::$error ? self::$message : false;


    }

    public function upload(){
        
        $uploadFileDir = str_replace("app", "imgs\\", __DIR__);
        $dest_path = $uploadFileDir . $this->fileName;
        move_uploaded_file($this->fileTmpPath, $dest_path);

        // add remove bg image
        $command = escapeshellcmd("python ../remove_bg.py ". $this->fileName);
        exec($command, $output, $resultCode);
    }

    public function replace($oldImg){
     
        $path = str_replace("app", "imgs\\", __DIR__);
        $dest_path = str_replace("\\", "/", $path);
        // remove old image
        unlink($dest_path.$oldImg);
        // add new one
        self::upload();

        // à continuer ici
    }

}

