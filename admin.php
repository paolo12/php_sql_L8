<?php
	session_start();
	if(!empty($_REQUEST)){
		$_SESSION['username'] = $_REQUEST['login'];
		$_SESSION['pass'] = $_REQUEST['password'];
		$json = $_REQUEST;
		$json_data = json_encode($json, true);
		file_put_contents($_REQUEST['login'].'.json', $json_data);
	}
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
	<td align="center"><a href="index.php"><span>Страница авторизации</span></a></td>
    <td align="center"><span>Страница загрузки</span></td>
	<td align="center"><a href="list.php"><span>Страница выбора теста</span></a></td>
	<td align="center"><a href="test.php"><span>Страница теста</span></a></td>
  </tr>
 </table>
 
 <?php
	if(!empty($_SESSION['username']) and !empty($_SESSION['pass'])){?>
		<p>Загрузите файл с тестами в формате json(файл должен начинаться с "testbook"):</p>
		<form enctype="multipart/form-data" action="admin.php" method="POST">
			Файл: <input name="userfile" type="file" /><br>
			<input type="submit" value="Загрузить">
		</form>
		<?php
		if(!empty($_FILES)){
			$file_name = $_FILES['userfile']['name'];
			$up_path = '';
			$tmp_file = $_FILES['userfile']['tmp_name'];
			if (move_uploaded_file($tmp_file, $up_path . $file_name)){
				header("Location: list.php");
			}
			else{
				echo 'Произошла ошибка при загрузке файла! Попробуйте загрузить файл еще раз.';
			}
		}
		?>
 <?php	
	}
	else if(!empty($_SESSION['username']) and empty($_SESSION['pass'])){
		header('HTTP/1.0 403 Forbidden');
		echo '<p>Вы вошли как гость и не можете добавлять тесты.</p>';
	}
	else{
		header('refresh: 10; url=index.php');
		echo '<br>'.'Необходимо пройти авторизацию.';
	}
 ?>

</table>
</body>
</html>