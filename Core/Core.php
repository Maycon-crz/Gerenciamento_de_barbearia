<?php

	if(isset($_GET['pagina'])){
		$pagina = $_GET['pagina'];
	}else{
		$pagina = "Home";
	}

	switch($pagina){
		case "Home":
			require_once("Core/Controller/Home.php");
		break;
		// case "Home":
		// break;
	}

?>