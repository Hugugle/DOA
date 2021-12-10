<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
<title>CRUD</title>
<meta charset="UTF-8">
</head>
<body>

<?php
	include("banco_dados_conexao.php");	
	
	try {
	
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		//echo "Connected to $dbname at $host successfully.";

		$stmt = $conn->prepare("insert into usuario (nome,email,login,senha) values (?,?,?,?);");
		$stmt->bindParam(1, $nome);
		$stmt->bindParam(2, $email);
		$stmt->bindParam(3, $login);
		$stmt->bindParam(4, $senha);

		$nome = $_POST["nome"];
		$email = $_POST["email"];
		$login = $_POST["login"];
		$senha = $_POST["senha"];


		if($stmt->execute());

	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/><br><a href='index.php'>voltar</a>";
		die();
	}
?>

<br><br><a href="index.php">voltar</a>
</body>
</html>
