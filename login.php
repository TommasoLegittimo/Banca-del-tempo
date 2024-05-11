<?php
    include 'connessioneDB.php';


    $passwordhash = hash('sha256', $_POST["password"]);
    //echo $passwordhash;
    $sql="select amministratore from soci where username =\"" . $_POST["username"] . "\" and password =\"" .$passwordhash . "\"";
    $result = $conn -> query($sql);
    echo $sql;
    if($result->num_rows > 0){
        echo "ciao";
        $_SESSION["usernameLoggato"]=$_POST["username"];
        $_SESSION["passwordLoggato"]=$_POST["password"];

        $row = $result->fetch_assoc();

        
        if($row["amministratore"]==1){
            $_SESSION["permessiAmministratore"]=1;
            $_SESSION["loggato"]=1;
            header("Location: amministratoreBenvenuto.php");
            
        }
        else if($_ROW["amministratore"]==0){
            $_SESSION["permessiAmministratore"]=0;

            $_SESSION["loggato"]=1;
            header("Location: sociobenvenuto.php");
        }
        
    }
    else{
        header("Location: loginform.php");
    } 

?>



