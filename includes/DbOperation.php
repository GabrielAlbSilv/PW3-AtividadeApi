<?php
 
class DbOperation
{
    
    private $con;
 
 
    function __construct()
    {
  
        require_once dirname(__FILE__) . '/DbConnect.php';
 
     
        $db = new DbConnect();
 

        $this->con = $db->connect();
    }
	
	
	function createpao($nome, $sabor, $preco, $padaria){
		$stmt = $this->con->prepare("INSERT INTO Paes (nome, sabor, preco, padaria) VALUES (?, ?, ?, ?)");
		$stmt->bind_param("ssss", $nome, $sabor, $preco, $padaria);
		if($stmt->execute())
			return true; 			
		return false;
	}
	
	function getpao(){
		$stmt = $this->con->prepare("SELECT id, nome, sabor, preco, padaria FROM Paes");
		$stmt->execute();
		$stmt->bind_result($id, $nome, $sabor, $preco, $padaria);
		
		$Paes = array(); 
		
		while($stmt->fetch()){
			$pao  = array();
			$pao['id'] = $id; 
			$pao['nome'] = $nome; 
			$pao['sabor'] = $sabor; 
			$pao['preco'] = $preco; 
			$pao['padaria'] = $padaria; 
			
			array_push($Paes, $pao); 
		}
		
		return $Paes; 
	}
	
	
	function updatepao($id, $nome, $sabor, $preco, $padaira){
		$stmt = $this->con->prepare("UPDATE Paes SET nome = ?, sabor = ?, preco = ?, padaria = ? WHERE id = ?");
		$stmt->bind_param("ssssi", $nome, $sabor, $preco, $padaira, $id);
		if($stmt->execute())
			return true; 
		return false; 
	}
	
	
	function deletepao($id){
		$stmt = $this->con->prepare("DELETE FROM Paes WHERE id = ? ");
		$stmt->bind_param("i", $id);
		if($stmt->execute())
			return true;
		return false; 
	}
}
