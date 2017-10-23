<?php
	session_start();
?>
<html>
<head>
<meta charset="utf-8">
<title>List page</title>
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
    <td align="center"><a href="admin.php"><span>Страница загрузки</span></a></td>
	<td align="center"><span>Страница выбора теста</span></td>
	<td align="center"><a href="test.php"><span>Страница теста</span></a></td>
  </tr>
 </table>
<?php 
	if(empty($_SESSION['username'])){
		header('refresh: 10; url=index.php');
		echo '<br>'.'Необходимо пройти авторизацию.';
	}
	else{
?>
<p>Выберите тест:</p>
 <form enctype="multipart/form-data" action="test.php" method="GET">
	<?php 
		foreach(glob('*.json') as $filename){
			if(mb_stristr($filename, 'testbook')){
				echo '<p><input type="radio" name="test" value="'.substr($filename, 0, -5).'">'.$filename.'<br>'.'</p>';
			}			
		}
		if (!file_exists(__DIR__.'/'.$_SESSION['username'].'.json')) {
			echo '<p><input placeholder="Ваше имя" name="username"></p>';
		} 
		else {
			$_GET['username'] = $_SESSION['username'];
		}
	?>
	<p><input type="submit" value="Пройти тест"></p>
<?php
	}
?>
 </form>
</table>
</body>
</html>