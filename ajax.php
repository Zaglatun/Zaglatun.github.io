
<?php
require 'class.php';
$connect= new DB('mysql:host=localhost;dbname='.$_GET['database'],'root','');
$connect->delete_table();
//if($_GET['database']!=NULL && $_GET['table']== ''){$connect->show_table();}
$connect->show_table();
?>