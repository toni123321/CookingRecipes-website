
<!-- Control class -->
<?php include 'User.php'; ?>
<?php include 'Recipe.php'; ?>

<?php
class Control{
    private $users = array();
    private $recipes = array();

    public function AddUser($id, $fname, $lname, $dob, $email, $password){

        $user = new User($id, $fname, $lname, $dob, $email, $password);
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

    public function GetUser($email){
        foreach($this->users as $user) {
            if($user->email == $email){
                return "$user";
            }
        }
        return null;
    }

    //recipes
    public function AddRecipe($id, $title, $calories, $cuisine, $duration, $difficulty, $instructions){
        $recipe = new Recipe($id, $title, $calories, $cuisine, $duration, $difficulty, $instructions);
        $this->recipes[] = $recipe;
    }

    public function RemoveRecipe($id){
        foreach($this->recipes as $recipe) {
            if($recipe->id == $id){
                //todo - remove
            }
        }
    }

    public function GetAllRecipes(){
        return $this->recipes;
    }

    public function GetRecipe($id){
        foreach($this->recipes as $recipe) {
            if($recipe->id == $id){
                return $recipe;
            }
        }
        return null;
    }

}

?>