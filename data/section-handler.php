<?php
    require_once('handler.php');

    if (isset($_POST['section'])) {
        $sql = $handler->prepare("INSERT INTO 
        tnhs_section(
            sec_name,
            sec_indate
        ) 
        VALUES(
            :section,
            now()
        )");

        $sql->execute(array(
            'section' => isset($_POST['section']) ? $_POST['section'] : null
        ));

        echo 1;
    }else {
        $result = [];
        $sql = $handler->query('SELECT * FROM tnhs_section ORDER BY sec_name ASC');
        while ($row = $sql->fetch(PDO::FETCH_OBJ)){
            $result[] = array(
                'id' => $row->sec_id,
                'section' => strtoupper($row->sec_name),
                'indate' => $row->sec_indate,
            );
        }

        echo json_encode($result);
    }
?>