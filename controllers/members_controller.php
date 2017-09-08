<?php
class MembersController {
  public function form(){
    $schools = School::all();
    require_once('views/members/form_member.php');
  }

  public function register(){
    if(!empty($_POST['name']) && !empty($_POST['schools']) && !empty($_POST['email'])){
      $name =   $_POST['name'];
      $email =  $_POST['email'];
      $schools = $_POST['schools'];

      $member = Member::register($name, $email, $schools);
      if($member){
        require_once('views/members/register_member.php');
      }else{
        return call('schools', 'error');
      }

    }else{
      return call('schools', 'error');
    }



    }
}
 ?>
