<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<?php session_start(); ?>
<html>
<head>
<title>Cadastrar Oferta</title>
<meta charset="UTF-8">
</head>
<body>

<?php
	include("banco_dados_conexao.php");	
	
	try {
	
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		echo "Connected to $dbname at $host successfully.";

		$stmt = $conn->prepare("insert into oferta (titulo_do_livro,login_doador,sinopse_livro) values (?,?,?);");
		$stmt->bindParam(1, $titulo_do_livro);
		$stmt->bindParam(2, $login_doador);
		$stmt->bindParam(3, $sinopse_livro);

		$titulo_do_livro = $_POST["titulo_do_livro"];
		$login_doador = $_SESSION["login"];
		$sinopse_livro = $_POST["sinopse_livro"];


		if($stmt->execute())
			echo "Sucesso!";

	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/><br><a href='index.php'>voltar</a>";
		die();
	}
?>

<br><br><a href="painel.php">voltar</a>
</body>
</html>