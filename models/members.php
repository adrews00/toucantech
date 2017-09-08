<?php
class Member{
  public $id;
  public $name;
  public $email;
  public $schools = array();

  public function __construct($id, $name, $email){
    $this->id      = $id;
    $this->name    = $name;
    $this->email   = $email;
  }

  public static function show(){
    $members = [];
    $database = database::getInstance();

    $req = $database->query('SELECT * FROM members');

    foreach ($req->fetchAll() as $member) {
        $members[] = new Member($member->id, $member->name, $member->email);
    }
    return $members;
  }

  public static function register($name, $email, $schools){
    $result = false;
    $isMemberRegistered = false;
    $database = database::getInstance();

    $reqMember = $database->prepare("INSERT INTO members (member_name,member_email)
                                     VALUES ( :name, :email)");
    $reqSchools = $database->prepare("INSERT INTO memb_scho (member_id, school_id)
                                      VALUES (:member_id ,:school_id)");

    $membParam = array('name'=>$name,
                        'email'=>$email);


    if($reqMember->execute($membParam)){
      $isMemberRegistered = true;
      $id = $database->lastInsertId();
    }

    foreach($schools as $school){
        $schoParam = array('member_id'=>$id ,'school_id'=>$school);
        if(!$reqSchools->execute($schoParam)){
            $isSchoolRegistered = false;
            break;
        }
        else{
            $isSchoolRegistered = true;
        }
      }
    if($isMemberRegistered && $isSchoolRegistered){
      $result = true;
    }
    return $result;
  }

}

?>
