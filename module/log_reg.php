<?php
	function log_reg($db){
		if (isset($_GET["reg"])) {
			// ----------------------------------
			$user_isset = '';
			if (isset($_POST["key_reg"])) {
				$email = $_POST['email'];
				$pass = md5($_POST['pass']);
				$code = md5(time().$email);
				if (mysqli_fetch_array(mysqli_query($db,"SELECT * FROM user WHERE email='$email'"))) {
					$user_isset = 'Цей e-mail вжезайнятий';
				}
				else{
					mysqli_query($db,"INSERT INTO user (id,email,pass,code) VALUES (NULL, '$email', '$pass','$code')");
					$_SESSION['user_code'] = $code;
					return true;
				}
			}
			// ---------------------------------
	
			echo '<form action="" id="log_form" method="post">
				<h3>Зареєструватися</h2>
				<span>E-mail:</span>
				<input type="email" name="email" placeholder="E-mail" required>'.$user_isset.'
				<span>Пароль:</span>
				<input type="password" name="pass" placeholder="Пароль" required>
				<div><input type="checkbox" required><a href="">Я згоден з правилами сервісу</a></div>
				<input type="submit" value="Зареєструватися" name="key_reg">
				<a href="?log">Увійти</a>
			</form>';
		}
		else
		{
			$user_unset = '';
			if (isset($_POST["key_log"])) {
				$email = $_POST['email'];
				$pass = md5($_POST['pass']);
				$code = md5(time().$email);
				if (mysqli_fetch_array(mysqli_query($db,"SELECT * FROM user WHERE email='$email' AND pass='$pass'"))) {
					$_SESSION['user_code'] = $code;
					mysqli_query($db,"UPDATE user SET code='$code' WHERE email='$email' AND pass='$pass'");
					return true;
									}
				else{
					$user_unset = 'Не правильні данні';
				}
			}
			// ------------------------------------
			echo '<form action="" id="log_form" method="post">
				<h3>Увійти</h2>
				<span>E-mail:</span>
				<input type="email" name="email" placeholder="E-mail" required>
				'.$user_unset.'
				<span>Пароль:</span>
				<input type="password" name="pass" placeholder="Пароль" required>
				<input type="submit" value="Увійти" name="key_log">
				<a href="?reg">Зареєструватися</a>
			</form>';
		}
	}

 ?>