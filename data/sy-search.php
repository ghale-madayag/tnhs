<?php

    $now = new DateTime();

    $year = $now->format('Y');
    $sy = ($now->format('m') < 6) ? $year - 1 : $year;

    $date2=date('Y', strtotime('+1 Years'));
    for($i=2018; $i<$sy+1;$i++){

        $result[] = array(
			'sy_id' => $i.'-'.($i+1),
			'sy_name' => $i.'-'.($i+1), 
		);
    }

    echo json_encode($result);

?>