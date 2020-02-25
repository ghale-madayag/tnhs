<?php
    require_once('handler.php');
    if(isset($_POST['sf1_lrn'])){
        $sql = $handler->prepare("INSERT INTO tnhs_sf1(
            `sf1_lrn`,
            `sf1_lname`,
            `sf1_fname`,
            `sf1_mname`,
            `sf1_sex`,
            `sf1_dob`,
            `sf1_religion`,
            `sf1_province`,
            `sf1_city`,
            `sf1_add_line`,
            `sf1_fatname`,
            `sf1_motname`,
            `sf1_guaname`,
            `sf1_rel`,
            `sf1_contact`,
            `sec_id`,
            `sf1_indate`
        ) 
        VALUES(
            :sf1_lrn,
            :sf1_lname,
            :sf1_fname,
            :sf1_mname,
            :sf1_sex,
            :sf1_dob,
            :sf1_religion,
            :sf1_province,
            :sf1_city,
            :sf1_add_line,
            :sf1_fatname,
            :sf1_motname,
            :sf1_guaname,
            :sf1_rel,
            :sf1_contact,
            :sec_id,
            now()
        )");

        $sql->execute(array(
            'sf1_lrn' => isset($_POST['sf1_lrn']) ? $_POST['sf1_lrn'] : null,
            'sf1_lname' => isset($_POST['sf1_lname']) ? $_POST['sf1_lname'] : null,
            'sf1_fname' => isset($_POST['sf1_fname']) ? $_POST['sf1_fname'] : null,
            'sf1_mname' => isset($_POST['sf1_mname']) ? $_POST['sf1_mname'] : null,
            'sf1_sex' => isset($_POST['sf1_sex']) ? $_POST['sf1_sex'] : null,
            'sf1_dob' => isset($_POST['sf1_dob']) ? $_POST['sf1_dob'] : null,
            'sf1_religion' => isset($_POST['sf1_religion']) ? $_POST['sf1_religion'] : null,
            'sf1_province' => isset($_POST['sf1_province']) ? $_POST['sf1_province'] : null,
            'sf1_city' => isset($_POST['sf1_city']) ? $_POST['sf1_city'] : null,
            'sf1_add_line' => isset($_POST['sf1_add_line']) ? $_POST['sf1_add_line'] : null,
            'sf1_fatname' => isset($_POST['sf1_fatname']) ? $_POST['sf1_fatname'] : null,
            'sf1_motname' => isset($_POST['sf1_motname']) ? $_POST['sf1_motname'] : null,
            'sf1_guaname' => isset($_POST['sf1_guaname']) ? $_POST['sf1_guaname'] : null,
            'sf1_rel' => isset($_POST['sf1_rel']) ? $_POST['sf1_rel'] : null,
            'sf1_contact' => isset($_POST['sf1_contact']) ? $_POST['sf1_contact'] : null,
            'sec_id' => isset($_POST['sec_id']) ? $_POST['sec_id'] : null
        ));

        echo 1;
    }else{
        $male = $handler->query('SELECT * FROM tnhs_sf1 WHERE sf1_sex = "M" ORDER BY sf1_lname ASC ');

        while ($row = $male->fetch(PDO::FETCH_OBJ)) {
            $dateCre = date_create($row->sf1_indate);
            $date = date_format($dateCre, 'm/d/Y');
            $tz  = new DateTimeZone('Asia/Taipei');
			$age = DateTime::createFromFormat('m/d/Y', $row->sf1_dob, $tz)
		     ->diff(new DateTime('now', $tz))
             ->y;
             
            $result[] = array(
                'sf1_lrn' => $row->sf1_lrn,
                'sf1_fullname' => $row->sf1_lname.", ".$row->sf1_fname." ".$row->sf1_mname, 
                'sf1_sex' => $row->sf1_sex,
                'sf1_dob' => $row->sf1_dob,
                'sf1_age' => $age,
                'sf1_religion' => $row->sf1_religion,
                'sf1_add' => $row->sf1_add_line.", ".$row->sf1_city.", ".$row->sf1_province,
                'sf1_fatname' => $row->sf1_fatname,
                'sf1_motname' => $row->sf1_motname,
                'sf1_guaname' => $row->sf1_guaname,
                'sf1_rel' => $row->sf1_rel,
                'sf1_contact' => $row->sf1_contact,
                'sf1_indate' => $date
            );
        }

        $female = $handler->query('SELECT * FROM tnhs_sf1 WHERE sf1_sex = "F" ORDER BY sf1_lname ASC ');

        while ($row = $female->fetch(PDO::FETCH_OBJ)) {
            $dateCre = date_create($row->sf1_indate);
            $date = date_format($dateCre, 'm/d/Y');
            $tz  = new DateTimeZone('Asia/Taipei');
			$age = DateTime::createFromFormat('m/d/Y', $row->sf1_dob, $tz)
		     ->diff(new DateTime('now', $tz))
             ->y;
             
            $result[] = array(
                'sf1_lrn' => $row->sf1_lrn,
                'sf1_fullname' => $row->sf1_lname.", ".$row->sf1_fname." ".$row->sf1_mname, 
                'sf1_sex' => $row->sf1_sex,
                'sf1_dob' => $row->sf1_dob,
                'sf1_age' => $age,
                'sf1_religion' => $row->sf1_religion,
                'sf1_add' => $row->sf1_add_line.", ".$row->sf1_city.", ".$row->sf1_province,
                'sf1_fatname' => $row->sf1_fatname,
                'sf1_motname' => $row->sf1_motname,
                'sf1_guaname' => $row->sf1_guaname,
                'sf1_rel' => $row->sf1_rel,
                'sf1_contact' => $row->sf1_contact,
                'sf1_indate' => $date
            );
        }

        echo json_encode($result);
    }
?>