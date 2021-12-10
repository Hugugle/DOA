<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DOA - Cadastrar</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">
	
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
    </style>

    
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">

    <form method="post" action="cadastrar_usuario_confirma.php" onsubmit="index.php">
    <img class="mb-0" src="imagens/Livros-icon.png" alt="" width="150" height="140">
    <h1 class="h3 mb-3 fw-normal">Cadastre-se</h1>

	<div class="form-floating">
      <input name="nome" type="text" class="form-control" id="floatingInput" placeholder="text">
      <label for="floatingInput">Nome</label>
    </div>
    <div class="form-floating">
      <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email</label>
    </div>
	<div class="form-floating">
      <input name="login" type="text" class="form-control" id="floatingInput" placeholder="text">
      <label for="floatingInput">Nome de usuário</label>
    </div>
    <div class="form-floating">
      <input name="senha" type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Senha</label>
    </div>
	

    <button class="w-100 btn btn-lg btn-primary" type="submit" name="inserir" value="Inserir">Cadastrar</button>
	<br><br><a href="index.php">voltar</a>
    <p class="mt-5 mb-3 text-muted">DOA 2021</p>
  </form>
</main>


    
  </body>
</html>