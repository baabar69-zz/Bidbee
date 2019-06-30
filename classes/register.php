<?php


class UserRegistration
{
    /**
     * @var object $db_connection The database connection
     */
    private $db_connection = null;
    /**
     * @var array $errors Collection of error messages
     */
    public $errors = array();
    /**
     * @var array $messages Collection of success / neutral messages
     */
    public $messages = array();



    public function __construct()
    {
        if (isset($_POST["registerForm"]))
        {
                $this->registerUser();
        }


    }


    private function registerUser()
    {

        if (empty($_POST['firstname'])){
            echo  "First Name Required";
        }elseif (empty($_POST['lastname'])){
            echo  "Last Name Required";
        }elseif (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            echo  "E-Mail is mission or invalid";
        }elseif (empty($_POST['re_pass'])){
            echo  "Password Required";
        }elseif (empty($_POST['pass'])){
            echo  "Please Confirm your Password";
        }elseif ($_POST['re_pass'] != $_POST['pass']){
            echo "Passwords Not Match";
        }
        else
        {
            //Create a database connection
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);



            //if no connection errors (= working database connection)
            if (!$this->db_connection->connect_errno){

                $fName = $_POST['firstname'];
                $lName = $_POST['lastname'];
                $email = $_POST['email'];
                $pwd = $_POST['pass'];
                $cpwd = $_POST['re_pass'];

                    $sql = "INSERT INTO users(first_name, last_name,email,password , type) 
                              VALUES ('$fName','$lName','$email','$pwd',0);";

                    $query_new_user_insert = $this->db_connection->query($sql);

                    //If user added successfully
                    if ($query_new_user_insert){
                        echo " Successful Registration!!";
                    }else {
                        echo "Sorry, failed to register. Please go back and try again.";
                    }

                
            }else {
                echo "Sorry, no database connection.";
            }

        








    }


}

}






?>