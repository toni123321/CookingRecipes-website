<!--Class User -->

<?php
class User{

    //variables
    private $id;
    private $fname;
    private $lname;
    private $dob;
    private $email;
    private $password;

    //constructor
    public function __construct($id, $fname, $lname, $dob, $email, $password){
        $this->id = $id;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->dob = $dob;
        $this->email = $email;
        $this->password = $password;
    }

    //setters

    public function SetId($id){
        $this->id = $id;
    }

    public function SetFName($fname){
        $this->fname = $fname;
    }

    public function SetLName($lname){
        $this->lname = $lname;
    }

    public function SetDob($dob){
        $this->dob = $dob;
    }

    public function SetEmail($email){
        $this->email = $email;
    }

    public function SetPassword($password){
        if (strlen($password) >= 8) {
            $this->password = $password;
        } else {
            //error msg
        }
    }

    //getters
    public function GetId(){
        return $this->id;
    }

    public function GetFName(){
        return $this->fname;
    }

    public function GetLName(){
        return $this->lname;
    }

    public function GetDob(){
        return $this->dob;
    }

    public function GetEmail(){
        return $this->email;
    }

    public function GetPassword(){
        return $this->password;
    }

}
?>