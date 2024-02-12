<?php

namespace App\Services;

class ImageService
{
    public function generateImage($text, $filename)
    {
        $width = 800;
        $height = 400;
        $fontFile = public_path('fonts/Sixtyfour-Regular-VariableFont_BLED,SCAN.ttf.ttf');
        $fontSize = 20;
        $fontColor = [255, 255, 255];
        
        $image = imagecreatetruecolor($width, $height);
        imagesavealpha($image, true);
        $transparent = imagecolorallocatealpha($image, 0, 0, 0, 127);
        imagefill($image, 0, 0, $transparent);

        $textBox = imagettfbbox($fontSize, 0, $fontFile, $text);
        $textWidth = $textBox[2] - $textBox[0];
        $x = ($width - $textWidth) / 2;
        $y = ($height - ($textBox[7] - $textBox[1])) / 2;
        $color = imagecolorallocate($image, $fontColor[0], $fontColor[1], $fontColor[2]);
        imagettftext($image, $fontSize, 0, $x, $y, $color, $fontFile, $text);

        $path = public_path("assets/logoUtilisateur/{$filename}.png");
        imagepng($image, $path);
        imagedestroy($image);
    }
}
