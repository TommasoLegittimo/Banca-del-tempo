<?php
    include 'connessioneDB.php';
    if($_SESSION["loggato"]==0){
        header("Location: index.php");
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
                $queryUtentiSegreteria = "select soci.codiceSocio, soci.username from possiedono inner join soci on soci.codiceSocio = possiedono.codiceSocio inner join mansioni on mansioni.codiceMansione= possiedono.codiceMansione where categoria=\"Segreteria\"";
                if($result = $conn -> query($queryUtentiSegreteria)){
                    while($row = $result -> fetch_assoc()){
                        $queryUtentiDiverseMansioni = "select count(possiedono.codiceMansione) as numeroMansione, soci.nome, soci.cognome, soci.indirizzo, soci.numTelefono
                        from possiedono inner join soci on possiedono.codiceSocio= soci.codiceSocio
                        where username =\"" . $row["username"] . "\"
                        having numeroMansione >1";
                        if($result2 = $conn -> query($queryUtentiDiverseMansioni)){
                            $row2 = $result2 ->fetch_assoc();
                            echo "<div class=\"contenitoreSociMansioni\" >
                                <p>" . $row2["nome"]. "</p>
                                <p>" . $row2["cognome"] ."</p>
                                <p>" . $row2["indirizzo"] ."</p>
                                <p>" .$row2["numTelefono"] ."</p>
                                </div>";
                        }
                    }
                }

                
            ?>
        </div>
        <footer style="position: relative; bottom:0; width:100%">
            <p style="font-weight: 700;">De Giorgi Mattia || Legittimo Tommaso || Ligori Giovanni || Paglialonga Mattia</p>
            <p>Anno scolastico: 2023/2024</p>
            
        </footer>

    </body>
</html>


