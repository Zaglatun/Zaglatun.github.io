<?
class DB
{
// ----------------------------------------------Конект-------------------------------------------//
	public $conn;
	public function __construct($dbname,$dbuser, $dbpass){
	 	try{$this->conn = new PDO($dbname,$dbuser, $dbpass);}
	 catch(PDOException $e){echo 'Error: '.$e->getMessage();
	}
	return $this->conn;
          }
//-----------------------------------------------------------------------------------------------//
public function server_ifo(){
echo'<img src="https://img.icons8.com/ultraviolet/20/000000/server.png"/><a href=main.php>Сервер: 127.0.0.1:3306</a>';
if($_GET['database']!= NULL){echo'»<img src="https://img.icons8.com/ultraviolet/20/000000/database.png"/><a href=main.php?database='.$_GET['database'].'>База данных: '.$_GET['database'].'</a>';}
if($_GET['table']!= NULL){echo'»<img src="https://img.icons8.com/ultraviolet/20/000000/table-1.png"/><a href=main.php?database='.$_GET['database'].'&table='.$row['table'].'>База данных: '.$_GET['database'].'</a>';}
}
    public function show_tables(){
    	echo "<ul>";
    	foreach($this->conn->query('SHOW DATABASES') as $row)
    	{
       echo '<li class=database>
       <div></div>
       <div></div>
       <a class=sel_bd href=main.php?database='.$row['Database'].' title=Сруктура>'.$row['Database'].'</a></li>';
    	}
    }
   //-------------------------------------------------------------------------------------------------------------------------------//
    //onclick=delete_s("'.$row['Name'].'","'.$_GET['database'].'")
   public function show_table(){
   	echo "<table class=table_show>";
   	echo"<tr><td class=td_show><a>Таблица</a><td class=td_show><a>Действие</a></td></td><td class=td_show><a>Строки</a></td><td class=td_show><a>Тип</a></td><td class=td_show><a>Сравнение</a></td></tr>";
   	foreach($this->conn->query('SHOW TABLE STATUS FROM '.$_GET['database']) as $row)
   	{
   echo'<tr class=tr_show
   ><td class=td_show><a href=main.php?database='.$_GET['database'].'&table='.$row['Name'].' >'.$row['Name'].'</a></td><td class=td_show><button class=btn btn-danger data-toggle="modal" data-target=delete_table><input type=hidden id=stable value='.$row['Name'].'><img src=icon/123.jpg title=Удалить style=height:20px;width:20px;>
   </button></td><td class=td_show><a>'.$row['Rows'].'</a></td><td class=td_show><a>'.$row['Engine'].'</a></td><td class=td_show><a>'.$row['Collation'].'</a></td></tr>';
   	}
    echo "</table>";
   }
//------------------------------------------------------------------------------------------------------------------------------------------------------//
      public function show_table_ifo(){
   	$ktable=0;
   echo "<table class=table_show>";
   echo "<tr>";
   $this->conn = new PDO('mysql:host=localhost;dbname='.$_GET['database'],'root','');
foreach($this->conn->query('SHOW COLUMNS FROM '.$_GET['table'].' FROM '.$_GET['database'])/*->fetch(PDO::FETCH_ASSOC)* - бесполезная х*/ as $row)
  	{
   echo '<td class=td_show>'.$row['Field'].'</td>';
   $ktable++;
  	} 
  	echo '</tr><tbody>';
    foreach($this->conn->query('SELECT * FROM '.$_GET['table'])/*->fetch(PDO::FETCH_ASSOC/NUM)* - бесполезная х*/ as $row1)
    {echo "</tr><tr class=tr_show>";
    foreach($this->conn->query('SHOW COLUMNS FROM '.$_GET['table'].' FROM '.$_GET['database']) as $row)
  {
    echo'<td class=td_show>'.mb_strimwidth($row1[$row['Field']], 0, 100, "<a href=main.php?database=".$_GET['database'].
    "&table=".$row['table']."&sokr=1>...</a>").'</td>';
        if($_GET['a']==1){echo'<td class=td_show>'.$row['table'].'</td>';}
     // Сокращение.
    }
   }
   echo "</tbody></table>";
   $this->conn =null;
   }
//-------------------------------------------------------------------------------------------------------------------------------------------------------//
   public function delete_table(){
   $q= $this->conn->prepare("DROP TABLE ".$_GET['x']);
    $q->execute();
   }
}
//-------------------------------------------------------------------------------------------------------------------------------------------------------//
?>