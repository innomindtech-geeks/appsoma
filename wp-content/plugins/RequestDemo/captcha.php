<?php



class captchaCls {

	var $font = 'monofont.ttf';

	function getCaptcha($str) {
		$randStr = 'abcdfghjkmnpqrstvwxyz123456789';
		$captchaCode = '';
		$i = 0;
		while ($i < $str) { 
			$captchaCode .= substr($randStr, mt_rand(0, strlen($randStr)-1), 1);
			$i++;
		}
		return $captchaCode;
	}

	function captchaCls($width='120',$height='40',$str='6') {
		$captchaCode = $this->getCaptcha($str);
		
		$font_size = $height * 0.75;
		$image = @imagecreate($width, $height) or die('Cannot initialize image ');
	
		$background_color = imagecolorallocate($image, 255, 255, 255);
		$text_color = imagecolorallocate($image, 20, 40, 100);
		$noise_color = imagecolorallocate($image, 190, 199, 224);
		
		for( $i=0; $i<($width*$height)/3; $i++ ) {
			imagefilledellipse($image, mt_rand(0,$width), mt_rand(0,$height), 1, 1, $noise_color);
		}
		
		for( $i=0; $i<($width*$height)/150; $i++ ) {
			imageline($image, mt_rand(0,$width), mt_rand(0,$height), mt_rand(0,$width), mt_rand(0,$height), $noise_color);
		}
		
		$textbox = imagettfbbox($font_size, 0, $this->font, $captchaCode) or die('Error in imagettfbbox function');
		$x = ($width - $textbox[4])/2;
		$y = ($height - $textbox[5])/2;
		imagettftext($image, $font_size, 0, $x, $y, $text_color, $this->font , $captchaCode) or die('Error in imagettftext function');
		
		header('Content-Type: image/jpeg');
		imagejpeg($image);
		imagedestroy($image);
		$_SESSION['security_captchaCode'] = $captchaCode;
	}

}

$width = isset($_GET['width']) ? $_GET['width'] : '120';
$height = isset($_GET['height']) ? $_GET['height'] : '40';
$str = isset($_GET['str']) && $_GET['str'] > 1 ? $_GET['str'] : '6';

$captcha = new captchaCls($width,$height,$str);

?>