<?php
namespace App\Models;
use App\DB\DatabaseHandler;
use DateTime;

class ForumPostModel {

    private $postId;
    private $createdAt;
    private $authorUID;
    private $threadID;
    private $postTextData;
    private $upvotes;

    public function __construct($postTextData,$authorUID, $threadID)
    {

        $this->createdAt = date('Y/m/d H:i:s',time());
        $this->threadID = $threadID;
        $this->postId = bin2hex(random_bytes(4)) . $threadID;
        $this->postTextData = $postTextData;
        $this->upvotes=0;
        $this->authorUID = $authorUID;

    }
    public function fetchPostbyID($post_id){        ////THIS WON'T WORK CHANGE FROM PDO TO MYSQLI
         $conn = DatabaseHandler::getDBInstance()->getConnectionInstance();;

        $stmt = $conn->prepare("SELECT * from forum_posts where post_id = :post_id");
        $stmt->execute([":post_id"=>$post_id]);

        $result = $stmt->get_result();
        $post = $result->fetch_assoc();
        $stmt->close();

        return $post;
    }
    
    public static function getThreadPosts($threadId){
         $conn = DatabaseHandler::getDBInstance()->getConnectionInstance();;
        $stmt= $conn->prepare("SELECT * FROM forum_posts where thread_id = ?");
        $stmt->bind_param('s', $threadId);
        $stmt->execute();
        $result = $stmt->get_result();
        $threadPosts = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $threadPosts;
    }

    public function create(){   //This would be changed to private and just provide the abstract save function
         $conn = DatabaseHandler::getDBInstance()->getConnectionInstance();;
        $query = "INSERT into forum_posts (post_id, created_at, thread_id, author_uid,upvotes,post_text) VALUES (?,?,?,?,?,?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssss",
            $this->postId,
            $this->createdAt,
            $this->threadID,
            $this->authorUID,
            $this->upvotes,
            $this->postTextData
        );
        $stmt->execute();
        $stmt->close();
    }


    public function saveUpdates(){
        
    }

    //implement an abstarct save function that calls appropriate DB saving function

}

?>