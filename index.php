<?php
require_once 'utils/RequireUtils.php';
RequireUtils::once(array(
	'Application.php',
	'utils/SessionUtils.php'
));


// search engine friendly
// here will call the corresponding controller and action
$application = new Application();
$application->run();
  


// $databaseUtils = new DatabaseUtils('localhost','root',);
// $result = $databaseUtils->select('select * from wrt_worldtree');
// var_dump($result);
// $databaseUtils->close();


