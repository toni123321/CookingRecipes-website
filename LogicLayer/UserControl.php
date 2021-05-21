

<?php include '../Models/User.php'; ?>

<?php
class UserControl{
    private $users = array();

    public function AddUser($id, $fname, $lname, $email, $password, $isAdmin){

        $user = new User($id, $fname, $lname, $email, $password, $isAdmin);
        $this->users[] = $user;
    }

    public function RemoveUser($email, $password){
        foreach($this->users as $user) {
            if($user->email == $email && $user->password == $password){
                //todo - remove
            }
        }
    }

    public function RemoveAllUsers(){
        $this->users = null;
    }

    public function GetAllUsers(){
        return $this->users;
    }

    public function GetUser($id){
        foreach($this->users as $user) {
            if($user->GetId() == $id){
                return $user;
            }
        }
        return null;
    }

}

?>