<?php
include "../menu.php";

if($_POST['cadcep']=="sim")
{
	// Sanitizar os dados antes de usá-los nas consultas SQL
	$cep = filter_var($_POST['cep'], FILTER_SANITIZE_STRING);
	$id_cep = filter_var($_POST['id_cep'], FILTER_SANITIZE_NUMBER_INT);

	//se ja existir cep igual nao duplicar
	$sqlceps="select cep from ceps where valido='s' and cep='$cep' ";
	$queryceps=mysqli_query($conn, $sqlceps);
	$ceps=mysqli_num_rows($queryceps);
	if($ceps>0)
	{
		//alert personalizado
		echo '<script>
		// Usando SweetAlert para exibir uma mensagem de erro e redirecionar
		Swal.fire({
			title: "Atenção!",
			text: "Cep existente na base",
			icon: "error",
			confirmButtonText: "OK",
			allowOutsideClick: false
		}).then((result) => {
			// Verifica se o botão "OK" foi clicado
			if (result.isConfirmed) {
				// Redireciona para outra página
				window.location.replace("cadastro.php");
			}
		});
		</script>';
		exit();	
	}
	
    // Verificar se todos os campos estão preenchidos caso o user tente bular no front
    if(!empty($cep)) 
	{	
		// Função para consumir a API do ViaCEP
		function consultarCep($cep) {
			$url = "https://viacep.com.br/ws/$cep/json/";
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($ch);
			curl_close($ch);
			return json_decode($response, true);
		}
		// Consultar a API do ViaCEP
    	$dadosCep = consultarCep($cep);
		/*
		print "<pre>";
		print_r($dadosCep);
		print "</pre>";
		*/
		if(empty($dadosCep) || (isset($dadosCep['erro']) && $dadosCep['erro'] == true))
		{
			//alert personalizado
			echo '<script>
			// Usando SweetAlert para exibir uma mensagem de erro e redirecionar
			Swal.fire({
				title: "Atenção!",
				text: "Cep inválido",
				icon: "error",
				confirmButtonText: "OK",
				allowOutsideClick: false
			}).then((result) => {
				// Verifica se o botão "OK" foi clicado
				if (result.isConfirmed) {
					// Redireciona para outra página
					window.location.replace("cadastro.php");
				}
			});
			</script>';
			exit();
		}
		
		//CASO NAO ENTRAR NO EXIT OCORREU TUDO BEM CAI PARA O INSERT 
		$cepbd="insert into ceps set 
		cep='$dadosCep[cep]',
		logradouro='$dadosCep[logradouro]',
		complemento='$dadosCep[complemento]',
		unidade='$dadosCep[unidade]',
		bairro='$dadosCep[bairro]',
	  	localidade='$dadosCep[localidade]',
		uf='$dadosCep[uf]',
		estado='$dadosCep[estado]',
		regiao='$dadosCep[regiao]',
		ibge='$dadosCep[ibge]',
		gia='$dadosCep[gia]',
		ddd='$dadosCep[ddd]',
		siafi='$dadosCep[siafi]'
		";
		$queryuserbd=mysqli_query($conn, $cepbd);
		//print $cepbd."<br>";
	}
	header("Location:listar.php");
}

//aqui excluir o cep mas so invalida no banco caso o usuario queira voltar a acao por algum motivo so passar para valido s
if($_POST['excluir_cep']=="sim")
{
	$id_cep = filter_var($_POST['id_cep'], FILTER_SANITIZE_NUMBER_INT);
	$sqlcepdel="update ceps set valido='n' where id_cep='$id_cep' ";	
	$querycepdel=mysqli_query($conn, $sqlcepdel);
	header("Location:listar.php");
}
?>
