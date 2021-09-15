<?php
	class Ferramentas{
		function compactaParagrafos($paragrafos){
			$tamanho = strlen($paragrafos);
			 $tamanhoMaximo = 190;
			 if($tamanho > $tamanhoMaximo){
			 	$compactado = substr($paragrafos, 0, $tamanhoMaximo - $tamanho);
			 	$compactado = htmlspecialchars_decode($compactado);
			 	return $compactado." ...";
			 }else{ return $paragrafos." ..."; }			
		}		
		function selecionaImagensCriaSlide($diretorio, $contador, $imgUm, $imgDois, $imgTres, $imgQuatro, $imgCinco, $parametro, $fontes){
			$maisImagensParaSlide = "";
			if($imgDois != ""){	
					$maisImagensParaSlide .= "<div class='carousel-item'><img alt='Segunda imagem do post ".$imgDois."' src='".$diretorio.$imgDois."' class='rounded'>";
					if($parametro === "chargesPaginaHome"){ $maisImagensParaSlide .= "<p class='form-control m-0'><a href=".$fontes[1].">".$fontes[1]."</a></p>"; }
					$maisImagensParaSlide .=  "</div>";
				if($imgTres != ""){
					$maisImagensParaSlide .= "<div class='carousel-item'><img alt='Terceira imagem do post ".$imgTres."' src='".$diretorio.$imgTres."' class='rounded'>";
						if($parametro === "chargesPaginaHome"){ $maisImagensParaSlide .= "<p class='form-control m-0'><a href=".$fontes[2].">".$fontes[2]."</a></p>"; }
					$maisImagensParaSlide .= "</div>";
					if($imgQuatro != ""){
						$maisImagensParaSlide .= "<div class='carousel-item'><img alt='Quarta imagem do post ".$imgQuatro."' src='".$diretorio.$imgQuatro."' class='rounded'>";
						if($parametro === "chargesPaginaHome"){ $maisImagensParaSlide .= "<p class='form-control m-0'><a href=".$fontes[3].">".$fontes[3]."</a></p>"; }
						$maisImagensParaSlide .= "</div>";
						if($imgCinco != ""){
							$maisImagensParaSlide .= "<div class='carousel-item'><img alt='Quinta imagem do post ".$imgCinco."' src='".$diretorio.$imgCinco."' class='rounded'>";
							if($parametro === "chargesPaginaHome"){ $maisImagensParaSlide .= "<p class='form-control m-0'><a href=".$fontes[4].">".$fontes[4]."</a></p>"; }
							$maisImagensParaSlide .= "</div>";
						}		
					}
				}
			}
			$verificandoImagens = 
			"<div id='carousel".$contador."' class='carousel slide' data-bs-ride='carousel'>
				<div class='carousel-inner border border-lg'>
					<div class='carousel-item active'>
						<img alt='Primeira imagem do post ".$imgUm."' src='".$diretorio.$imgUm."' class='rounded'>";
						if($parametro === "chargesPaginaHome"){ $verificandoImagens .= "<p class='form-control m-0'><a href=".$fontes[0].">".$fontes[0]."</a></p>"; }
			$verificandoImagens .= "
					</div>
					".$maisImagensParaSlide."
				</div>
				<a class='carousel-control-prev' href='#carousel".$contador."' role='button' data-bs-slide='prev'>
					<span class='carousel-control-prev-icon bg-dark rounded-pill' aria-hidden='true'></span>
					<span class='visually-hidden'>Previous</span>
				</a>
				<a class='carousel-control-next' href='#carousel".$contador."' role='button' data-bs-slide='next'>
					<span class='carousel-control-next-icon bg-dark rounded-pill' aria-hidden='true'></span>
					<span class='visually-hidden'>Next</span>
				</a>
			</div>";			
			return $verificandoImagens;
		}
		function verificaTamanhoTipoImagem($imagem){
			$imagem = $imagem['name'] ?? "";
			$formatosPermitidos = array("png", "PNG", "jpeg", "JPEG", "jpg", "JPG");
			$extensaoprod = pathinfo($imagem, PATHINFO_EXTENSION);					
			if(in_array($extensaoprod, $formatosPermitidos)){
				if(1024*1024*100 < $imagem){
					return "Imagem muito grande!";					
				}else{ return "Imagem aceita"; }
			}else{ return "Arquivo não é uma imagem"; }	
		}
		function verificaSeExisteTituloDoPostDB($con, $ferramentas, $titulopost){
			$sqlVerificaTituloPost = "SELECT titulo FROM posts WHERE titulo=:titulo";
			$verificaTituloPost = $con->prepare($sqlVerificaTituloPost);
			$verificaTituloPost->bindParam(":titulo", $titulopost);
			if($verificaTituloPost->execute()){
				$verificaTitulo = $verificaTituloPost->fetchAll(PDO::FETCH_ASSOC);
				$tituloRetornado = "";
				foreach($verificaTitulo as $verificaTP){
					$tituloRetornado = $verificaTP['titulo'];
				}
				if($tituloRetornado === ""){
					return "Pode";
				}else{ return "Este título já está cadastrado"; }
			}else{ return "Erro"; }
		}
		function verificaSeEmailExiste($con, $ferramentas, $email){						
			$sqlverificaEmail = "SELECT * FROM usuarios WHERE email=:email LIMIT 1";
			$verificaEmail = $con->prepare($sqlverificaEmail);
			$verificaEmail->bindParam(':email', $email);			
			if($verificaEmail->execute()){
				$result = $verificaEmail->fetchAll(PDO::FETCH_ASSOC);
				$retornado["msg"] 		= ""; 
				$retornado["email"] 	= ""; 
				$retornado["senha"] 	= "";
				$retornado["nome"] 		= ""; 
				$retornado["sobrenome"] = "";
				$retornado["nivel"]		= 0;
				foreach($result as $retorno){ 
					$retornado["email"] 	= $retorno["email"];
					$retornado["senha"] 	= $retorno["senha"];
					$retornado["nome"] 		= $retorno["nome"];
					$retornado["sobrenome"] = $retorno["sobrenome"];
					$retornado["nivel"]		= $retorno["nivel"];
				}
				if($retornado["email"] == ""){ $retornado["msg"] = "Erro"; }
			}else{ $retornado["msg"] = "Erro"; }
			return $retornado;			
		}
		function filtrando($dados){
			$dados = trim($dados);
			$dados = htmlspecialchars($dados);			
			$dados = addslashes($dados);
			return $dados;		
		}
		function sair(){			
			session_unset();
			session_destroy();
			echo json_encode("saiu");
		}
	}

?>