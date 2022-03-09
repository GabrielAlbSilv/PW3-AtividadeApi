<?php 

	require_once '../includes/DbOperation.php';

	function isTheseParametersAvailable($params){
	
		$available = true; 
		$missingparams = ""; 
		
		foreach($params as $param){
			if(!isset($_POST[$param]) || strlen($_POST[$param])<=0){
				$available = false; 
				$missingparams = $missingparams . ", " . $param; 
			}
		}
		
		
		if(!$available){
			$response = array(); 
			$response['error'] = true; 
			$response['message'] = 'Parameters ' . substr($missingparams, 1, strlen($missingparams)) . ' missing';
			
		
			echo json_encode($response);
			
		
			die();
		}
	}
	
	
	$response = array();
	

	if(isset($_GET['apicall'])){
		
		switch($_GET['apicall']){
	
			case 'createpao':
				
				isTheseParametersAvailable(array('nome','sabor','preco','padaria'));
				
				$db = new DbOperation();
				
				$result = $db->createpao(
					$_POST['nome'],
					$_POST['sabor'],
					$_POST['preco'],
					$_POST['padaria']
				);
				

			
				if($result){
					
					$response['error'] = false; 

					
					$response['message'] = 'Pão adicionado com sucesso';

					
					$response['heroes'] = $db->getpao();
				}else{

					
					$response['error'] = true; 

				
					$response['message'] = 'Algum erro ocorreu por favor tente novamente';
				}
				
			break; 
			
		
			case 'getpao':
				$db = new DbOperation();
				$response['error'] = false; 
				$response['message'] = 'Pedido concluído com sucesso';
				$response['heroes'] = $db->getpao();
			break; 
			
			
		
			case 'updatepao':
				isTheseParametersAvailable(array('id','nome','sabor','preco','padaria'));
				$db = new DbOperation();
				$result = $db->updateHero(
					$_POST['id'],
					$_POST['nome'],
					$_POST['sabor'],
					$_POST['preco'],
					$_POST['padaria']
				);
				
				if($result){
					$response['error'] = false; 
					$response['message'] = 'Pão atualizado com sucesso';
					$response['heroes'] = $db->getpao();
				}else{
					$response['error'] = true; 
					$response['message'] = 'Algum erro ocorreu por favor tente novamente';
				}
			break; 
			
			
			case 'deletepao':

				
				if(isset($_GET['id'])){
					$db = new DbOperation();
					if($db->deletepao($_GET['id'])){
						$response['error'] = false; 
						$response['message'] = 'Pão excluído com sucesso';
						$response['Paes'] = $db->getpao();
					}else{
						$response['error'] = true; 
						$response['message'] = 'Algum erro ocorreu por favor tente novamente';
					}
				}else{
					$response['error'] = true; 
					$response['message'] = 'Não foi possível deletar, forneça um id por favor';
				}
			break; 
		}
		
	}else{
		 
		$response['error'] = true; 
		$response['message'] = 'Chamada de API inválida';
	}
	

	echo json_encode($response);
