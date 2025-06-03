<?php

class Filigran
{
    private $uploadDir = "uploads/";
    public $resimYuklendi = false;
    public $outputFilePath = "";

    public function __construct()
    {
        if (!is_dir($this->uploadDir)) {
            mkdir($this->uploadDir, 0777, true);
        }
    }

    public function yukleVeFiligranEkle($file)
    {
        $tmpName = $file['tmp_name'];
        $fileType = mime_content_type($tmpName);

        if (!in_array($fileType, ['image/jpeg', 'image/png'])) {
            return false;
        }

        $uploadedFileName = basename($file['name']);
        $uploadedFilePath = $this->uploadDir . $uploadedFileName;

        if (!move_uploaded_file($tmpName, $uploadedFilePath)) {
            return false;
        }

        $this->resimYuklendi = true;

        list($width, $height) = getimagesize($uploadedFilePath);
        $image = imagecreatetruecolor($width, $height);

        $target = $fileType === 'image/jpeg'
            ? imagecreatefromjpeg($uploadedFilePath)
            : imagecreatefrompng($uploadedFilePath);

        imagecopyresampled($image, $target, 0, 0, 0, 0, $width, $height, $width, $height);

        $yazim = "ENES FİLİGRAN";
        $renk = imagecolorallocate($image, 200, 200, 200);
        $font = realpath('corbelz.ttf');
        $fontSize = 20;

        $box = imagettfbbox($fontSize, 0, $font, $yazim);
        $x = $width - ($box[2] - $box[0]) - 10;
        $y = $height - 10;

        imagettftext($image, $fontSize, 0, $x, $y, $renk, $font, $yazim);

        $outputFileName = "filigran_" . $uploadedFileName;
        $this->outputFilePath = $this->uploadDir . $outputFileName;

        $fileType === 'image/jpeg'
            ? imagejpeg($image, $this->outputFilePath)
            : imagepng($image, $this->outputFilePath);

        imagedestroy($target);
        imagedestroy($image);

        return true;
    }
}
