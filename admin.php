<?php
	session_start();
?>
<html>
<head>
<meta charset="utf-8">
<title>Admin page</title>
<style>
    body {
        width: 75%;
        margin: 0 auto;
        font-family: Tahoma, Verdana, Arial, sans-serif;
    }
</style>
</head>
<body>
<table border="1px" border-collapse="collapse" width="100%">
  <tr>
	<td align="center"><a href="index.php"><span>Файл index.php</span></a></td>
    <td align="center"><span>Файл admin.php</span></td>
	<td align="center"><a href="list.php"><span>Файл list.php</span></a></td>
	<td align="center"><a href="test.php"><span>Файл test.php</span></a></td>
  </tr>
 </table>
 
 <?php
	if(!empty($_SESSION['password'])){?>
		<p>Загрузите файл с тестами в формате json:</p>
		<form enctype="multipart/form-data" action="admin.php" method="POST">
			Файл: <input name="userfile" type="file" /><br>
			<input type="submit" value="Загрузить">
		</form>
		<?php
		if(!empty($_FILES)){
			$file_name = $_FILES['userfile']['name'];
			$up_path = '';
			$tmp_file = $_FILES['userfile']['tmp_name'];
			move_uploaded_file($tmp_file, $up_path . $file_name);					
			header("Location: list.php");
		}
		?>
 <?php	
	}
	else{
		header('HTTP/1.0 403 Forbidden');
		echo '<p>Вы вошли как гость и не можете добавлять тесты.</p>';
	}
 ?>

</table>
</body>
</html>