<?php
namespace App\Models;

require_once __DIR__ . "\\..\\..\\DB\\database.inc.php";

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

    public function SaveEssayData(){
        global $conn;
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


    public static function FetchAllEssays(){
        global $conn;
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

        global $conn;
        $sql = "SELECT * from essays Where EssayId = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $EssayID);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $row = $result->fetch_assoc();
        return [
            "EssayId" => $row["EssayId"],
            "EssayLanguage" => $row["EssayLanguage"],
            "StudentId" => $row["StudentId"],
            "EssayScore" => $row["EssayScore"],
            "PlagirismScore" => $row["PlagirismScore"],
            "LetterGrade" => $row["LetterGrade"],
            "SubmittedAt" => $row["SubmittedAt"],
            "GradedBy" => $row["GradedBy"]
        ];
        

    }

    public static function FetchUserEssay($StudentID){
        global $conn;
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

    public static function deleteEssay($EssayID){
        global $conn;
        $sql = "DELETE FROM essays Where EssayId = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $EssayID);
        $stmt->execute();
        $stmt->close();
    }


    public function __construct($EssayData)
    {
        //global $conn;
        $this->StudentId = $EssayData['StudentId'];
        $this->EssayLanguage = $EssayData['EssayLanguage'];
        $this->EssayId = EssayModel::CreateEssayID($this->StudentId, $this->EssayLanguage);
        $this->EssayScore = $EssayData['EssayScore'];
        $this->plagirismScore = $EssayData['PlagirismScore'];
        $this->LetterGrade = $EssayData['LetterGrade'];
        $this->GradedBy = $EssayData['GradedBy'];
        
    }



}



?>