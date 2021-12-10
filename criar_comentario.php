<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<?php session_start(); ?>
<html>
<head>
<title>Criar Comentário</title>
<meta charset="UTF-8">
</head>
<body>

<?php
	include("banco_dados_conexao.php");	
	
	try {
	
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		//echo "Connected to $dbname at $host successfully.";

		$stmt = $conn->prepare("insert into comentarios (login_comentador,nome_comentador,comentario,id_livro_coment) values (?,?,?,?);");
		$stmt->bindParam(1, $login_comentador);
		$stmt->bindParam(2, $nome_comentador);
		$stmt->bindParam(3, $comentario);
		$stmt->bindParam(4, $id_livro_coment);

		$login_comentador = $_SESSION["login"];
		$nome_comentador = $_SESSION["nome"];
		$comentario = $_POST["coment"];
		$id_livro_coment = $_SESSION['id_livro_coment'];
		
		


		if($stmt->execute());

	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/><br><a href='index.php'>voltar</a>";
		die();
	}
?>


</body>
</html>