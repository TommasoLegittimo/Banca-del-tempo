<?php
    include 'connessioneDB.php';
    if($_SESSION["permessiAmministratore"]==0){
        if($_SESSION["loggato"]==1){
            header("Location: socioBenvenuto.php");
        }
        else{
            header("Location: index.php");
        }
    }
    
?>
<html>
    <head>
    <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <img src="img\OIG3-removebg-preview.png" alt="" id="logo">
            <h1>Banca del tempo</h1>
        </header>
        <nav>
            <a href="index.php" id="home">Home</a>
            <a href="registrazioneform.php">Registrazione</a>
            <a href="loginform.php">Login</a>
        </nav>
        <a href=
            <?php
                if($_SESSION["permessiAmministratore"]==1){
                    echo"\"amministratoreBenvenuto.php\"";
                }
                else{
                    echo"\"socioBenvenuto.php\"";
                }
            ?>>
            <div id="tornaMenu">
                Torna al menu
            </div>
        </a>      
	        <?php
            if($_SESSION["loggato"]==0){
                echo"<div id=\"profilo\">
                        <table>
                            <tr>
                                <td id=\"TDTable\"><img src=\"profilo.pn.png\" alt=\"\"></td>
                                <td><p>non loggato</p></td>
                            </tr>
                        </table>
                        
                    </div>";
            }
            else{
                echo"<div id=\"profilo\">
                        <table>
                            <tr>
                                <td><img src=\"profilo.pn.png\" alt=\"\"></td>
                                <th>"
                                    .$_SESSION["usernameLoggato"]."
                                    <a href=\"logout.php\"><p id=\"disconnettiti\">Disconnettiti</p></a>
                                </th>
                            </tr>
                        </table>
                        
                    </div>";
            }	
        ?>
        <div id="center">
            <?php
                if($_SESSION["statoInserimentoCodiceCambioOre"]==0){
                    echo "<h3>Inserire lo username dell'utente desiderato</h3>";
                    echo "<form action=\"" . $_SERVER['PHP_SELF'] . "\"method=\"post\">
                    <label for=\"usernameCambioOre\">username</label>
                    <input type=\"text\" name=\"usernameCambioOre\" id=\"\"><br>
                    <input type=\"submit\" value=\"invia\">
                    </form>";
                    $_SESSION["statoInserimentoCodiceCambioOre"]=1;
                    //echo $_SESSION["statoInserimentoCodiceCambioOre"];
                }
                
                else{
                    if($_SESSION["statoInserimentoCodiceCambioOre"]==1){

                        $queryControlloUtenteCambioOre = "select * from soci where username =\"". $_POST["usernameCambioOre"]."\"";

                        $result = $conn -> query($queryControlloUtenteCambioOre);
                        if($result -> num_rows > 0){
                            $row = $result -> fetch_assoc();
                            $_SESSION["usernameCambioOre"]= $row["username"];
                            $_SESSION["orePrestate"]= $row["orePrestate"];
                            $_SESSION["oreRicevute"]= $row["oreRicevute"];
                            $_SESSION["statoInserimentoCodice"]=1;


                            echo "<form action=\"" . $_SERVER['PHP_SELF'] . "\"method=\"post\">
                            <h2>" .$_SESSION["usernameCambioOre"] . " </h2><br>
                            <label for=\"usernameCambioOre\">ore prestate</label>

                            <input type=\"text\" name=\"orePrestate\" id=\"\" value=\"" . $_SESSION["orePrestate"] . "\"><br>
                            <label for=\"usernameCambioOre\">ore ricevute</label>

                            <input type=\"text\" name=\"oreRicevute\" id=\"\" value=\"" . $_SESSION["oreRicevute"] . "\"><br>
                            <input type=\"submit\" value=\"invia\">
                            </form>";
                            $_SESSION["statoInserimentoCodiceCambioOre"]=2;
                        }
                        else{
                            $_SESSION["messaggioUtente"]="utente non trovato";
                            //echo "c";
                            $_SESSION["statoInserimentoCodiceCambioOre"]=0;
                            header("Location: cambioOre.php");
                        }

                    }
                    else{
                        $queryAggiornamentoOre= "update soci set orePrestate = " .$_POST["orePrestate"] . " ,oreRicevute = " .$_POST["oreRicevute"] . " where username = \"" . $_SESSION["usernameCambioOre"] . "\"";
                        echo $queryAggiornamentoOre;
                        if($conn->query($queryAggiornamentoOre)!=true){
                            echo $conn->error;
                        }
                        else{
                            header("Location: amministratoreBenvenuto.php");
                        }
                    }
                }  
            ?>
        </div>
        <footer style="position: absolute; bottom:0; width:100%">
            <p style="font-weight: 700;">De Giorgi Mattia || Legittimo Tommaso || Ligori Giovanni || Paglialonga Mattia</p>
            <p>Anno scolastico: 2023/2024</p>
            
        </footer>
    </body>
</html>

