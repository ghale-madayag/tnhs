<?php
    require_once('handler.php');
 
	if(isset($_GET['q'])) {
		$term = $_GET['q'];
		$sql = $handler->prepare("SELECT * FROM tnhs_section WHERE sec_name LIKE '%".$term."%'");
        $sql->execute();
	}else{
		$sql = $handler->query("SELECT * FROM tnhs_section");
	}

	while ($row=$sql->fetch(PDO::FETCH_OBJ)) {
		
		$result[] = array(
			'sec_id' => $row->sec_id ,
			'sec_name' => $row->sec_name 
		);
	}
    echo json_encode($result);

?>