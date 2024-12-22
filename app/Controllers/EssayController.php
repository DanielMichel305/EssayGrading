<?php
namespace App\Controllers;

use App\Models\EssayModel;

class essayController{

    private $essayModel;


    public static function index($params, $queryParams){       //Change this from Echo to json_encode for all responses including response codes
      
        if(!empty($queryParams['essayId']) && isset($queryParams['essayId'])){
            $essay = EssayModel::FetchEssay($queryParams['essayId']);
        }
        else if(isset($queryParams['studentid'])){
            $essays = EssayModel::FetchUserEssay($queryParams['studentid']);
        }
        else{
            $essays = EssayModel::FetchAllEssays();
            
        }
         header('Content-Type: application/json');
         http_response_code(200);
         echo json_encode($essays);
        return (object) $essays;
    }

    public function fetchEssaysByQueryData(){
        $essays = essayModel::getFilteredEssays($_GET);
        header("Content-type: application/json");
        echo json_encode($essays);
    }


    public function getEssayDataByID($essayId){
        $essayId = $_GET["id"] ?? $essayId;
        $essay = $this->essayModel->FetchEssay($essayId);
        return (object) $essay;
    }


    public function delete($EssayID = null){    ///This needs alot of work to be more secure
        $EssayID = $essayID ?? $_POST['EssayId'];
        EssayModel::delete($EssayID);
        header('Content-Type: application/json');
        http_response_code(200);
        echo json_encode(array('message'=>"Essay Deleted!"));
       
    }

    /**
     * The way this function works is by using the EssayModel::FetchEssay() function that returns a new EssayModel that can be modified and have the save function called on it.
     * 
     * NEEDS MORE WORK TO MAKE IT PROTECTED AND SECURE
     */
    public function updateEssayData($essayData){
        $essayData = json_decode($essayData);
        $essay = EssayModel::FetchEssay($essayData["essayId"]);
        $essay->editEssayAttributes($essayData);
        $essay->save();
    }


    public function create($EssayData){     ///I don't like How this is going, more details below
        if(isset($_SESSION['UID']) || true){
            $EssayData = json_decode($EssayData, true);
            $this->essayModel = new EssayModel($EssayData);
            if($this->essayModel->create()){
                echo "Essay Upload Success!";
            }
            else{
                echo "Essay Couldn't Be Completed!";
            }
        }
        else{
            echo htmlspecialchars("You need to login first!");
        }
        
    }
    ///Instead of how the logic uses the SaveEssayData function which is Generic for the just new Essay creation.
    //TODO: Change to specific function for Each type of operation

}


?>