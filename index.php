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
<title>Index page</title>
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
	<td align="center"><span>Страница авторизации</span></td>
    <td align="center"><a href="admin.php"><span>Страница загрузки</span></a></td>
	<td align="center"><a href="list.php"><span>Страница выбора теста</span></a></td>
	<td align="center"><a href="test.php"><span>Страница теста</span></a></td>
  </tr>
 </table>
 <p>Предлагаем вам авторизоваться или войти как гость, введя только имя.</p>
	<?php
		if(isset($_SESSION['username'])) //если переменной нет, выводим форму{?>			
			<form action="admin.php" method="post">
				Логин: <input type="text" name="login" />
				Пароль: <input type="password" name="password" />
				<input type="submit" value="Войти"/>
			</form>
		<?}?>
</table>
</body>
</html>