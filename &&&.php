<?php
// Администрировании баз данных.1.Получение информации о БД: Оператор SHOW DATABASES выдает список баз данных на вашем домене.SHOW TABLES - выдает список таблиц,в указаной базе данных,в случае если у пользователя нет привелегий для таблицы,таблица не будет отображена в результате запроса.SHOW COLUMNS - выводит столбцы указаной таблицы.DISCRIBE tbl_name - это сокращенный вариант show columns,предоставляет информацию о столбцах таблицы.SHOW FIELDS.SHOW INDEX - выводит информацию по индексу в виде следующих столбцов.(имя таблицы,имя индекса,имя столбца,и т.д).SHOW TABLE STATUS [FROM db_name] - предоставляет максимально полную информацию по таблице.SHOW GRANTS FOR user - привелегии пользователя.SHOW CREATE TABLE - Показывает оператор CREATE TABLE который будет создавать таблицу.
//Задание - 
require 'class.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.datab{background: #87CEFA;
			position: fixed;
			height: 100%;
			width: 205px;
			left: 0%;
			top: 0%;
      border-right: 4px solid black;
		      }
		.sel_bd{    color: #92B8C5;
			text-shadow: 1px 1px 1px #555555;
			text-decoration: none;display: inline-block;
			padding: 2px 3px;
			letter-spacing: 1px;
			margin: 0 -5px;
			font-size: 13px;
			transition: all 0.3s ease-in-out;
			font-family: 'PT Sans Caption', sans-serif;
		        }
		.sel_bd:hover {position: relative;
			top: 2px;
			left: 2px;
		        }
        .datab_button2:hover{
    border-radius: 10px;
    color: #36454A;
    background: -webkit-linear-gradient(top, #A4D3E0 , #A4D3E0 50%, #CBE3EB 50%);
    background: -o-linear-gradient(top, #A4D3E0 , #A4D3E0 50%, #CBE3EB 50%);
    background: linear-gradient(to top, #A4D3E0 , #A4D3E0 50%, #CBE3EB 50%);
    box-shadow: 2px 2px 3px black;
        -webkit-transition: 0.4s ease-in-out;
    -o-transition: 0.4s ease-in-out;
    transition: 0.4s ease-in-out;
    padding: 4px;
                     }
   .datab_button1{display: inline-block;
    text-decoration: none;
    letter-spacing: 1px;
    margin: 2px 2px;
    padding: 1px 2px;
    font-size: 12px;
    font-weight: bold;
    font-family: 'Montserrat', sans-serif;
    margin-left: 10px;
                 }   
	</style>
</head>
<body>
<div class="datab">
<a href="main.php"><img src="icon/logo_left.png" style="padding: 7px;"></a>
<p class="datab_button1"><a class="datab_button2">Недавние</a></p>
<p class="datab_button1"><a class="datab_button2">Избранные</a></p>
	<?php
$connect= new DB('mysql:host=localhost;','root','');
$STH=$connect->show_tables();
	?>
</div>
</body>
</html>
