<?php
class School{
  public $id;
  public $name;

  public function __construct($id, $name){
    $this->id      = $id;
    $this->name    = $name;
  }

  public static function all(){
    $list = [];
    $database = database::getInstance();

    $req = $database->query('SELECT * FROM schools');

    foreach ($req->fetchAll() as $school) {

        $list[] = new School($school['school_id'], $school['school_name']);
    }

    return $list;
  }

  public static function find($id){
    $database = database::getInstance();

    $req = $database->query('SELECT * FROM schools WHERE school_id ='.$id);
    $school = $req->fetch();
    return $school;
  }

  public static function members($id){
    $list = [];
    $database = database::getInstance();

    $req = $database->query('SELECT * FROM memb_scho
                             LEFT JOIN members
                             ON members.member_id = memb_scho.member_id
                             WHERE memb_scho.school_id ='.$id);

    foreach ($req->fetchAll() as $member) {
      $list[] = new Member($member['member_id'], $member['member_name'], $member['member_email']);
    }

    return $list;
  }
}

  ?>
