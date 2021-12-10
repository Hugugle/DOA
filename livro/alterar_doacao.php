<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<?php include "inicio.html" ?>
<head>
<title>Alterar</title>
<meta charset="UTF-8">
</head>
<body>

<?php
	include("banco_dados_conexao.php");	
	
	try {
	
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sth = $conn->prepare("update oferta set estado_doacao=? where id=?");
		$sth->bindParam(1, $estado_doacao);
		$sth->bindParam(2, $id);
		$estado_doacao = $_POST["estado_doacao"];
		$id = $_POST["id"];

		if($sth->execute())
			echo "<h1>Sucesso!</h1>";
			echo "<h4>O estado da sua doação foi alterado!</h4>";

	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/><br><a href='index.php'>voltar</a>";
		die();
	}
?>

<br><br><a href="painel.php">voltar</a>
</body>
<?php include "fim.html" ?>
</html>