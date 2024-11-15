<?php

class CaptchaSecurityImages {
  
    var $font = 'front/assets/fonts/template/default/public/font/arabica/arabica-webfont.ttf';  // เปลี่ยน font ได้ตามต้องการ

    function generateCode($characters) {
        $possible = 'abcdefghjkmnpqrstvwxyz123456789';  // ตัวอักษรที่ต้องการจะเอาสุ่มเป็น Captcha
        $code = '';
        $i = 0;
        while ($i < $characters) {
            $code .= substr($possible, mt_rand(0, strlen($possible) - 1), 1);
            $i++;
        }
        return $code;
    }

    function Callcode($width = '120', $height = '40', $characters = '6') {
        if (!file_exists($this->font)) {
            echo "empty font : " . $this->font . " | ";
        }
        $code = $this->generateCode($characters);
        $font_size = $height * 0.8;  // font size ที่จะโชว์ใน Captcha
        $image = imagecreate($width, $height) or die('Cannot initialize new GD image stream');
        $background_color = imagecolorallocate($image, 255, 255, 255);  // กำหนดสีในส่วนต่่างๆ
        $text_color = imagecolorallocate($image, 0, 30, 30);
        $noise_color = imagecolorallocate($image, 172, 208, 95);
        for ($i = 0; $i < ($width * $height) / 5; $i++) { // สุ่มจุดภาพพื้นหลัง
            imagefilledellipse($image, mt_rand(0, $width), mt_rand(0, $height), 1, 1, $noise_color);
        }
        for ($i = 0; $i < ($width * $height) / 200; $i++) { // สุ่มเ้ส้นภาพพื้นหลัง
            imageline($image, mt_rand(0, $width), mt_rand(0, $height), mt_rand(0, $width), mt_rand(0, $height), $noise_color);
        }
        /* สร้าง Text box และเพิ่ม Text */
        $textbox = imagettfbbox($font_size, 0, $this->font, $code) or die('Error in imagettfbbox function');
        $x = ($width - $textbox[4]) / 2;
        $y = ($height - $textbox[5]) / 2;
        imagettftext($image, $font_size, 0, $x, $y, $text_color, $this->font, $code) or die('Error in imagettftext function');
        /* display captcha image ไปที่ browser */
        return array($code, $image);
    }

}
