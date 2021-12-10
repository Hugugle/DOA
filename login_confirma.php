<?php
	session_start();
	include("banco_dados_conexao.php");
	
	try {
	
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		echo "Connected to $dbname at $host successfully.";
		$sth = $conn->prepare("SELECT * from usuario WHERE login = '" . $_POST["login"] . "' AND senha = '" . $_POST["senha"] ."'");
		$sth->execute();
		
		if ($sth->rowCount() > 0) {
		  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
		  $_SESSION["login"] = $result[0]['login'];
		  $_SESSION["nome"] = $result[0]['nome'];
		  $_SESSION["email"] = $result[0]['email'];
		  header('Location:painel.php');
		} else {
		   echo '<br>Ocorreu um erro!<br><br><a href="index.php">voltar</a>';
		}
		
		$conn = null;
	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/><br><a href='index.php'>voltar</a>";
		die();
	}

	
	?>
