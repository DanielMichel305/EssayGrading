<?php
namespace App\Models;
use App\DB\DatabaseHandler;

//require_once __DIR__ . "\\..\\..\\DB\\database.inc.php";

class EssayModel {
    private $EssayId;
    private $EssayLanguage;
    private $StudentId;
    private $EssayScore;
    private $plagirismScore;
    private $LetterGrade;
    private $SubmittedAt;
    private $GradedBy;
    ///I Don't Like How this initializes and saves data
    ///TBD: REFACTOR data Creation, Initialization and saving Logic

    private static function CreateEssayID($StudentID, $EssayLanguage){

        return bin2hex(random_bytes(4)) . $StudentID . $EssayLanguage . date("i:s");

    }


    public function editEssayAttributes($essayData){
        $this->EssayLanguage = $essayData["essayLanguage"] ?? $this->EssayLanguage;
        $this->EssayScore = $essayData["essayScore"] ?? $this->EssayScore;
        $this->plagirismScore = $essayData["plagirismScore"] ?? $this->plagirismScore;
        $this->LetterGrade = $essayData["letterGrade"] ?? $this->LetterGrade;
        $this->GradedBy = $essayData["gradedBy"] ?? $this->GradedBy;
    }


    public function create(){
        
        $conn = DatabaseHandler::getDBInstance()->getConnectionInstance();
        $sql = "INSERT into essays (EssayId, EssayLanguage, StudentId, EssayScore, PlagirismScore, LetterGrade, GradedBy) VALUES (?,?,?,?,?,?,?)";
        if($stmt = $conn->prepare($sql)){
            $stmt->bind_param('sssiiss', $this->EssayId, $this->EssayLanguage,$this->StudentId, $this->EssayScore, $this->plagirismScore,$this->LetterGrade,$this->GradedBy);
            if($stmt->execute()){
                $stmt->close();
                return true;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
     
    }


    public function save(){ ////ERORRRR HANDLING
        $conn = DatabaseHandler::getDBInstance()->getConnectionInstance();
        $query = "UPDATE essays WHERE EssayId = ? SET EssayLanguage = ?, EssayScore = ?, PlagirismScore = ?, LetterGrade = ?, GradedBy = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssiiss',
            $this->EssayId,
            $this->EssayLanguage,
            $this->EssayScore,
            $this->plagirismScore,
            $this->LetterGrade,
            $this->GradedBy
        );
        $stmt->execute();
        $stmt->close();
    }



    public static function getFilteredEssays($queryFilters){        /////DON'T Forget Error Handling
        $conn = DatabaseHandler::getDBInstance()->getConnectionInstance();
        $query = "SELECT * FROM essays WHERE 1=1 ";
        $filterTypes="";
        $params = [];
        if(isset($queryFilters["language"])){
            $query .= " AND EssayLanguage = ?";
            $filterTypes .= "s";
            $params[] = $queryFilters["language"];
        }
        if(isset($queryFilters["uid"])){
            $query .= " AND StudentId = ?";
            $filterTypes .= "s";
            $params[] = $queryFilters["uid"];
        }
        if(isset($queryFilters["grading-agent"])){
            $query .= " AND GradedBy = ?";
            $filterTypes .= "s";
            $params[] = $queryFilters["grading-agent"];
        }
        $stmt = $conn->prepare($query);
        $stmt->bind_param($filterTypes, ...$params);

        $stmt->execute();
        $results = $stmt->get_result();
        $essays = $results->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $essays;

    }



    public static function FetchAllEssays(){
        $conn = DatabaseHandler::getDBInstance()->getConnectionInstance();
        $sql = "SELECT * from essays";
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

    public static function FetchEssay($EssayID){

        $conn = DatabaseHandler::getDBInstance()->getConnectionInstance();
        $sql = "SELECT * from essays Where EssayId = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $EssayID);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $row = $result->fetch_assoc();
        $essayData  = [
            "EssayId" => $row["EssayId"],
            "EssayLanguage" => $row["EssayLanguage"],
            "StudentId" => $row["StudentId"],
            "EssayScore" => $row["EssayScore"],
            "PlagirismScore" => $row["PlagirismScore"],
            "LetterGrade" => $row["LetterGrade"],
            "SubmittedAt" => $row["SubmittedAt"],
            "GradedBy" => $row["GradedBy"]
        ];
        return new EssayModel($essayData, $EssayID);
        

    }

    public static function FetchUserEssay($StudentID){
        $conn = DatabaseHandler::getDBInstance()->getConnectionInstance();
        $sql = "SELECT * from essays Where StudentId = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $StudentID);
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

    public static function delete($EssayID){
        $conn = DatabaseHandler::getDBInstance()->getConnectionInstance();
        $sql = "DELETE FROM essays Where EssayId = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $EssayID);
        $stmt->execute();
        $stmt->close();
    }


    public function __construct($EssayData, $essayId = null)           ///This is just a crude way to be able to return new EssayModel that already exists
    {
        // $conn = DatabaseHandler::getDBInstance()->getConnectionInstance();;
        $this->StudentId = $EssayData['StudentId'];
        $this->EssayLanguage = $EssayData['EssayLanguage'];
        $this->EssayId = $essayId ?? EssayModel::CreateEssayID($this->StudentId, $this->EssayLanguage);
        $this->EssayScore = $EssayData['EssayScore'];
        $this->plagirismScore = $EssayData['PlagirismScore'];
        $this->LetterGrade = $EssayData['LetterGrade'];
        $this->GradedBy = $EssayData['GradedBy'];
        
    }



}



?>