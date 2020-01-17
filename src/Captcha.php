<?php
namespace Kmlpandey77\MathCaptcha;

class Captcha {

    public $first_num;
    public $second_num;
    public $operators = array('+', '-');
    public $operator;
    protected $answer;

    function __construct(){
        if (session_status() == PHP_SESSION_NONE || session_status() == 1) {
            session_start();
        }

        $this->first_num = rand(1, 9);
        $this->second_num = rand(1, 9);
        $operator = rand(0, count($this->operators) -1);
        $this->operator = $this->operators[$operator];

        if($this->operator == '-' && $this->first_num < $this->second_num){
            $first = $this->second_num;
            $second = $this->first_num;
            $this->second_num = $second;
            $this->first_num = $first;
        }

        $this->calculater();
    }

    protected function calculater()
    {
        switch($this->operator){
            case '*':
            $this->answer = $this->first_num * $this->second_num;
            break;

            case '+':
            $this->answer = $this->first_num + $this->second_num;
            break;

            case '-':
            $this->answer = $this->first_num - $this->second_num;
            break;

        }

        $_SESSION['anser'] = $this->answer;
    }

    public function check()
    {
        return isset($_POST['captcha']) && isset($_SESSION['anser']) ?
                ((int) $_POST['captcha'] == $_SESSION['anser'])
                :false;
    }

    public function math()
    {
        return "{$this->first_num} {$this->operator} {$this->second_num}";
    }

    public function image()
    {
        $font = __DIR__ . '/font/gothambook.ttf';

        $image = imagecreatetruecolor(80, 25); //Change the numbers to adjust the size of the image
        $bg = imagecolorallocate($image, 0, 0, 0);
        $text_color = imagecolorallocate($image, 255, 255, 255);

        imagefilledrectangle($image,0,0,399,99, $text_color);
        imagettftext ($image, 14, 0, 10, 20, $bg, $font, $this->math() );//Change the numbers to adjust the font-size
        // var_dump($font, $image);exit;

        header("Content-type: image/png");
        imagepng( $image );

        // imagedestroy( $image );
    }

    function __toString()
    {
        return $this->math();
    }



}


