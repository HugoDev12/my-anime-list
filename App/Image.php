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

    // public function test2(){
        // $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        // return $actual_link;
        // require '../'

        // $command = escapeshellcmd("python ../RemoveBg/remove_bg.py ". join(" ", $this->file));
        // exec($command, $output, $resultCode);
        // return $output;

        // shell_exec("python ../RemoveBg/remove_bg.py ". $this->file);


    // }


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
    }

    public function replace($oldImg){
     
        $path = str_replace("app", "imgs\\", __DIR__);
        $dest_path = str_replace("\\", "/", $path);
        // remove old image
        unlink($dest_path.$oldImg);
        // add new one
        self::upload();
    }

    public function getTmp(){
        return $this->fileTmpPath;
    }
}


//     public function test(){
//         if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload the File'){
//             if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK){

//                 // uploaded file details

//                 $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];

//                 $fileName = $_FILES['uploadedFile']['name'];

//                 $fileSize = $_FILES['uploadedFile']['size'];

//                 $fileType = $_FILES['uploadedFile']['type'];

//                 $fileNameCmps = explode(".", $fileName);

//                 $fileExtension = strtolower(end($fileNameCmps));

//                 // removing extra spaces

//                 $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

//                 // file extensions allowed

//                 $allowedfileExtensions = array('jpg', 'png');

//                 if (in_array($fileExtension, $allowedfileExtensions)){

//                     // directory where file will be moved

//                     $uploadFileDir = str_replace("pages", "imgs/", __DIR__);

//                     $dest_path = $uploadFileDir . $newFileName;

//                     if(move_uploaded_file($fileTmpPath, $dest_path)){

//                         $message = 'File uploaded successfully.';
//                     }else{
//                         $message = 'An error occurred while uploading the file to the destination directory. Ensure that the web server has access to write in the path directory.';
//                     }

//                 }else{
//                 $message = 'Upload failed as the file type is not acceptable. The allowed file types are:' . implode(',', $allowedfileExtensions);
//                 }
//             }else{
//             $message = 'Error occurred while uploading the file.<br>';

//             $message .= 'Error:' . $_FILES['uploadedFile']['error'];
//             }

//         }
//     }
// }
