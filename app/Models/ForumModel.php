<?php
namespace App\Models;
use App\DB\DatabaseHandler;
use Exception;

require_once __DIR__ . "\\..\\..\\DB\\database.inc.php";

class ForumModel{

    private $threadID;
    private $createdAt;
    public $publisherUID;
    public $threadTitle;
    public $threadTextData;
    private $upvotes;

    public function __construct($threadTitle=null, $threadTextData=null, $publisherUID=null, $originalClass = null){
        if(!$originalClass){
            $this->threadID = bin2hex(random_bytes(5)).$publisherUID;
            $this->createdAt = date('Y-m-d H:i:s', time());
            $this->publisherUID = $publisherUID;
            $this->threadTitle = $threadTitle;
            $this->threadTextData = $threadTextData;
            $this->upvotes = 0;
        }
        else{
            $this->threadID = $originalClass["thread_id"];
            $this->publisherUID = $originalClass["author_id"];
            $this->createdAt = $originalClass["created_at"];
            $this->threadTitle = $originalClass["thread_title"];
            $this->threadTextData = $originalClass["thread_text_data"];
            $this->upvotes = $originalClass["upvotes"];
        }
        
    }
   


    public static function getThreadById($threadId){    //Should this get the entire thread or just the post and then another function for retriving the entire thread + comment section
         $conn = DatabaseHandler::getDBInstance()->getConnectionInstance();;
        $query = "SELECT * from forum_threads where thread_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $threadId);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = $result->fetch_assoc();
        $stmt->close();
        //error_log("----->>>" . print_r($result));
        return new ForumModel(originalClass:$result);

    }

    public static function getUserThreadPosts($userName){

        $UID = UserModel::getUsernameUID($userName);

         $conn = DatabaseHandler::getDBInstance()->getConnectionInstance();;
        $stmt = $conn->prepare("SELECT * from forum_threads where author_id = ?");
        $stmt->bind_param('s', $UID);
        $stmt->execute();
        $result = $stmt->get_result();
        $userThreadPosts = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $userThreadPosts;

    }

    /**
     * @param array $threadData This is an assoc. array of the updated values, if none are provided the current ones will be kept
     */
    public function modifyForumThreadData($threadData){
        $this->threadTitle = $threadData["threadTitle"] ?? $this->threadTitle;
        $this->threadTextData = $threadData["threadTextData"] ?? $this->threadTextData;
        $this->upvotes = $threadData["upvotes"] ?? $this->upvotes;

    }

    public function create(){
         $conn = DatabaseHandler::getDBInstance()->getConnectionInstance();;
        $query = "INSERT into forum_threads (thread_id, author_id, created_at, thread_title, thread_text_data, upvotes) values (?,?,?,?,?,?)";
        $stmt = $conn->prepare($query);
       
            
        $stmt->bind_param(
            "sssssi",
            $this->threadID,
            $this->publisherUID,
            $this->createdAt,
            $this->threadTitle,
            $this->threadTextData, 
            $this->upvotes
            );
        $stmt->execute();
        $stmt->close();

    }

    public function delete($forumId =null){

        $forumId = $forumId ?? $this->threadID;
         $conn = DatabaseHandler::getDBInstance()->getConnectionInstance();;
        $query = "DELETE forum_threads WHERE thread_id=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $forumId);
        $stmt->execute();
        $stmt->close();

    }

    public function save(){
         $conn = DatabaseHandler::getDBInstance()->getConnectionInstance();;
        $query = "UPDATE forum_threads SET thread_title = ?, thread_text_data = ?, upvotes = ? WHERE thread_id=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssis",
            $this->threadTitle,
            $this->threadTextData,
            $this->upvotes,
            $this->threadID
        );
        $stmt->execute();
        $stmt->close();
    }

}

?>