<?php
    require_once('handler.php');
 
	if(isset($_GET['q'])) {
		$term = $_GET['q'];
		$sql = $handler->prepare("SELECT * FROM tnhs_sf1 WHERE sf1_lname LIKE '%".$term."%' OR sf1_fname LIKE '%".$term."%'");
        $sql->execute();
	}else{
		$sql = $handler->query("SELECT * FROM tnhs_sf1");
	}

	while ($row=$sql->fetch(PDO::FETCH_OBJ)) {
		
		$result[] = array(
			'sf1_lrn' => $row->sf1_lrn,
            'sf1_fullname' => $row->sf1_lname.", ".$row->sf1_fname." ".$row->sf1_mname,
		);
	}
    echo json_encode($result);

?>