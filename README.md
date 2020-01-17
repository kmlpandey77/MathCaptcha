# MathCaptcha
A Simple PHP Math Captcha



## Preview
### Math in Image
![A Simple PHP Math Captcha](https://raw.githubusercontent.com/kmlpandey77/MathCaptcha/master/PreviewImage.png "Captcha Preview")

### Math in Text
![A Simple PHP Math Captcha](https://raw.githubusercontent.com/kmlpandey77/MathCaptcha/master/PreviewText.png "Captcha Preview")


## Usage

### Math in Image
It will return Math in image

Create `captcha.php`

```php
<?php
require_once '../vendor/autoload.php';

use Kmlpandey77\MathCaptcha\Captcha;

$captcha = new Captcha();
$captcha->image();
```

Create `form.php`

```html
<form action="check.php" method="post">
    <p>
        Answer it <img src="./captcha.php" alt="" valign="middle">  <input type="text" name="captcha">
    </p>
    <p><button type="submit" name="submit">Submit</button></p>
</form>
```


Create `check.php`

```php

require_once '../vendor/autoload.php';
use Kmlpandey77\MathCaptcha\Captcha;

if(isset($_POST['submit'])){

	if(Captcha::check()){

        //valid action

        echo('<font color="green">Answer is valid</font>');
	}else{
		echo('<font color="red">Answer is invalid</font>');
	}
}
```


### Math in Text
It will return Math in text

Create `form.php`

```php
require_once '../vendor/autoload.php';

use Kmlpandey77\MathCaptcha\Captcha;

```

```html
<form action="check.php" method="post">
    <p>
        Answer it <?php echo new Captcha; ?>  <input type="text" name="captcha">
    </p>
    <p><button type="submit" name="submit">Submit</button></p>
</form>
```


Create `check.php`

```php

require_once '../vendor/autoload.php';
use Kmlpandey77\MathCaptcha\Captcha;

if(isset($_POST['submit'])){

	if(Captcha::check()){
        echo('<font color="green">Answer is valid</font>');

        //valid action

	}else{
		echo('<font color="red">Answer is invalid</font>');
	}
}
```