<?php

class FileUploader{
    private static $target_directory = "uploads/";
    private static $size_limit = 50000;
    private $UploadOk =false;
    private $file_original_name;
    private $file_size;
    private $final_file_name;
    private $file_temp_name;

    
    public function setfileTmpName($tmp){
        $this->file_temp_name = $tmp;
    }
    public function getfileTmpName(){
        return $this->file_temp_name;
    }
    public function setOriginalName($name){
        $this->file_original_name = $name;
    }
    public function getOriginalName(){
        return $this->file_original_name;
    }
    public function setFileSize($size){
        $this->file_size = $size;
    }
    public function getFileSize()
    {
        return $this->file_size;
    }
    public function setFinalFileName($file_name){
        $this->final_file_name = $file_name;
    }
    public function getFinalFileName(){
        return $this->final_file_name;
    }
    public function uploadFile(){
        $this->fileTypeIsCorrect();
        $this->fileSizeIsCorrect();
        $this->fileAlreadyExists();
        $uploadok = $this->UploadOk;

        if( $uploadok == true){
            $this->moveFile();
            echo "File upload was successful";
        }else
        {
            echo "An error occured when trying to upload the file";
        }
    }
    public function fileAlreadyExists(){
        $exist = $this->getFinalFileName();
        if (file_exists($exist)) {
            echo "Sorry, file already exists.";
            $this->UploadOk = false;
          }
          else
          {
            $this->UploadOk = true;
          }
    }

    public function moveFile(){
        $filetempo = $this->getfileTmpName();
        $filenameon = $this->getOriginalName();
        $target_file = self::$target_directory . basename($filenameon); 
        if(move_uploaded_file($filetempo,$target_file))
        {
            echo "The file ". basename($filenameon) 
            . " has been uploaded.<br>"; 
            $this->UploadOk = true;
        }  
        else{
            echo "The file was not moved to the directory";
            $this->UploadOk = false;
        }
    }
    public function fileTypeIsCorrect(){
        
        $filenames = $this->getOriginalName();
        $file_extension = explode('.',$filenames);
        $new_file_extension = strtolower(end($file_extension));         
        $extension = array('jpg', 'gif', 'png', 'jpeg');
        if (in_array($new_file_extension, $extension)) {
            $this->UploadOk = true;
            }
        else
        {
            echo "File extension is not acceptable";
            $this->UploadOk = false;
        }
    }
    public function fileSizeIsCorrect()
    {
        $size = $this->getFileSize();
        if ($size <= self::$size_limit) {
            $this->UploadOk = true;
        } else {
            echo "File size is too large";
            $this->UploadOk = false;
        }
    }
}    
?>




