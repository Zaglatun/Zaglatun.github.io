<style type="text/css">
	.mtable{position: relative;
		left: 208px;
		top: 5%;
		width: 600px;
	        }
	.td_show{width: 150px;
		height: 20px;
		border:2px solid black;
		padding: 4px;
	        }
	 tbody .tr_show:hover{background: #87CEFA;}
	 .table_show{border-collapse: collapse;}
	 .server_ifo{border:0px solid black;
	 	position: fixed;
        left: 206px;
        width: 100%;
        background: #2F4F4F;
	 	}
</style>



<div class="server_ifo">
<?php
$connect->server_ifo();
?>
</div>
<div class=mtable id="show_table">
	<?php
     if($_GET['database']!=NULL && $_GET['table']== NULL){$STH=$connect->show_table();}
     if($_GET['database']!=NULL && $_GET['table']!= NULL){$STH=$connect->show_table_ifo();}
	  ?>
</div>
<form>
<div class="modal fade" id="delete_table" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Потверждение на удаление</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Вы хотите провести операцию DROP TABLE <?php //echo'`'.$_GET['x'].'';?>`?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger" data-dismiss="modal"  id="bt1" onclick=delete_s(<?php echo"'".$_GET['stable']."','".$_GET['database'];?>)>Delete</button>
      </div>
    </div>
  </div>
</div>
</form>
<script type="text/javascript">
  function delete_s(deltable,delbase)
{var y=delbase
	var x=deltable
	//alert(x+' '+y)
xhttp=new XMLHttpRequest()
;
xhttp.onreadystatechange=function(){
if (xhttp.readyState==4&&xhttp.status==200)
{document.getElementById('show_table').innerHTML=xhttp.responseText;}}
xhttp.open('GET','ajax.php?x='+x+'&database='+y,true);
xhttp.send();
}
</script>