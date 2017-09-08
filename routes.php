<?php

function call($controller, $action){
  require_once('controllers/'.$controller. '_controller.php');

  switch ($controller) {
    case 'schools':
      require_once('models/members.php');
      require_once('models/schools.php');
      $controller = new SchoolsController();
    break;
    case 'members':
      require_once('models/schools.php');
      require_once('models/members.php');
      $controller = new MembersController();
    break;
  }

  $controller->{ $action }();
}
$controllers = array('schools' => ['show', 'error'],
                     'members' => ['form', 'register']);

if (array_key_exists($controller, $controllers)) {
  if (in_array($action, $controllers[$controller])) {
    call($controller, $action);
  } else {
    call('schools', 'error');
  }
} else {
  call('schools', 'error');
}

 ?>
