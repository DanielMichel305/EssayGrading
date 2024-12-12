<?php
namespace App\Models;

use mysqli_stmt;

require __DIR__ . '\\..\\..\\DB\\database.inc.php';

///Figure out a way to serialize thisclass 
//Create setters And Getters
class UserModel
{
    public $UID;
    private $FirstName;
    private $LastName;
    public $Username;
    private $Password;
    private $Email;
    private $RegisteredAt;
    private $AccountStatus;
    private $Country;

    public static function GenerateUID(){
        $bytes = random_bytes(7);
        return bin2hex($bytes);
    }

    public function __construct($UID) {
        global $conn;
        $this->UID = $UID;
        $query = "SELECT * from users WHERE UID = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $UID);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($userData = mysqli_fetch_assoc($result)){
            $this->FirstName = $userData['FirstName'];
            $this->LastName = $userData['LastName'];
            $this->Username = $userData['Username'];
            $this->Password = $userData['Password'];
            $this->Email = $userData['Email'];
            $this->RegisteredAt = $userData['RegisteredAt'];
            $this->AccountStatus = $userData['AccountStatus'];
            $this->Country = $userData['Country'];
        }
        else{
            throw new \Exception("User associated with UID not found!");
        }
        mysqli_stmt_close($stmt);
        
    }

    public function delete($UID){
        global $conn;
        $stmt = $conn->prepare("DELETE FROM users WHERE UID = ?");
        $stmt->bind_param('s', $this->UID);
        $stmt->execute();
        $stmt->close();
    }

    public function updateUserData($UserData){  //chech for data duplicates when updating data

        global $conn;
        //$originalUserModel = new UserModel($_SESSION["UID"]);   //USER MUST BE LOGGED IN //IGNORE THIS..PHP IS JS DRIVING ME CRAZY!

        $FirstName = $UserData['FirstName'] ?? $this->FirstName;
        $LastName = $UserData['LastName'] ?? $this->LastName;
        $Email = $UserData['Email'] ?? $this->Email;
        $Username = $UserData['Username'] ?? $this->Username;
        $Country = $UserData['Country'] ?? $this->Country;

        $stmt = $conn->prepare("UPDATE users SET FirstName = ?, LastName = ?, Username = ?, Email = ?, Country = ? WHERE UID = ?");
        $stmt->bind_param('ssssss', $FirstName, $LastName, $Username,$Email, $Country, $this->UID);
        $stmt->execute();
        $stmt->close();

    }

    public static function signUp($UserData){

        global $conn;

        //perform error handling and input sanitization
        $UID = UserModel::GenerateUID();
        $FirstName = $UserData['FirstName'];
        $LastName = $UserData['LastName'];
        $Email = $UserData['Email'];
        $Password = password_hash($UserData['Password'],PASSWORD_BCRYPT);
        $Username = $UserData['Username'];
        $Country = $UserData['Country'];

        $stmt = $conn->prepare("INSERT into users (UID, FirstName, LastName, Username, Email, Password, Country, AccountStatus) Values (?,?,?,?,?,?,?,0)");
        $stmt->bind_param('sssssss', $UID, $FirstName, $LastName, $Username,$Email,$Password, $Country);
        $stmt->execute();
        $stmt->close();



    }
    public static function login($UserName, $Password){
        global $conn;
        $query = "SELECT * FROM users WHERE Username = ?";
        $stmt = mysqli_prepare($conn,$query);
        mysqli_stmt_bind_param($stmt, 's', $UserName);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if($userData = mysqli_fetch_assoc($result)){
            if(password_verify($Password, $userData['Password'])){
                return $userData['UID'];
            }
        }
        else{
            throw new \Exception("Username and/or password are inccorect!");

        }
        mysqli_stmt_close($stmt);
        return 0;
        

    }

    public function __toString()
    {
        $accStatus="Not Active";
        if($this->AccountStatus === true) $accStatus="Active";

        return "FirstName: " . $this->FirstName . "<br>" .
        " LastName: " . $this->LastName . "<br>" .
        " Username: " . $this->Username . "<br>" .
        " Email: " . $this->Email . "<br>" .
        " UID: " . $this->UID . "<br>" .
        " Registered At: " . $this->RegisteredAt . "<br>" .
        " Account Status: " . $accStatus . "<br>" .
        " Country: " . $this->Country . "<br>" ;

    }

    public static function fetchUsers(){
        global $conn;
        $sql = "SELECT * from users";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        //$row = $result->fetch_assoc();
        $rows = [];
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
        
    }
    
}


?>