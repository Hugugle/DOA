<?php session_start(); ?>
<?php include "check_login.php" ?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DOA</title>

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
<head>
<title>Detalhar Livro</title>
<meta charset="UTF-8">
</head>
<body class="text-center">

    
	<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
	<symbol id="home" viewBox="0 0 16 16">
    <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
	</symbol>
	<main>

	<?php
		include("banco_dados_conexao.php");	
	?>

	
<h2>Suas ofertas:</h2>
<?php
      
      try {
      		include("banco_dados_conexao.php");
	
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		$sth = $conn->prepare('SELECT id,titulo_do_livro,login_doador from oferta WHERE login_doador = ?');
		$sth->bindParam(1, $login_doador);
		$login_doador = $_SESSION['login'];
		$sth->execute();
		$result = $sth->fetchAll(PDO::FETCH_ASSOC);
		
		echo "<center><table border=1>";
		// escrevendo cabe??alho a partir dos ??ndices do vetor FETCH_ASSOC
		echo "<tr>";
		foreach($result[0] as $index=>$values) {
			echo "<th>$index</th>";
		}echo "</tr>";
		
		// escrevendo resultado do SELECT
		foreach($result as $row) {
			echo "<tr>";
			foreach($row as $value){
				echo "<td>$value</td>";
			}
			echo "<td><a href='modificar_livro.php?id=".$row["id"]."'>[Modificar]</a></td>";
			echo "</tr>";
		}
		echo "</table></center>";
		$conn = null;
	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/><br><a href='index.php'>voltar</a>";
		die();
	}
	
	?>
	
	
<br><br><a href="painel.php">voltar</a>

<div class="container">
  <footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="painel.php" class="nav-link px-2 text-muted">In??cio</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
      <li class="nav-item"><a href="aba_sobre.php" class="nav-link px-2 text-muted">Sobre n??s</a></li>
    </ul>
    <p class="text-center text-muted">DOA 2021</p>
  </footer>
</div>
    <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
