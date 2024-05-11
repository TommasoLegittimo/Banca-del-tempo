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
            <h2>Mansioni con relative ore</h2>
            <?php
                
                if($_SESSION["loggato"]==1){
                    $queryOrePrestazioni= "select mansioni.categoria, sum(prestazioni.numOre)
                    from mansioni inner join categoriaprestazioni  on mansioni.codiceMansione = categoriaprestazioni.codiceMansione inner join prestazioni on prestazioni.codicePrestazione = categoriaprestazioni.codicePrestazione
                    group by(mansioni.categoria)
                    order by(sum(prestazioni.numOre))desc;";

                    if($result = $conn -> query($queryOrePrestazioni)){
                        if($result ->num_rows>0 ){
                            while($row = $result->fetch_assoc()){
                                echo "<div class=\"contenitoreSociMansioni\">
                                    <p>" . $row["categoria"]. "</p>
                                    <p>" . $row["sum(prestazioni.numOre)"] ."</p>
                                        </div>";
                            }
                        }
                        else{
                            echo"Non sono state svolte prestazioni";
                        }
                    }
                }
                else{
                    header("Location: loginform.php");
                }
                
            ?>
        </div>
        <footer style="position: absolute; bottom:0; width:100%">
            <p style="font-weight: 700;">De Giorgi Mattia || Legittimo Tommaso || Ligori Giovanni || Paglialonga Mattia</p>
            <p>Anno scolastico: 2023/2024</p>

        </footer>
        
    </body>
</html>