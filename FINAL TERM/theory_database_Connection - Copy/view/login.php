<!DOCTYPE html>
<html>
    <body>
        <form method ='post' action ="../Controller/LogInvalidation.php">
            <?php
            echo "<h1 style='color: red'>LogIn Page</h1>";
            ?>
            <table>
                <tr>
                    <td> User Id: </td>
                    <td> <input type="text" name = "userid"/></td>
                </tr>
                <tr>
                    <td> Name: </td>
                    <td> <input type="text" name = "name"/></td>
                </tr>
                <tr>
                    <td> Email: </td>
                    <td > <input type ="email" name ="email"> </td>
                </tr>
                <tr>
                    <td> Website: </td>
                    <td > <input type ="url" name ="website"> </td>
                </tr>
                <tr>
                    <td> Comment: </td>
                    <td > <textarea name ="comment"></textarea> </td>
                </tr>
                <tr>
                    <td><label for="gender">Gender:</label></td>
                    <td>
                        <input type="radio" id="male" name="gender" value="male">
                        <label for="male">Male</label>

                        <input type="radio" id="female" name="gender" value="female">
                        <label for="female">Female</label>

                        <input type="radio" id="other" name="gender" value="other">
                        <label for="other">Other</label>
                    </td>
                </tr>
                <tr>
                    <td> </td>
                    <td>
                        <input type ="submit"/>
                    </td>
                </tr>
            </table>
        </form>
        
    </body>
</html>