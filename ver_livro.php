<?php session_start(); ?>
<?php include "check_login.php" ?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalhar Livro</title>

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
    
	<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
	<symbol id="home" viewBox="0 0 16 16">
    <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
	</symbol>
	
</body>

	<?php
		include("banco_dados_conexao.php");	
	?>


	
	
		<?php
			try {
				$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
				//echo "Connected to $dbname at $host successfully.";
				$stmt = $conn->prepare('SELECT id, titulo_do_livro, sinopse_livro, estado_livro from oferta where id = ?');
				$stmt->bindParam(1, $id);
				$id = $_GET["id"];
				$_SESSION['id_livro_coment'] = $_GET["id"];
				$stmt->execute();
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$conn = null;
				echo "<br><h1>" . $result[0]["titulo_do_livro"] . "</h1>";
				echo "<br><b> Sinopse do livro: </b><br>". $result[0]["sinopse_livro"] ."";
				echo "<br><br><b> Qualidade/estado do livro: </b><br>". $result[0]["estado_livro"] ."";
				echo "<br><br><b> Email do doador: </b><br>". $_SESSION['email'] ."<br>";
				//echo "<br>Nome: " . $result[0]["titulo_do_livro"] . "";
				
				
			} catch (PDOException $e) {
				print "Error!: " . $e->getMessage() . "<br/><br><a href='index.php'>voltar</a>";
				die();
			}
		?>
<br><br><a href="painel.php">voltar</a>
	

<?php
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
				//echo "Connected to $dbname at $host successfully.";
				$stmt = $conn->prepare('SELECT nome_comentador, comentario, id_livro_coment, hora_coment from comentarios WHERE id_livro_coment = ?');
				$stmt->bindParam(1, $id);
				$id = $_GET["id"];
				$stmt->execute();
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$conn = null;

?>


		<br><br><form method="post" action="criar_comentario.php" onsubmit="setTimeout(function () { window.location.reload(); }, 10)">
	
	
	<div class="input-group">
          <span class="input-group-text">Comente Aqui:</span>
          <br><textarea name= "coment" class="form-control" aria-label="With textarea"></textarea>
        </div>
		
		
	<input type="submit" name="enviar" value="Enviar"><br>
	</form>
	
		<section id="comments" class="body">
	  
	  <header>
			<br><h2>Comentários</h2>
		</header>


      <?php
        foreach ($result as &$comentario) {
          ?>
    				<div class="myDivv">
    					<address class="vcard author">
    						Por <a class="url fn" href="#"><?php echo($comentario['nome_comentador']); ?></a>
    					</address>
    				</div>
					
					<div class="myDivvv">
					<pre>Data e Hora: <a class="url fn" href="#"><?php echo($comentario['hora_coment']); ?></a></pre>
    				</div>
					
					<div class="myDiv">
    					<p><?php echo($comentario['comentario']); ?></p>
    				</div>
					<br>
    			</article></li>
          <?php
        }
      ?>
		</ol>
	
	
<div class="container">
  <footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="painel.php" class="nav-link px-2 text-muted">Início</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
      <li class="nav-item"><a href="aba_sobre.php" class="nav-link px-2 text-muted">Sobre nós</a></li>
    </ul>
    <p class="text-center text-muted">DOA 2021</p>
  </footer>
</div>
    <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
