<?php
namespace App\Controllers;

use App\Models\EssayModel;

class essayController{

    private $EssayModel;


    public static function index($params, $queryParams){       //Change this from Echo to json_encode for all responses including response codes
       $essays = "";
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

    public function delete($EssayID){    ///This needs alot of work to be more secure
        $EssayID = $_POST['EssayId'];
        EssayModel::deleteEssay($EssayID);
        header('Content-Type: application/json');
        http_response_code(200);
        echo json_encode(array('message'=>"Essay Deleted!"));
       
    }


    public function create($EssayData){     ///I don't like How this is going, more details below
        if(isset($_SESSION['UID']) || true){
            $EssayData = json_decode($EssayData, true);
            $this->EssayModel = new EssayModel($EssayData);
            if($this->EssayModel->SaveEssayData()){
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