<?php
require_once 'utils/SearchenginefriendlyUtils.php';
require_once 'utils/SessionUtils.php';

// search engine friendly
SearchenginefriendlyUtils::run();


try {
$mysqli = new mysqli('localhost','root', null, 'worldtree');
$mysqli->set_charset("utf8");
$query = 'select * from wtr_worldtree';
if ($result = $mysqli->query($query)) {
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        var_dump($row);
    }

    /* free result set */
    $result->free();
}
} catch (Exception $e) {
	echo 1;
}
echo 2;



// $databaseUtils = new DatabaseUtils('localhost','root',);
// $result = $databaseUtils->select('select * from wrt_worldtree');
// var_dump($result);
// $databaseUtils->close();


