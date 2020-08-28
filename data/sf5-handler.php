<?php
    require_once('handler.php');

    if(isset($_POST['fullname'])){
        
    }else{
        $sql = $handler->query("SELECT * FROM tnhs_sf3 INNER JOIN tnhs_sf1 ON 
        tnhs_sf3.sf1_lrn = tnhs_sf1.sf1_lrn ORDER BY sf3_indate DESC");

        while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
            $result[] = array(
                'id' => $row->sf3_id,
                'fullname' => $row->sf1_lname.", ".$row->sf1_fname." ".$row->sf1_mname,
                'title' => $row->sf3_title,
                'issued' => $row->sf3_issued,
                'returned' => $row->sf3_returned
            );
        }

        echo json_encode($result);
    }

?>
