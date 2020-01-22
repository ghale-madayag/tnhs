<?php
    require_once('handler.php');

    if(isset($_POST['del'])){
        $sql = $handler->prepare('UPDATE newprivatelesson_2017 SET student_id=101 WHERE id=?');
        $sql->execute(array($_POST['del']));
        echo 1;
    }else if(isset($_POST['plid'])){
        $sql = $handler->prepare("UPDATE newprivatelesson_2017 SET 
                school_id=?,
                privatelessonday=?,
                privatelessontime=?,
                orderlist=?
                WHERE id=?
        ");

        $sql->execute(array($_POST['schoolEdit'],$_POST['titleEdit'],$_POST['timeEdit'],$_POST['listEdit'],$_POST['plid']));

        echo 1;
    }else if(isset($_POST['get_pl'])){
        $sql = $handler->prepare('SELECT * FROM newprivatelesson_2017 WHERE id=?');
        $sql->execute(array($_POST['get_pl']));

        while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
            $result[] = array(
                'school_id' => $row->school_id,
                'title' => $row->privatelessonday,
                'time' => $row->privatelessontime,
                'orderlist' => $row->orderlist 
            );
        }

        echo json_encode($result);
    }else if(isset($_POST['emp_id'])){
        $sql = $handler->prepare("INSERT INTO employee(
            `emp_no`,
            `emp_fname`,
            `emp_mname`,
            `emp_lname`
        ) 
        VALUES(
            :emp_id,
            :emp_fname,
            :emp_mname,
            :emp_lname
        )");

        $sql->execute(array(
            'emp_id' => isset($_POST['emp_id']) ? $_POST['emp_id'] : null,
            'emp_fname' => isset($_POST['emp_fname']) ? $_POST['emp_fname'] : null,
            'emp_mname' => isset($_POST['emp_mname']) ? $_POST['emp_mname'] : null,
            'emp_lname' => isset($_POST['emp_lname']) ? $_POST['emp_lname'] : null
        ));

        echo 1;
    }else{
        $sql = $handler->query('SELECT * FROM newprivatelesson_2017 WHERE student_id = 0 ORDER BY id DESC');
        while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
            $dateCre = date_create($row->created);
	        $date = date_format($dateCre, 'm/d/Y');
            $result[] = array(
                'id' => $row->id,
                'school_id' => schoolname($row->school_id), 
                'privatelessonday' => $row->privatelessonday,
                'privatelessontime' => $row->privatelessontime,
                'price' => $row->price,
                'orderlist' => $row->orderlist,
                'created' => $date
            );
        }
        echo json_encode($result);
    }

    function schoolname($name){ 
        switch ($name) { 
            case 1: 
                return '4 Beeston St'; 
                break; 
            case 2: 
                return 'Brisbane Grammar'; 
                break; 
            case 3: 
                return 'Clayfield College'; 
                break; 
            case 4: 
                return 'St Aidan’s'; 
                break; 
            default: 
                return 'Brisbane Powerhouse'; 
                break; 
        } 
    } 

?>