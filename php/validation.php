    <?php
        $username = " ";$password = " ";$passwordError = "Password Required"; $userError = " ";
        $counter = 0;

        if($_SERVER["REQUEST_METHOD"]=="POST"){
           if(empty($_POST["username"])){
                $userError = "username Required!";
           }else{
                $username=$_POST["username"];
           }
           if(empty($_POST["password"])){
                $passwordError="password is required";
           }else{
                $password=$_POST["password"];
           }
        }

        if($username!="" && $password!=""){
            $dbc  = mysqli_connect('localhost','n01403697','Toronto2019','user_credientials');
            $sql = "SELECT * FROM user_info WHERE username ='$username';";
            $result = mysqli_Query($dbc,$sql) or die ("Error while querying");
            $numRows = mysqli_num_rows($result);

            if($numRows>0){
                $row = mysqli_fetch_array($result);
                $confirmation = $row["password"];

                if($password==$confirmation){
                    mysqli_close($dbc);
                    include('../pages/LoginSuccess.html');
                }else{
                    $error_message = "nice try";
                    mysqli_close($dbc);
                    include('../pages/Login.php');
                }
            }else{
                mysqli_close($dbc);
                $userError = "Username doesn't exist";
                include('../pages/Login.php');
            }
        }else{
            mysqli_close($dbc);
            include('../pages/Login.php'); 
        }
    ?>