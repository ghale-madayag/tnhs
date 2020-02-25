<?php
    require_once('handler.php');
    if(isset($_POST['section'])){
        $sql = $handler->prepare('SELECT sf1_lrn FROM tnhs_sf1 WHERE sec_id=?');
        $sql->execute(array($_POST['section']));

        while($row=$sql->fetch(PDO::FETCH_OBJ)){

            $sf2 = $handler->prepare("INSERT INTO tnhs_sf2(
                sf1_lrn,
                sf2sec_id
            )
                VALUES(
                    :lrn,
                    :sec_id
            )");
            
            $sf2->execute(array(
                'lrn' => $row->sf1_lrn,
                'sec_id' => isset($_POST['section']) ? $_POST['section'] : null,
            ));

            $last_id = $handler->lastInsertId();
            $que = $handler->prepare('INSERT INTO tnhs_sf2_section(
                    `sec_id`,
                    `sf2_id`,
                    `sf2sec_month`,
                    `sf2sec_sy`,
                    `sf2sec_indate`
                )
                VALUES(
                    :sec_id,
                    :lrn,
                    :months,
                    :sy,
                    now()
                )
            ');

            $que->execute(array(
                'sec_id' => isset($_POST['section']) ? $_POST['section'] : null,
                'lrn' => $last_id,
                'months' => isset($_POST['month']) ? $_POST['month'] : null,
                'sy' => isset($_POST['sy']) ? $_POST['sy'] : null
            ));
            
        }

        echo 1;

    }elseif(isset($_POST['print_m'])){
        $sql = $handler->prepare('SELECT * FROM tnhs_sf2_section INNER JOIN tnhs_sf2 ON tnhs_sf2_section.sf2_id = tnhs_sf2.sf2_id 
        INNER JOIN tnhs_sf1 ON tnhs_sf1.sf1_lrn = tnhs_sf2.sf1_lrn
        WHERE sf2sec_month = ? && tnhs_sf2_section.sec_id = ? && sf1_sex = "M" ORDER BY sf1_lname DESC');
        
        $sql->execute(array($_POST['month'],$_POST['sec']));
        $total = $sql->rowCount();
        while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
            $dateCre = date_create($row->sf1_indate);
            $date = date_format($dateCre, 'm/d/Y');
            if($row->sf2_remarks!=null){
                $remark = $row->sf2_remarks;
            }else{
                $remark = "";
            }

            $absent =   $row->sf2_w1m + 
                        $row->sf2_w1t +
                        $row->sf2_w1w +
                        $row->sf2_w1th +
                        $row->sf2_w1f +
                        $row->sf2_w2m + 
                        $row->sf2_w2t +
                        $row->sf2_w2w +
                        $row->sf2_w2th +
                        $row->sf2_w2f +
                        $row->sf2_w3m + 
                        $row->sf2_w3t +
                        $row->sf2_w3w +
                        $row->sf2_w3th +
                        $row->sf2_w3f +
                        $row->sf2_w4m + 
                        $row->sf2_w4t +
                        $row->sf2_w4w +
                        $row->sf2_w4th +
                        $row->sf2_w4f +
                        $row->sf2_w5m + 
                        $row->sf2_w5t +
                        $row->sf2_w5w +
                        $row->sf2_w5th +
                        $row->sf2_w5f;

            $totalAbs = 25 - $absent;

            $result[] = array(
                'sf_no' => $total,
                'fullname' => $row->sf1_lname.", ".$row->sf1_fname." ".$row->sf1_mname, 
                'sf2_w1m' => $row->sf2_w1m,
                'sf2_w1t' => $row->sf2_w1t,               
                'sf2_w1w' => $row->sf2_w1w,
                'sf2_w1th' => $row->sf2_w1th,
                'sf2_w1f' => $row->sf2_w1f,
                'sf2_w2m' => $row->sf2_w2m,
                'sf2_w2t' => $row->sf2_w2t,
                'sf2_w2w' => $row->sf2_w2w,
                'sf2_w2th' => $row->sf2_w2th,
                'sf2_w2f' => $row->sf2_w2f,
                'sf2_w3m' => $row->sf2_w3m,
                'sf2_w3t' => $row->sf2_w3t,
                'sf2_w3w' => $row->sf2_w3w,
                'sf2_w3th' => $row->sf2_w3th,
                'sf2_w3f' => $row->sf2_w3f,
                'sf2_w4m' => $row->sf2_w4m,
                'sf2_w4t' => $row->sf2_w4t,
                'sf2_w4w' => $row->sf2_w4w,
                'sf2_w4th' => $row->sf2_w4th,
                'sf2_w4f' => $row->sf2_w4f,
                'sf2_w5m' => $row->sf2_w5m,
                'sf2_w5t' => $row->sf2_w5t,
                'sf2_w5w' => $row->sf2_w5w,
                'sf2_w5th' => $row->sf2_w5th,
                'sf2_w5f' => $row->sf2_w5f,
                'absent' =>$totalAbs,
                'tardy' =>"",
                'sf2_remarks' => $remark
            );

            $total--;
        }
        echo json_encode($result);
    }else if(isset($_POST['print_f'])){
        $sql = $handler->prepare('SELECT * FROM tnhs_sf2_section INNER JOIN tnhs_sf2 ON tnhs_sf2_section.sf2_id = tnhs_sf2.sf2_id 
        INNER JOIN tnhs_sf1 ON tnhs_sf1.sf1_lrn = tnhs_sf2.sf1_lrn
        WHERE sf2sec_month = ? && tnhs_sf2_section.sec_id = ? && sf1_sex = "F" ORDER BY sf1_lname DESC');
        
        $sql->execute(array($_POST['month'],$_POST['sec']));
        $total = $sql->rowCount();
        while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
            $dateCre = date_create($row->sf1_indate);
            $date = date_format($dateCre, 'm/d/Y');
            if($row->sf2_remarks!=null){
                $remark = $row->sf2_remarks;
            }else{
                $remark = "";
            }

            $absent =   $row->sf2_w1m + 
                        $row->sf2_w1t +
                        $row->sf2_w1w +
                        $row->sf2_w1th +
                        $row->sf2_w1f +
                        $row->sf2_w2m + 
                        $row->sf2_w2t +
                        $row->sf2_w2w +
                        $row->sf2_w2th +
                        $row->sf2_w2f +
                        $row->sf2_w3m + 
                        $row->sf2_w3t +
                        $row->sf2_w3w +
                        $row->sf2_w3th +
                        $row->sf2_w3f +
                        $row->sf2_w4m + 
                        $row->sf2_w4t +
                        $row->sf2_w4w +
                        $row->sf2_w4th +
                        $row->sf2_w4f +
                        $row->sf2_w5m + 
                        $row->sf2_w5t +
                        $row->sf2_w5w +
                        $row->sf2_w5th +
                        $row->sf2_w5f;

            $totalAbs = 25 - $absent;

            $result[] = array(
                'sf_no' => $total,
                'fullname' => $row->sf1_lname.", ".$row->sf1_fname." ".$row->sf1_mname, 
                'sf2_w1m' => $row->sf2_w1m,
                'sf2_w1t' => $row->sf2_w1t,               
                'sf2_w1w' => $row->sf2_w1w,
                'sf2_w1th' => $row->sf2_w1th,
                'sf2_w1f' => $row->sf2_w1f,
                'sf2_w2m' => $row->sf2_w2m,
                'sf2_w2t' => $row->sf2_w2t,
                'sf2_w2w' => $row->sf2_w2w,
                'sf2_w2th' => $row->sf2_w2th,
                'sf2_w2f' => $row->sf2_w2f,
                'sf2_w3m' => $row->sf2_w3m,
                'sf2_w3t' => $row->sf2_w3t,
                'sf2_w3w' => $row->sf2_w3w,
                'sf2_w3th' => $row->sf2_w3th,
                'sf2_w3f' => $row->sf2_w3f,
                'sf2_w4m' => $row->sf2_w4m,
                'sf2_w4t' => $row->sf2_w4t,
                'sf2_w4w' => $row->sf2_w4w,
                'sf2_w4th' => $row->sf2_w4th,
                'sf2_w4f' => $row->sf2_w4f,
                'sf2_w5m' => $row->sf2_w5m,
                'sf2_w5t' => $row->sf2_w5t,
                'sf2_w5w' => $row->sf2_w5w,
                'sf2_w5th' => $row->sf2_w5th,
                'sf2_w5f' => $row->sf2_w5f,
                'absent' =>$totalAbs,
                'tardy' =>"",
                'sf2_remarks' => $remark
            );

            $total--;
        }
        echo json_encode($result);
    }else if(isset($_POST['row1'])){
        foreach ($_POST as $key => $value) {
            $sql = $handler->prepare("UPDATE tnhs_sf2 SET 
                sf2_w1m=:sf2_w1m,
                sf2_w1t=:sf2_w1t,
                sf2_w1w=:sf2_w1w,
                sf2_w1th=:sf2_w1th,
                sf2_w1f=:sf2_w1f,
                sf2_w2m=:sf2_w2m,
                sf2_w2t=:sf2_w2t,
                sf2_w2w=:sf2_w2w,
                sf2_w2th=:sf2_w2th,
                sf2_w2f=:sf2_w2f,
                sf2_w3m=:sf2_w3m,
                sf2_w3t=:sf2_w3t,
                sf2_w3w=:sf2_w3w,
                sf2_w3th=:sf2_w3th,
                sf2_w3f=:sf2_w3f,
                sf2_w4m=:sf2_w4m,
                sf2_w4t=:sf2_w4t,
                sf2_w4w=:sf2_w4w,
                sf2_w4th=:sf2_w4th,
                sf2_w4f=:sf2_w4f,
                sf2_w5m=:sf2_w5m,
                sf2_w5t=:sf2_w5t,
                sf2_w5w=:sf2_w5w,
                sf2_w5th=:sf2_w5th,
                sf2_w5f=:sf2_w5f
                WHERE sf2_id=:sf1_lrn
            ");

            $sql->execute(array(
                'sf2_w1m' => $value[1] ? $value[1]:0,
                'sf2_w1t' => $value[2]  ? $value[2]:0,
                'sf2_w1w' => $value[3]  ? $value[3]:0,
                'sf2_w1th' => $value[4] ? $value[4]:0,
                'sf2_w1f' => $value[5] ? $value[5]:0,
                'sf2_w2m' => $value[6] ? $value[6]:0,
                'sf2_w2t' => $value[7] ? $value[7]:0,
                'sf2_w2w' => $value[8] ? $value[8]:0,
                'sf2_w2th' => $value[9] ? $value[9]:0,
                'sf2_w2f' => $value[10] ? $value[10]:0,
                'sf2_w3m' => $value[11] ? $value[11]:0,
                'sf2_w3t' => $value[12] ? $value[12]:0,
                'sf2_w3w' => $value[13] ? $value[13]:0,
                'sf2_w3th' => $value[14] ? $value[14]:0,
                'sf2_w3f' => $value[15] ? $value[15]:0,
                'sf2_w4m' => $value[16] ? $value[16]:0,
                'sf2_w4t' => $value[17] ? $value[17]:0,
                'sf2_w4w' => $value[18] ? $value[18]:0,
                'sf2_w4th' => $value[19] ? $value[19]:0,
                'sf2_w4f' => $value[20] ? $value[20]:0,
                'sf2_w5m' => $value[21] ? $value[21]:0,
                'sf2_w5t' => $value[22] ? $value[22]:0,
                'sf2_w5w' => $value[23] ? $value[23]:0,
                'sf2_w5th' => $value[24] ? $value[24]:0,
                'sf2_w5f' => $value[25] ? $value[25]:0,
                'sf1_lrn' => $value[0]
            ));

            
        }

        echo 1;
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
    
    }elseif (isset($_POST['view-data'])){
        $result = "";
        $cnt = 1;
        $sec = $_POST['view-data'];
        $mon = $_POST['mon'];
        $male = $handler->prepare('SELECT * FROM tnhs_sf2_section INNER JOIN tnhs_sf2 ON tnhs_sf2_section.sf2_id = tnhs_sf2.sf2_id 
        INNER JOIN tnhs_sf1 ON tnhs_sf1.sf1_lrn = tnhs_sf2.sf1_lrn
        WHERE sf2sec_month = ? && tnhs_sf2_section.sec_id = ? && sf1_sex = "M" ORDER BY sf1_lname ASC');
        
        $male->execute(array($mon,$sec));
        while ($row = $male->fetch(PDO::FETCH_OBJ)) {
            $result[] = array(
                'fullname' => '<input type="hidden" name="row'.$cnt.'[]" value="'.$row->sf2_id.'">'. $row->sf1_lname.", ".$row->sf1_fname." ".$row->sf1_mname, 
                'sf2_w1m' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w1m.'">',
                'sf2_w1t' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w1t.'">',
                'sf2_w1w' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w1w.'">',
                'sf2_w1th' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w1th.'">',
                'sf2_w1f' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w1f.'">',
                'sf2_w2m' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w2m.'">',
                'sf2_w2t' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w2t.'">',
                'sf2_w2w' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w2w.'">',
                'sf2_w2th' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w2th.'">',
                'sf2_w2f' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w2f.'">',
                'sf2_w3m' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w3m.'">',
                'sf2_w3t' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w3t.'">',
                'sf2_w3w' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w3w.'">',
                'sf2_w3th' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w3th.'">',
                'sf2_w3f' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w3f.'">',
                'sf2_w4m' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w4m.'">',
                'sf2_w4t' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w4t.'">',
                'sf2_w4w' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w4w.'">',
                'sf2_w4th' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w4th.'">',
                'sf2_w4f' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w4f.'">',
                'sf2_w5m' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w5m.'">',
                'sf2_w5t' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w5t.'">',
                'sf2_w5w' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w5w.'">',
                'sf2_w5th' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w5th.'">',
                'sf2_w5f' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w5f.'">',
                'sf2_remarks' => '<input style="width:150px;" type="text" value="'.$row->sf2_remarks.'">',
            );
            $cnt++;
        }

        $female = $handler->prepare('SELECT * FROM tnhs_sf2_section INNER JOIN tnhs_sf2 ON tnhs_sf2_section.sf2_id = tnhs_sf2.sf2_id 
        INNER JOIN tnhs_sf1 ON tnhs_sf1.sf1_lrn = tnhs_sf2.sf1_lrn
        WHERE sf2sec_month = ? && tnhs_sf2_section.sec_id = ? && sf1_sex = "F" ORDER BY sf1_lname ASC');
        
        $female->execute(array($mon,$sec));
        
        while ($row = $female->fetch(PDO::FETCH_OBJ)) {
            $result[] = array(
                'fullname' => '<input type="hidden" name="row'.$cnt.'[]" value="'.$row->sf2_id.'">'. $row->sf1_lname.", ".$row->sf1_fname." ".$row->sf1_mname, 
                'sf2_w1m' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w1m.'">',
                'sf2_w1t' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w1t.'">',
                'sf2_w1w' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w1w.'">',
                'sf2_w1th' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w1th.'">',
                'sf2_w1f' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w1f.'">',
                'sf2_w2m' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w2m.'">',
                'sf2_w2t' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w2t.'">',
                'sf2_w2w' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w2w.'">',
                'sf2_w2th' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w2th.'">',
                'sf2_w2f' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w2f.'">',
                'sf2_w3m' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w3m.'">',
                'sf2_w3t' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w3t.'">',
                'sf2_w3w' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w3w.'">',
                'sf2_w3th' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w3th.'">',
                'sf2_w3f' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w3f.'">',
                'sf2_w4m' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w4m.'">',
                'sf2_w4t' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w4t.'">',
                'sf2_w4w' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w4w.'">',
                'sf2_w4th' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w4th.'">',
                'sf2_w4f' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w4f.'">',
                'sf2_w5m' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w5m.'">',
                'sf2_w5t' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w5t.'">',
                'sf2_w5w' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w5w.'">',
                'sf2_w5th' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w5th.'">',
                'sf2_w5f' => '<input maxlength="1" type="text" name="row'.$cnt.'[]" value="'.$row->sf2_w5f.'">',
                'sf2_remarks' => '<input style="width:150px;" type="text" value="'.$row->sf2_remarks.'">',
            );
            $cnt++;
        }
        echo json_encode($result);
    }
?>