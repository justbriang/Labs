
<?php
class FileUploader
{

    private $target_directory = "uploads/";
    private static $size_limit = 5000;
    private $file_orginal_name;
    private $uploadOK = 1;
    private $file_type;
    private $file_size;
    private $final_file_name;
    private $fileTmpPath;
    public function __construct($fileTmpPath, $fileName, $fileSize, $filetype, $fileNameCmps, $fileExtension)
    {
        $this->file_size = $fileSize;
        $this->file_orginal_name = $fileName;
        $this->setOriginalName($fileName);
        $this->fileTmpPath = $fileTmpPath;
        $this->file_type = $filetype;
    }
    public function setOriginalName($name)
    {
        $this->file_original_name = $this->target_directory .basename( $name);

    }

    public function getOriginalName()
    {

        return $this->file_original_name;

    }

    public function setFileType($type)
    {
        $this->file_type = $type;

    }
    public function getFileType()
    {
        $this->file_type;

    }
    public function setFileSize($size)
    {
        $this->file_size = $size;

    }
    public function getFileSize()
    {
        $this->file_size;

    }
    public function setFinalFileName($final_name)
    {
        $this->final_file_name = $final_name;

    }
    public function getFinalFileName()
    {

        return $this->final_file_name;
    }
    public function uploadFile()
    {
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            saveFilePathTo();
        }
    }

    public function fileAlreadyExists()
    {
        if (file_exists($this->final_file_name)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        fileSizeIsCorrect();
    }
    public function saveFilePathTo()
    {
        if (move_uploaded_file($this->fileTmpPath, $this->file_orginal_name)) {
            echo "The file " . $this->file_orginal_name . " has been uploaded.";
            return true;
        } else {
            echo "Sorry, there was an error uploading your file.";
            return false;
        }}
    public function moveFile()
    {}
    public function fileTypeIsCorrect()
    {if ($this->file_type != "jpg" && $this->file_type != "png" && $this->file_type != "jpeg"
        && $this->file_type != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;

    }
        uploadFile();
    }
    public function fileSizeIsCorrect()
    {
        if ($this->file_size > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        fileTypeIsCorrect();
    }
    public function fileWasSelected()
    {

        if ($this->fileTmpPath !== false) {
            echo "File is an image - " . $this->fileTmpPath["mime"] . ".";
            $uploadOk = 1;
            file_exists();
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

}
?>
