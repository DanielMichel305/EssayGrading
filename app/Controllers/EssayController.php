<?php
namespace App\Controllers;

use App\Models\EssayModel;

class essayController{

    private $EssayModel;


    public function index($params, $queryParams){
       
        if(!empty($queryParams['essayId']) && isset($queryParams['essayId'])){
            $essay = EssayModel::FetchEssay($queryParams['essayId']);
            foreach ($essay as $key => $value) {
                echo $key . " : " . $value . "<br>";
            }
        }
        else if(isset($queryParams['studentid'])){
            $essays = EssayModel::FetchUserEssay($queryParams['studentid']);
            if(!empty($essays)){
                foreach ($essays as $essay){
                    foreach ($essay as $key => $value) {
                        echo $key . " : " . $value . "<br>";
                    }
                    echo "<br>";
                }
            }
            else{
                echo "NO ESSAYS FOUND!";
            }
            
            
        }
        
    }


    public function create($EssayData){
        $EssayData = json_decode($EssayData, true);
        $this->EssayModel = new EssayModel($EssayData);
        if($this->EssayModel->SaveEssayData()){
            echo "Essay Upload Success!";
        }
        else{
            echo "Essay Couldn't Be Completed!";
        }
    }

    public function myEssays(){
        //Needs to be protected resource!

    }

}


?>