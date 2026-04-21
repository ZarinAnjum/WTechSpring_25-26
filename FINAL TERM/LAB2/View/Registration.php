<?php
include "../controller/RegistrationValidation.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Registration Log In Form</title>
    </head>
    <body>
        
        <form method="post" action="../view/welcome.php" target="_blank">
            <table>
                <tr>
                    <td><p style = 'color: red '> * required field </p></td><br>
                </tr>
                <tr>
                    <td> <label for ="Name"> Name: </label></td>
                    <td> <input type ="text" id = "name" name = "name"></td>
                    <td> <p style = 'color: red'>*</p> </td>
                </tr>
                <tr>
                    <td> <label for ="email"> E-mail: </label></td>
                    <td> <input type = "email" id="email" name ="email"></td>
                    <td> <p style = 'color: red'>*</p> </td>
                </tr>
                <tr>
                    <td> <label for ="website"> Website: </label></td>
                    <td> <input type = "url" id="website" name ="website"></td>
                    <td> <p style = 'color: red'>*</p> </td>
                </tr>
                <tr>
                    <td> <label for ="comment"> Comment: </label></td>
                     <td><textarea name="comment" id="comment"></textarea></td>
                    <td> <p style = 'color: red'>*</p> </td>
                </tr>    
                

            <tr>
                <td><label for ="gender"> Gender: </label></td>
                <td><input type = "radio" id = "male" name = "gender" value="male">
                <label for ="male"> Male </label>
                <input type = "radio" id = "female" name = "gender" value="female">
                <label for ="female"> Female </label>
                <input type = "radio" id = "other" name = "gender" value="other">
                <label for ="other"> Other </label>
            </td>
            <td> <p style = 'color: red'>*</p> </td>
            </tr>
            <tr>
                <td><input type = "submit" id = "submit" name = "submit" </td>
                </tr>
            </table>
        </form>
    </body>
</html>