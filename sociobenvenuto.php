<?php
    session_start();
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

        <div id="center" style="padding-bottom: 40px">
            <h2>Operazioni disponibili</h2>
            <a style="display: inline-block; padding: 10px; border: 1px solid #D6CCC2; margin:1%; background-color: #EEEAE6; color: #07143F;" href="RicercaMansioni.php">Ricerca Mansioni</a>
            <a style="display: inline-block; padding: 10px; border: 1px solid #D6CCC2; margin:1%; background-color: #EEEAE6; color: #07143F;" href="utentiDebito.php">utenti con debito</a>
            <a style="display: inline-block; padding: 10px; border: 1px solid #D6CCC2; margin:1%; background-color: #EEEAE6; color: #07143F;" href="orePrestazioni.php">ore prestazioni</a>
            <a style="display: inline-block; padding: 10px; border: 1px solid #D6CCC2; margin:1%; background-color: #EEEAE6; color: #07143F;" href="visualizzazioneSegreteriaEAltre.php" class="linkOpzione">Ricerca Segreteria</a>

        </div>
        
        <footer style="position: absolute; bottom:0; width:100%">
            <p style="font-weight: 700;">De Giorgi Mattia || Legittimo Tommaso || Ligori Giovanni || Paglialonga Mattia</p>
            <p>Anno scolastico: 2023/2024</p>
            
        </footer>
    </body>
</html>