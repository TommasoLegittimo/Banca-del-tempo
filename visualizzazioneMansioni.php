<?php
    include 'connessioneDB.php';
    if($_SESSION["loggato"]==0){
        header("location: index.php");
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
        <div id="centerMansioni">
            <?php
                $ricercaProprieInformazioni = "select mappa, citta, zona from soci inner join iscrizioni on soci.codiceSocio = iscrizioni.codiceSocio inner join sedi on sedi.codiceSede = iscrizioni.codiceSede where username  =\"" . $_SESSION["usernameLoggato"]."\"";
                if($result= $conn -> query($ricercaProprieInformazioni)){
                    $row = $result ->fetch_assoc();
                    echo "<a href=\"" . $row["mappa"]. "\">Mappa zona</a><br><br>" ;
                    $_SESSION["citta"]= $row["citta"];
                    $_SESSION["zona"] = $row["zona"];
                    //echo $_SESSION["zona"];
                    $queryRicercaMansioni= "select nome, cognome, indirizzo, numTelefono from soci inner join possiedono on soci.codiceSocio = possiedono.codiceSocio inner join mansioni on mansioni.codiceMansione = possiedono.codiceMansione inner join iscrizioni on iscrizioni.codiceSocio = soci.codiceSocio inner join sedi on sedi.codiceSede = iscrizioni.codiceSede where categoria = \"". $_POST["categoria"]."\" and citta= \"".$_SESSION["citta"]."\" and zona= \"".$_SESSION["zona"]."\"";
                    //echo $queryRicercaMansioni;
                    $result = $conn -> query($queryRicercaMansioni);
                    if($result -> num_rows > 0){
                        
                        while($row = $result -> fetch_assoc()){
                            echo "<div class=\"contenitoreSociMansioni\" >
                            <p>" . $row["nome"]. "</p>
                            <p>" . $row["cognome"] ."</p>
                            <p>" . $row["indirizzo"] ."</p>
                            <p>" .$row["numTelefono"] ."</p>
                            </div>";
                        }
                    }
                    else{
                        echo "Soci non trovati";
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
