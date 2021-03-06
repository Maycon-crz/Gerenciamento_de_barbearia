<?php 
	if (session_status() === PHP_SESSION_NONE) {
	    session_start();
	    // $_SESSION['login'] = 'asd';
	    session_destroy();
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">    
	<title><?php echo $titulo; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	 <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="Core/View/css/estilo.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<a class="navbar-brand text-success" href="#">ERP Barbearia</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-end" id="navbarNav">
				<?php if(isset($_SESSION['login'])){ ?>
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">			    
					<li class="nav-item text-center rounded m-3">
					  <a class="nav-link btn btn-outline-success" href="#">Cadastro de Agendamentos</a>
					</li>
					<li class="nav-item text-center rounded m-3">
					  <a class="nav-link btn btn-outline-success" href="#">Cadastro de Clientes</a>
					</li>
					<li class="nav-item text-center rounded m-3">
					  <a class="nav-link btn btn-outline-success" href="#">Cadastro de Cortes</a>
					</li>
					<li class="nav-item text-center rounded m-3">
					  <a class="nav-link btn btn-outline-danger" href="#">Sair</a>
					</li>
					<li class="nav-item text-center rounded m-3">
						<a id='navOpcoesLogado' class='form-control text-center dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>|||OP????ES</a>
						<ul class='dropdown-menu form-control text-center' aria-labelledby='navOpcoesLogado'>
							<li class='dropdown-item border p-0 mt-2'>      
								<a class="nav-link btn btn-outline-success" href="#">Cadastro de Funcion??rios</a>
							</li>
							<li class='dropdown-item border p-0 mt-2'>      
								<a class="nav-link btn btn-outline-success" href="#">Cadastro de Fornecedores</a>
							</li> 
							<li class='dropdown-item border p-0 mt-2'>      
								<a class="nav-link btn btn-outline-success" href="#">Edi????o de Clientes</a>
							</li>
							<li class='dropdown-item border p-0 mt-2'>      
								<a class="nav-link btn btn-outline-success" href="#">Edi????o de Cortes</a>
							</li> 
							<li class='dropdown-item border p-0 mt-2'>      
								<a class="nav-link btn btn-outline-success" href="#">Edi????o de Funcion??rios</a>
							</li> 
							<li class='dropdown-item border p-0 mt-2'>      
								<a class="nav-link btn btn-outline-success" href="#">Edi????o de Fornecedores</a>
							</li>      														
	                    </ul>
	                </li>
				<?php }else{ ?>
					<li class="nav-link m-3">
						 <a href='index.php?pagina=login&metodo=index' class='form-control text-center bg-light' data-bs-toggle='modal' data-bs-target='#Modal' id='btAbreLogin'>Login</a>
					</li>
				<?php } ?>					
					<li class="nav-link text-center border rounded m-3">
						<a href="#">Sobre o a Empresa</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>