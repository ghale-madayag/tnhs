<?php
    require_once('handler.php');
    if(isset($_POST['print_m'])){
        $sql = $handler->query('SELECT * FROM tnsh_sf1 WHERE sf1_sex = "M" ORDER BY sf1_lname DESC');
        $total = $sql->rowCount();
        while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
            $dateCre = date_create($row->sf1_indate);
            $date = date_format($dateCre, 'm/d/Y');
            $result[] = array(
                'sf_no' => $total,
                'sf2_fullname' => $row->sf1_lname.", ".$row->sf1_fname." ".$row->sf1_mname, 
                'sf2_sex' => $row->sf1_sex
            );

            $total--;
        }
        echo json_encode($result);
    }else if(isset($_POST['print_f'])){
        $sql = $handler->query('SELECT * FROM tnsh_sf1 WHERE sf1_sex = "F" ORDER BY sf1_lname DESC');
        $total = $sql->rowCount();
        while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
            $dateCre = date_create($row->sf1_indate);
            $date = date_format($dateCre, 'm/d/Y');
            $result[] = array(
                'sf_no' => $total,
                'sf2_fullname' => $row->sf1_lname.", ".$row->sf1_fname." ".$row->sf1_mname, 
                'sf2_sex' => $row->sf1_sex
            );

            $total--;
        }
        echo json_encode($result);
    }else{
        $sql = $handler->query('SELECT * FROM tnsh_sf1');
        while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
            $dateCre = date_create($row->sf1_indate);
            $date = date_format($dateCre, 'm/d/Y');
            $tz  = new DateTimeZone('Asia/Taipei');
			$age = DateTime::createFromFormat('m/d/Y', $row->sf1_dob, $tz)
		     ->diff(new DateTime('now', $tz))
             ->y;
             
            $result[] = array(
                'sf2_lrn' => $row->sf1_lrn,
                'sf2_fullname' => $row->sf1_lname.", ".$row->sf1_fname." ".$row->sf1_mname, 
                'sf2_indate' => $date
            );
        }
        echo json_encode($result);
    }
?>