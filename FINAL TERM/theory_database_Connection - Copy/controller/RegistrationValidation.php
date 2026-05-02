<?php 
include "../Model/db.php";
session_start();

$name = "";
$email = "";
$website = "";
$comment = "";
$gender = "";
$userid = "";
$datafile ="../data.json";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $userid = $_POST["userid"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $website = $_POST["website"];
    $comment = $_POST["comment"];

    if(isset($_POST["gender"])) {
        $gender = $_POST["gender"];
    }

    if(!empty($userid) && strlen($userid)>=5 && !empty($name) && strlen($name)>=5 && !empty($email))
    {
        $_SESSION["name"] = $name;
        setcookie('name', $name, time()+3600, "/");
        echo "Login Successful";

        $formdata = array(
            "UserID"=>$userid,
            "Name"=>$name, 
            "Email"=>$email,
            "Website"=>$website,
            "Comment"=>$comment,
            "Gender"=>$gender
        );

        if(file_exists($datafile))
        {
            $existdata = file_get_contents($datafile);
            $tempdata = json_decode($existdata, true);
        }
        else {
            $tempdata = array();
        }

        if(!is_array($tempdata))
        {
            $tempdata = array(); 
        }

        $tempdata[] = $formdata;
        $jsondata = json_encode($tempdata, JSON_PRETTY_PRINT);

        if(file_put_contents($datafile, $jsondata) !== false)
        {
            echo "Data Saved";
        }
        else {
            echo "Please Try Again";
        }

        $data = file_get_contents($datafile);
        $mydata = json_decode($data);

        $database = new db();
        $connection = $database->connection(); 
        
        $result = $database->signup($connection, "user", $userid, $name, $email,$website, $comment, $gender);

        if($result)
        {
            Header("Location: ../View/login.php");
        }
        else {
            echo "Please try again!";
        }
    }

    if(isset($_SESSION["name"]) || isset($_COOKIE["name"]))
    {
        echo "Welcome Back";
    }
    else {
        echo "pLease log in agian!"; 
    }
}
?>