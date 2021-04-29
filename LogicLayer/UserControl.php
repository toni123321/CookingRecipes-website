
<!-- Control class -->
<?php include '../Models/User.php'; ?>

<?php
class UserControl{
    private $users = array();

    public function AddUser($id, $fname, $lname, $email, $password){

        $user = new User($id, $fname, $lname, $email, $password);
        $this->users[] = $user;
    }

    public function RemoveUser($email, $password){
        foreach($this->users as $user) {
            if($user->email == $email && $user->password == $password){
                //todo - remove
            }
        }
    }

    public function GetAllUsers(){
        return $this->users;
    }

    public function GetUser($id){
        foreach($this->users as $user) {
            if($user->id == $id){
                return "$user";
            }
        }
        return null;
    }

}

?>