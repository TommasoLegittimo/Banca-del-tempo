<?php
    include 'connessioneDB.php';

    $_SESSION["CodiceSbagliato"]=0;

    if($conn-> connect_errno){
        echo "errore" . $conn->connect_error . "\n";
    }
    else{
        $queryUnivocita = "select * from soci where username =\"" . $_POST["username"]. "\"";
        $result = $conn ->query($queryUnivocita);
        if($result->num_rows > 0){
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["giaRegistrato"] = 1;
            header("Location: loginform.php");
        }
        
        else{
            if($_POST["amministratore"]=="no"){
                $passwordhash = hash('sha256', $_POST["password"]);
                $queryregistrazione = "insert into soci (numTelefono, nome, cognome, indirizzo, password, username, amministratore) values (\"" . $_POST["numTelefono"] . "\",\"" . $_POST["nome"] . "\",\"" . $_POST["cognome"] . "\",\"" . $_POST["indirizzo"] . "\",\"" . $passwordhash . "\",\"" . $_POST["username"] . "\",\"" . "0"."\")";
                //echo $queryregistrazione;
                if($conn -> query($queryregistrazione)!=true){
                    header("Location: registrazioneForm.php");
                }
                else{
                    $_SESSION["usernameLoggato"] = $_POST["username"];
                    $_SESSION["permessiAmministratore"] = 0;
                    $_SESSION["loggato"]=1;
                    header("Location: sociobenvenuto.php");
                    
                }
            }
            else{
                $codiceHash = hash('sha256', $_POST["codice"]);
                $confrontoCodice = "select codiceAmministratore from codici where codiceAmministratore = \"" .$codiceHash. "\"";
                $result = $conn -> query($confrontoCodice);
                if($result -> num_rows > 0){
                    $passwordhash = hash('sha256', $_POST["password"]);
                    $queryregistrazione = "insert into soci (numTelefono, nome, cognome, indirizzo, password, username, amministratore) values (\"" . $_POST["numTelefono"] . "\",\"" . $_POST["nome"] . "\",\"" . $_POST["cognome"] . "\",\"" . $_POST["indirizzo"] . "\",\"" . $passwordhash . "\",\"" . $_POST["username"] . "\",\"" . "0"."\")";
                    echo $queryregistrazione;
                    if($conn -> query($queryregistrazione)){
                        $_SESSION["permessiAmministratore"]=1;
                        $_SESSION["usernameLoggato"]=$_POST["username"];
                        $_SESSION["loggato"]=1;
                        header("Location: amministratoreBenvenuto.php");
                    }
                    else{
                        echo $conn ->error;
                    } 
                }
                else{
                    $_SESSION["codiceSbagliato"]=1;
                    $_SESSION["username"] = $_POST["username"];
                    $_SESSION["password"] = $_POST["password"];
                    $_SESSION["numTelefono"] = $_POST["numTelefono"];
                    $_SESSION["amministratore"] = "no";
                    $_SESSION["nome"] = $_POST["nome"];
                    $_SESSION["cognome"] = $_POST["cognome"];
                    $_SESSION["indirizzo"] = $_POST["indirizzo"];

                    header("Location: registrazioneform.php");

                }
            }
        }
    }
        





?>