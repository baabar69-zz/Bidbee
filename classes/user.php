<?php


class user
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

    }

    public function getUser()
    {
        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        $sql="Select * from users where type=0;";
        $query_verify = $this->db_connection->query($sql);
                   // $result_query = $query_verify->fetch_assoc();
                    
                    if ($query_verify->num_rows>0)
                    {
                        return $query_verify;
                    }
                    else{

                        echo "No result found";
                    }
    //     if (empty($_POST['login_eMail'])){
    //         $this->errors[] = "Email Required";
    //     }elseif (empty($_POST['login_pwd'])){
    //         $this->errors[] = "Password Required";
    //     }
    //     else {
    //         //Create a database connection
    //       


    //         //if no connection errors (= working database connection)
    //         if (!$this->db_connection->connect_errno){

    //             $loginEmail= $_POST['login_eMail'];
    //             $loginPwd = $_POST['login_pwd'];

    //             //check if email already exists
    //           $sql = "SELECT * FROM users WHERE user_email = '$loginEmail' AND user_pwd = '$loginPwd';";
    //  
    //             if ($query_verify->num_rows == 1 && $this->userStatus == 0 ){

    //                $_SESSION['user'] = $this->userName;
    //                $_SESSION['userId'] = $this->userId;
    //                $_SESSION['userType'] =$this->userType;


    //                header("Location: index.php" );

    //             }elseif($this->userStatus == 2) {
    //                 $this->errors[] = "User is blocked.";

    //             }
    //             elseif($this->userStatus == 1)
    //             {
    //                 $this->errors[] = "User Status Pending.";


    //             }
    //         }else {
    //             $this->errors[] = "Sorry, no database connection.";
    //         }

    //     }








    }


}







?>