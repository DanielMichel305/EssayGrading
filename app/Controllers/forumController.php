<?php
namespace App\Controllers;

use App\Models\ForumModel;
use App\Models\ForumPostModel;

class ForumController{


    public function createNewThread($threadData){
        $threadData = json_decode($threadData,true);
        
        //var_dump($threadData);
        $forumThread = new ForumModel($threadData["threadTitle"], $threadData["threadTextData"], $threadData["authorId"]); ///preferably extract the UID from the session and also ensuring that the publisher is logged in
        $forumThread->create();
        echo "Thread with title: " . $forumThread->threadTitle . " was created!";
        
    }
    /**
     * @param string $ForumId If no forumThreadId is provided the function checks for URL queries
     * return   -  an associative array tan can be converted to json, serialized, logged or wtvr you want
     */
    public function getForumThreadById($ForumId = null){   ///check with FrontEnd on how they would like data to be delivered (JSON,PHP variable, etc..)
        ///Do some authentication/verification first before actually retrieveing the forumThread
        ///This needs to return the entire thread or just the post
        $ForumId = $ForumId ?? $_GET["threadId"];
        $forumThreadPost =  ForumModel::getThreadById($ForumId);
        $forumPosts = ForumPostModel::getThreadPosts($ForumId);
        $threadData = ["forumThread"=>$forumThreadPost,"forumPosts"=>$forumPosts];
        return (object)$threadData;

    }
    
    public function getUserThreads($userId){        ///Check if $userId isset
        $forumThread =  ForumModel::getUserThreadPosts($userId);
        return $forumThread;

    }

    public function modifyForumThread($threadData){
        $threadData = json_decode($threadData,true);

        $forumThread = $this->getForumThreadById($threadData["forumThreadId"]);
        $forumThread->modifyForumThreadData($threadData);
        $forumThread->save();
        echo "Thread Updated!";
        
    }

    public function deleteForumThreadById($id){

        ///IMPORTANT: DO AUTHENTICATION AND VERIFICATION FIRST!
        $forumToDelete = ForumModel::getThreadById($id);
        $forumToDelete->delete();



    }

}

?>