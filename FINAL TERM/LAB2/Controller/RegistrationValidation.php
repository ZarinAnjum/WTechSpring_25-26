

<?php 
session_start();
$name = "";
$email = "";
$website = "";
$comment = "";
$gender = "";
$datafile ="../data.json";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name = $_POST["name"];
    $email = $_POST["email"];
    $website = $_POST["website"];
    $comment = $_POST["comment"];

    // use isset for radio button
    if(isset($_POST["gender"]))
    {
        $gender = $_POST["gender"];
    }

    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $website = $_REQUEST["website"];
    $comment = $_REQUEST["comment"];

    if(isset($_REQUEST["gender"]))
    {
        $gender = $_REQUEST["gender"];
    }

    $formdata = array("Name"=>$name, "Email"=>$email, "Website"=>$website, "Comment"=>$comment, "Gender"=>$gender);

    if(file_exists($datafile))
                    {
                        $existdata = file_get_contents($datafile);
                        $tempdata = json_decode($existdata, true);
                    }
                    else{
                        $tempdata = array();
                    }

                    if(!is_array($tempdata))
                        {
                            $tempdata = array(); 
                        }
                    $tempdata [] = $formdata;
                    $jsondata = json_encode($tempdata, JSON_PRETTY_PRINT);
                if(file_put_contents($datafile,$jsondata)!== false)
                    {
                        echo "Data Saved";
                    }
                    else{
                        echo "Please Try Again";
                    }
                $data = file_get_contents($datafile);
                $mydata = json_decode($data);
            }
            else{
                echo "Please try again!";
            }
    
    if(!empty($name) && strlen($name)>=5)
    {
        echo "User Name: ".$name."<br>";
    }
    else
    {
        echo "UserName must be greater than 5 char<br>";
    }

    if(!empty($email) && preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email))
    {
        echo "Email: ".$email."<br>";
    }
    else
    {
        echo "Invalid Email<br>";
    }

if(!empty($website) && preg_match("/^(https?:\/\/)?[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $website))
{
    echo "Website: ".$website."<br>";
}
else
{
    echo "Invalid Website URL<br>";
}

    if(!empty($comment))
    {
        echo "Comment: ".$comment."<br>";
    }
    else
    {
        echo "Comment cannot be empty<br>";
    }

    
    if(isset($gender) && !empty($gender))
    {
        echo "Gender: ".$gender."<br>";
    }
    else
    {
        echo "Please select a gender<br>";
    }
if(isset($_SESSION["name"]) || isset($_COOKIE["name"]))
    {
        echo "Welcome Back";
    }
    else{
        echo "Please log in agian!"; 
    }

?>

