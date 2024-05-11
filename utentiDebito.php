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
        <h2>Utenti che hanno un debito</h2>
            <div id="centerUtentiDebito">
                <?php
                    if($_SESSION["loggato"]==1){
                            $QueryUtentiDebito = "select * from soci where orePrestate < oreRicevute";
                            $result = $conn -> query($QueryUtentiDebito);
                            if($result -> num_rows > 0){
                                while($row = $result -> fetch_assoc()){
                                    echo "<div class=\"contenitoreDebitore\" >
                                    <p>" . $row["nome"]. "</p>
                                    <p>" . $row["cognome"] ."</p>
                                    <p>" .$row["numTelefono"] ."</p>
                                    </div>";
                                }
                            }
                        }  
                    
                ?>
            </div>
        </div>
        <footer style="position: relative; bottom:0; width:100%\">
                        <p style="font-weight: 700;">De Giorgi Mattia || Legittimo Tommaso || Ligori Giovanni || Paglialonga Mattia</p>
                        <p>Anno scolastico: 2023/2024</p>
            
                    </footer>
        
    </body>
</html>

