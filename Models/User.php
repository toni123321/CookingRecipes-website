

<?php
class User{

    //variables
    private $id;
    private $fname;
    private $lname;
    private $email;
    private $password;
    private $isAdmin;

    private $userFavRecipes = array();

    //constructor
    public function __construct($id, $fname, $lname, $email, $password, $isAdmin){
        $this->id = $id;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->email = $email;
        $this->password = $password;
        $this->isAdmin = $isAdmin;
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

    public function SetIsAdmin($isAdmin){
        $this->isAdmin = $isAdmin;
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

    public function GetEmail(){
        return $this->email;
    }

    public function GetPassword(){
        return $this->password;
    }

    public function SaveRecipeToFavourites($recipe)
    {
        $this->userFavRecipes[] = $recipe;
    }
    public function GetFavRecipes(): array
    {
        return $this->userFavRecipes;
    }

    public function GetIsAdmin()
    {
        return $this->isAdmin;
    }
}
?>