<?php
    require_once('handler.php');

    if(isset($_POST['fullname'])){
        $sql = $handler->prepare("INSERT INTO tnhs_sf3(
            sf1_lrn,
            sf3_title,
            sf3_issued,
            sf3_returned,
            sf3_indate
        ) 
        VALUES(
            :lrn,
            :title,
            :issued,
            :returned,
            now()
        )");

        $sql->execute(array(
            'lrn' => isset($_POST['fullname']) ? $_POST['fullname']:null,
            'title' => isset($_POST['title']) ? $_POST['title']:null,
            'issued' => isset($_POST['date_issued']) ? $_POST['date_issued']:null,
            'returned' => isset($_POST['date_returned']) ? $_POST['date_returned']:null
        ));
        $dateCre = date_create($_POST['date_issued']);
        $date = date_format($dateCre, 'M');
        echo $date;
    }elseif(isset($_POST['print'])){
            $sqlM = $handler->query('SELECT * FROM tnhs_sf3 INNER JOIN tnhs_sf1 ON tnhs_sf1.sf1_lrn = tnhs_sf3.sf1_lrn
            WHERE sf1_sex = "M" ORDER BY sf1_lname DESC');
        
            while ($row = $sqlM->fetch(PDO::FETCH_OBJ)) {
                $result[] = array(
                    'sf_no' => $row->sf1_lrn,
                    'fullname' => $row->sf1_lname.", ".$row->sf1_fname." ".$row->sf1_mname, 
                );
            }

            echo json_encode($result);
    }elseif(isset($_POST['printF'])){
        $sqlF = $handler->query('SELECT * FROM tnhs_sf3 INNER JOIN tnhs_sf1 ON tnhs_sf1.sf1_lrn = tnhs_sf3.sf1_lrn
        WHERE sf1_sex = "F" ORDER BY sf1_lname DESC');

        while($row = $sqlF->fetch(PDO::FETCH_OBJ)) {
            $result[] = array(
                'sf_no' => $row->sf1_lrn,
                'fullname' => $row->sf1_lname.", ".$row->sf1_fname." ".$row->sf1_mname, 
            );
        }

        echo json_encode($result);
        
    }else if(isset($_POST['get_td'])){
        $sql = $handler->prepare('SELECT * FROM tnhs_sf3 INNER JOIN tnhs_sf1 ON tnhs_sf1.sf1_lrn = tnhs_sf3.sf1_lrn
        WHERE sf1_sex = ? AND tnhs_sf3.sf1_lrn = ? ORDER BY sf1_lname DESC');

        $sql->execute(array($_POST['sex'],$_POST['val']));
        $total = $sql->rowCount();
        while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
            $result[] = array(
                'issued' => $row->sf3_issued,
                'returned' => $row->sf3_returned,
                'total' => $total
            );
        }
        echo json_encode($result);
    }else if(isset($_POST['view'])){
        $result = "";
        $sql = $handler->query('SELECT * FROM tnhs_sf2_section INNER JOIN tnhs_section ON tnhs_sf2_section.sec_id = tnhs_section.sec_id GROUP BY tnhs_sf2_section.sf2sec_month ORDER BY sf2sec_indate DESC');
        while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
            $dateCre = date_create($row->sf2sec_indate);
            $date = date_format($dateCre, 'm/d/Y');
            $result[] = array(
                'sf2sec_id' => $row->sec_id, 
                'month' => $row->sf2sec_month,
                'sy' => $row->sf2sec_sy,
                'indate' => $date,
            );
        }
        echo json_encode($result);
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
