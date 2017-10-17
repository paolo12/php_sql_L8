<?php
	session_start();
	var_dump($_SESSION);
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
	<td align="center"><a href="index.php"><span>Файл index.php</span></a></td>
    <td align="center"><a href="admin.php"><span>Файл admin.php</span></a></td>
	<td align="center"><span>Файл list.php</span></td>
	<td align="center"><a href="test.php"><span>Файл test.php</span></a></td>
  </tr>
 </table>
<p>Выберите тест:</p>
 <form enctype="multipart/form-data" action="test.php" method="GET">
 <?php foreach(glob('*.json') as $filename){
	 echo '<p><input type="radio" name="test" value="'.substr($filename, 0, -5).'">'.$filename.'<br>'.'</p>';
	 }
  	if (!file_exists(__DIR__.'/'.$_SESSION['username'].'.json')) {
	   echo '<p><input placeholder="Ваше имя" name="username"></p>';
	} else {
	   $_GET['username'] = $_SESSION['username'];
	}
	?>
  <p><input type="submit" value="Пройти тест"></p>
 </form>
</table>
</body>
</html>