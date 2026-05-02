

<?php
class db {

    function connection()
    {
        $db_host = "localhost";
        $db_user = "root";
        $db_password = "";
        $db_name = "section_r";  
        //$connection=""; 

        $connection = new mysqli($db_host, $db_user, $db_password, $db_name);

        if ($connection->connect_error) {
            die("Please connect the database ".$connection->connect_error);
        }
        else {
             echo "Database Connection Successful";
        }
       

        return $connection;
    }

    function signup($connection, $tablename,$userid, $name, $email, $website, $comment, $gender)
    {
        $sql = "INSERT INTO ".$tablename." (userid, name, email, website, comment, gender)
                VALUES ('".$userid."', '".$name."', '".$email."', '".$website."', '".$comment."', '".$gender."')";

        $result = $connection->query($sql);
        return $result;
    }

    function signin($connection, $tablename, $userid, $name, $email, $website, $comment, $gender)
    {
        $sql = "SELECT * FROM ".$tablename." WHERE userid = '".$userid."' AND name = '".$name."' AND email = '".$email."' AND website = '".$website."' AND comment = '".$comment."' AND gender = '".$gender."'";
        $result = $connection->query($sql);
        return $result;
    }
}

?>