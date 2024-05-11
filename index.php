<?php
    session_start();       
    //$_SESSION["usernameLoggato"]="";

    if(!isset($_SESSION["primoAccesso"])){
        $_SESSION["usernameLoggato"]="";
        $_SESSION["primoAccesso"]=1;
        $_SESSION["loggato"]=0;
        $_SESSION["codiceSbagliato"]=0;
        $_SESSION["giaRegistrato"]=0;
        $_SESSION["loggato"]=0;
        $_SESSION["permessiAmministratore"]=0;

        echo"<html>
        <head>
        <link rel=\"stylesheet\" href=\"style.css\" type=\"text/css\">
        </head>
        <body>
            <header>
                <img src=\"img\OIG3-removebg-preview.png\" alt=\"\" id=\"logo\">
                <h1>Banca del tempo</h1>
            </header>
            <nav>
                <a href=\"index.php\" id=\"home\">Home</a>
                <a href=\"registrazioneform.php\">Registrazione</a>
                <a href=\"loginform.php\">Login</a>
            </nav>
            <div id=\"profilo\">
                <table>
                    <tr>
                        <td><img src=\"profilo.pn.png\" alt=\"\"></td>
                        <td style=\"border-radius: 0px;
                        background-color: #ded6ce;\"><p> Non loggato</p></td>
                    </tr>
                </table>
                
            </div>
            <div id=\"center\">
                <div style=\"margin: 50px 40px;box-shadow:5px 5px 10px 5px #D6CCC2;padding:10px; background-color:#EEEAE6; margin: auto auto;\">
                    <h2>Chi siamo</h2>
                    <p>La Banca del Tempo è un sistema organizzato di persone che si associano per scambiare servizi e/o saperi, attuando un aiuto reciproco.</p>
                    <p>Attraverso la Banca del Tempo le persone mettono a disposizione il proprio tempo per determinate prestazioni (effettuare una piccola riparazione in casa, preparare una torta, Conversare in lingua straniera, ecc.) aspettando di ricevere prestazioni da altri. </p>
                    <p>Chi dà un'ora del suo tempo a qualunque socio. riceve un'ora di tempo da chiunque faccia parte della Banca del Tempo.</p>
            
                </div>
            </div>
            <footer style=\"position: absolute; bottom:0; width:100%\">
                <p style=\"font-weight: 700;\">De Giorgi Mattia || Legittimo Tommaso || Ligori Giovanni || Paglialonga Mattia</p>
                <p>Anno scolastico: 2023/2024</p>
    
            </footer>
        </body>
    </html>";
    }elseif($_SESSION["primoAccesso"]==1){
        echo"<html>
                <head>
                <link rel=\"stylesheet\" href=\"style.css\" type=\"text/css\">
                </head>
                <body>
                    <header>
                        <img src=\"img\OIG3-removebg-preview.png\" alt=\"\" id=\"logo\">
                        <h1>Banca del tempo</h1>
                    </header>
                    <nav>
                        <a href=\"index.php\" id=\"home\">Home</a>
                        <a href=\"registrazioneform.php\">Registrazione</a>
                        <a href=\"loginform.php\">Login</a>
                    </nav>";
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
                    echo"
                    <div id=\"center\">
                        <div style=\"margin: 50px 40px;box-shadow:5px 5px 10px 5px #D6CCC2;padding:10px;background-color:#EEEAE6; margin: auto auto;\">
                        <h2>Chi siamo</h2>
                        <p>La Banca del Tempo è un sistema organizzato di persone che si associano per scambiare servizi e/o saperi, attuando un aiuto reciproco.</p>
                        <p>Attraverso la Banca del Tempo le persone mettono a disposizione il proprio tempo per determinate prestazioni (effettuare una piccola riparazione in casa, preparare una torta, Conversare in lingua straniera, ecc.) aspettando di ricevere prestazioni da altri. </p>
                        <p>Chi dà un'ora del suo tempo a qualunque socio. riceve un'ora di tempo da chiunque faccia parte della Banca del Tempo.</p>
            
                        </div>
                    </div>
                    <footer style=\"position: absolute; bottom:0; width:100%\">
                        <p style=\"font-weight: 700;\">De Giorgi Mattia || Legittimo Tommaso || Ligori Giovanni || Paglialonga Mattia</p>
                        <p>Anno scolastico: 2023/2024</p>
            
                    </footer>
                </body>
            </html>";
    }
    
?>



