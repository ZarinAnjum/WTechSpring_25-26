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

    
    $isValid = true;

    if(!empty($userid) && strlen($userid)>=5){

    } else {
        echo"User ID is not valid<br>";
        $isValid = false;
    }

    if(!empty($name) && strlen($name)>=5){

    } else {
        echo"Username is not valid<br>";
        $isValid = false;
    }
      
    if(!empty($email) && preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)){
        
    } else {
        echo"Email is not valid <br>";
        $isValid = false;
    }

if (!empty($website)) {
    if (!preg_match("/^(https?:\/\/)?(www\.)?[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}(\/\S*)?$/", $website)) {
        $errors[] = "Website URL is not valid.";
        $isValid  = false;
    }
}

    if(!empty($comment)){
        
    } else {
        echo"Comment is empty <br>";
        $isValid = false;
    }

    if(!empty($gender)){
       
    } else {
        echo"Gender is not selected <br>";
        $isValid = false;
    }

    if (!$isValid) {
    foreach ($errors as $error) {
        echo $error . "<br>";
    }
    exit(); 
}

$formdata = [
    "UserID"  => $userid,
    "Name"    => $name,
    "Email"   => $email,
    "Website" => $website,
    "Comment" => $comment,
    "Gender"  => $gender
];

$tempdata = [];
if (file_exists($datafile)) {
    $existing = file_get_contents($datafile);
    $decoded  = json_decode($existing, true);
    if (is_array($decoded)) {
        $tempdata = $decoded;
    }
}
$tempdata[] = $formdata;
file_put_contents($datafile, json_encode($tempdata, JSON_PRETTY_PRINT));

$database   = new db();
$connection = $database->connection();
$result     = $database->signin($connection, "user", $userid, $name);

if ($result) {
    $_SESSION["name"] = $name;
    setcookie("name", $name, time() + 3600, "/");
    header("Location: ../View/login.php");
    exit();
} else {
    echo "Login failed. User not found. Please register first.";
    exit();
}
    // if($isValid){ 
    //     $_SESSION["name"] = $name;
    //     setcookie("name", $name, time()+3600, "/");

    //     $formdata = array(
    //         "UserID"=>$userid,
    //         "Name"=>$name,
    //         "Email"=>$email,
    //         "Website"=>$website,
    //         "Comment"=>$comment,
    //         "Gender"=>$gender
    //     );

    //     if(file_exists($datafile)){
    //         $existdata = file_get_contents($datafile);
    //         $tempdata = json_decode($existdata, true);
    //     } else {
    //         $tempdata = array();
    //     }

    //     if(!is_array($tempdata)){
    //         $tempdata = array();
    //     }

    //     $tempdata[] = $formdata;

    //     $jsondata = json_encode($tempdata, JSON_PRETTY_PRINT);
    //      if(file_put_contents($datafile,$jsondata)!==false)
    //                 {
    //                     echo "Data Saved Successfully <br>";
    //                 }
    //                 else{
    //                     echo "No Data Saved";
    //                 }
    //         $database = new db();
    //         $connection = $database->connection();
    //         $result = $database->signin($connection,"user", $userid, $name, $email, $website, $comment, $gender);
    //         if($result)
    //             {
    //                 Header("Location:../View/Dashboard.php ");
    //             }

       
    //         }
    //         else {  
    //             echo "Please Use the appropiate validation";
    //         }

    // if(isset($_SESSION["name"]) || isset($_COOKIE["name"]))
    // {
    //     echo "Welcome Back";
    // }
    // else{
    //     echo "Please log in agian!"; 
    // }

    }
?>