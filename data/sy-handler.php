<?php
    require_once('handler.php');

    if (isset($_POST['sy'])) {
        $sql = $handler->prepare("INSERT INTO 
        tnhs_sy(
            sy_year,
            sec_id,
            sy_indate
        ) 
        VALUES(
            :sy,
            :section,
            now()
        )");

        $sql->execute(array(
            'sy' => isset($_POST['sy']) ? $_POST['sy'] : null,
            'section' => isset($_POST['section']) ? $_POST['section'] : null
        ));

        echo 1;
    }else {
        $result = [];
        $sql = $handler->query('SELECT * FROM tnhs_sy INNER JOIN tnhs_section ON tnhs_sy.sec_id = tnhs_section.sec_id');
        while ($row = $sql->fetch(PDO::FETCH_OBJ)){
            $result[] = array(
                'id' => $row->sy_id,
                'year' => $row->sy_year,
                'section' => strtoupper($row->sec_name),
                'indate' => $row->sy_indate
            );
        }

        echo json_encode($result);
    }
?>