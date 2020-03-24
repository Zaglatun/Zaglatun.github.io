<?php
//--------------------------------------Классы------------------------------------------------------//
class User
{
// ----------------------------------------------Конект-------------------------------------------//
	public $conn;
	public function __construct($dbname,$dbuser, $dbpass)
		 {
	 	try{$this->conn = new PDO($dbname,$dbuser, $dbpass);}
	 catch(PDOException $e){echo 'Error: '.$e->getMessage();
	}
	return $this->conn;
          }
//-----------------------------------------------------------------------------------------------//
	public function regUser($login,$password,$email)
	{
	//$DBH= new PDO('mysql:host=localhost;dbname=college','root','');
     $STH=$this->conn->prepare('CALL reg1(:login,:password,:email)');
     $a=['login'=>$login,
         'password'=>$password,
         'email'=>$email];
         $STH->execute($a);
	}
    public function login($login,$password)
    {
    //$DBH= new PDO('mysql:host=localhost;dbname=college','root','');
    foreach($this->conn->query('SELECT*FROM reg') as $row)
    {
     if($row['login']==$login && $row['password']==$password){echo"<center><h1>SUCCESSFULL ,".$login."</h1></center>";break;}
    }  
    }
}
//-------------------------------------------------------------------------------------------------------------------------------//
$connect= new User('mysql:host=localhost;dbname=college','root','');
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		.div{border:2px solid black;width: 200px;padding: 6px;border-radius: 5px;background: grey;}
		input{padding: 4px;border-radius: 5px;}
		h1{color: red;position: absolute;left: 40%;top: 40%;}
	</style>
	<title></title>
</head>
<body>
	<form method="POST">
<div class="div">
	<center>Регистрация</center>
	Логин:
	<input type="text" name="t1" placeholder="Сюда пиши логин"><br>
	Пароль:
    <input type="text" name="t2"><br>
    Мыло:
    <input type="text" name="t3">
<br><br>
    <input type="submit" name="sub1" value="Регистрация">
</div>
<?php
// Запрос на Регистрацию
if(isset($_POST['sub1'])){$connect->regUser($_POST['t1'],$_POST['t2'],$_POST['t3']);

}
?>
<br>
<div class="div">
	<center>Вход</center>
	Логин:
	<input type="text" name="t4"><br>
	Пароль:
	<input type="text" name="t5"><br><br>
	<input type="submit" name="sub2" value="Вход">
	<?php

	?>
</div>
</form>
</body>
</html>
<?php
	//Запрос на вход
	if(isset($_POST['sub2'])){;$connect->login($_POST['t4'],$_POST['t5']);} 
?>