<?php 
session_start();
require_once '../vendor/autoload.php';

use \Captcha\Captcha;


if(isset($_POST['submit'])){

	if(Captcha::check()){
		die('answer is correct');
	}else{
		die('answer is incorrect');
	}
}

$capctha = new Captcha();

?>

<form action="" method="post">
    <p>Answer it <?php echo $capctha ?> <br>
        <input type="text" name="captcha">
    </p>
    <p><button type="submit" name="submit">Submit</button></p>
</form>

