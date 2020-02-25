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

        echo 1;
    }elseif(isset($_POST['print'])){
            $sql = $handler->query('SELECT * FROM tnhs_sf3 INNER JOIN tnhs_sf1 ON tnhs_sf1.sf1_lrn = tnhs_sf3.sf1_lrn
            WHERE sf1_sex = "M" ORDER BY sf1_lname DESC');
            
            //$sql->execute(array($_POST['month'],$_POST['sec']));
            // $total = $sql->rowCount();
            $stud = array();
            while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $stud[$row->sf1_lname.", ".$row->sf1_fname." ".$row->sf1_mname][] = '<td>'.$row->sf3_issued.'</td><td>'.$row->sf3_returned.'</td>';
            //     $dateCre = date_create($row->sf1_indate);
            //     $date = date_format($dateCre, 'm/d/Y');


            //     $result[] = array(
            //         'sf_no' => $total,
            //         'fullname' => $row->sf1_lname.", ".$row->sf1_fname." ".$row->sf1_mname, 
            //         'issued' => $row->sf3_issued,
            //         'returned' => $row->sf3_returned
            //     );

            //     $total--;
            }
            // echo json_encode($result);

            foreach($stud as $key => $stu){
                //$result[] = array('fullname' => $key);

                foreach($stu as $item){ 
                    //array_push($result,array("td"=>$item));
                    $result[] = array('fullname' => $key,'td' => $item);
                }
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
