<?php
  class SchoolsController {
    public function show() {
      $schools = School::all();

      if(isset($_GET['school'])){
        $selSchool = School::find($_GET['school']);
        $members =  School::members($selSchool['school_id']);
      }
      require_once('views/schools/show_school.php');
    }

    public function error() {
      require_once('views/schools/error.php');
    }
  }
?>
