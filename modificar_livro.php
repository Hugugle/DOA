<?php session_start(); ?>
<?php include "check_login.php" ?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modificar oferta</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/headers/">
	
<link href="/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<link href="css/bootstrap.css" rel="stylesheet">

<meta name="theme-color" content="#7952b3">
<style>
.bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
.myDiv {
  border: 5px outset lightblue;
  background-color: lightblue;
  text-align: center;
}
.myDivv {
  text-align: left;
}
.myDivvv {
  text-align: right;
}
</style>
    <link href="heroes.css" rel="stylesheet">
	<link href="headers.css" rel="stylesheet">
	</head>
<body class="text-center">

	<?php
		include("banco_dados_conexao.php");	
	?>


	<h1>Alterar</h1>
	<form method="post" action="alterar_doacao.php">
	
		<?php
			try {
				$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sth = $conn->prepare('SELECT id, titulo_do_livro, sinopse_livro, estado_livro, estado_doacao from oferta where id = ?');
				$sth->bindParam(1, $id);
				$id = $_GET["id"];
				$_SESSION['id_livro_coment'] = $_GET["id"];
				$sth->execute();
				$result = $sth->fetchAll(PDO::FETCH_ASSOC);
				$conn = null;
				echo "<br>ID: <input type='text' name='id' value='" . $result[0]["id"] . "' readonly>";
				echo "<br><br>Título: <input type='text' style='width:250px;'  name='titulo_do_livro' value='" . $result[0]["titulo_do_livro"] . "'readonly>";
				if($result[0]["estado_doacao"]=='nd')
					echo "<br><br>Foi doado: <input type='radio' name='estado_doacao' value='nd' checked>Não doado <input type='radio' name='estado_doacao' value='d'>Doado";
				if($result[0]["estado_doacao"]=='d')
					echo "<br><br>Foi doado: <input type='radio' name='estado_doacao' value='nd'>Não doado <input type='radio' name='estado_doacao' value='d' checked>Doado";
			} catch (PDOException $e) {
				print "Error!: " . $e->getMessage() . "<br/><br><a href='index.php'>voltar</a>";
				die();
			}
		?>

	
	<br><br><input type="submit" name="alterar" value="Alterar">
	</form>
<br><br><a href="painel.php">voltar</a>
</body>
<?php include "fim.html" ?>
</html>