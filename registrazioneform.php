
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
        <div id="center">
        <?php
        session_start();

        if($_SESSION["codiceSbagliato"] == 1){
            echo "Codice sbagliato";
            echo "<form action=\"registrazione.php\" method=\"post\">
                <table style=\"box-shadow:5px 5px 10px 5px #D6CCC2;padding:10px;border: 2px solid #D6CCC2;background-color:#EEEAE6; margin: auto auto; text-align:right;\">
                    <tr>
                        <td>
                            <label for=\"username\" >username</label>
                        </td>
                        <td>
                        <input type=\"text\" name=\"username\" id=\"\" value=\"" . $_SESSION["username"]. "\"><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for=\"password\">password</label>
                        </td>
                        <td>
                            <input type=\"password\" name=\"password\" id=\"\" value=\"" . $_SESSION["password"]. "\"><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for=\"nome\">nome</label>
                        </td>
                        <td>
                            <input type=\"text\" name=\"nome\" id=\"\" value=\"" . $_SESSION["nome"]. "\"><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for=\"cognome\">cognome</label>
                        </td>
                        <td>
                            <input type=\"text\" name=\"cognome\" id=\"\" value=\"" . $_SESSION["cognome"]. "\"><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for=\"numTelefono\">numero di telefono</label>
                        </td>
                        <td>
                            <input type=\"text\" name=\"numTelefono\" id=\"\" value=\"" . $_SESSION["numTelefono"]. "\"><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for=\"indirizzo\">indirizzo</label>
                        </td>
                        <td>
                            <input type=\"text\" name=\"indirizzo\" id=\"\" value=\"" . $_SESSION["indirizzo"]. "\"><br>
                        </td>
                    </tr>
                    <tr>
                    <td>
                    <label for=\"amministratore\">amministratore?    </label>
                    </td>
                    <td>
                    <label for=\"si\">si</label>

                    <input type=\"radio\" name=\"amministratore\" id=\"\" value=\"si\">
                    <label for=\"no\">no</label>
                    <input type=\"radio\" name=\"amministratore\" id=\"\" value=\"no\"><br>
                    </td>
                    </tr>
                    <tr>
                        <td>
                            <label for=\"codice\">codice</label>
                        </td>
                        <td>
                            <input type=\"text\" name=\"codice\" id=\"\"><br>
                        </td>
                    </tr>

                </table>
                <input type=\"submit\" value =\"invia\" style=\"margin-top:15px\">
            </form>";
        }
        else{
            echo "<h1>Registrazione</h1>";
            echo "<form action=\"registrazione.php\" method=\"post\">
                <table style=\"box-shadow:5px 5px 10px 5px #D6CCC2;padding:10px;border: 2px solid #D6CCC2;background-color:#EEEAE6; margin: auto auto; text-align:right;\">
                    <tr>
                        <td>
                            <label for=\"username\">username</label>
                        </td>
                        <td>
                        <input type=\"text\" name=\"username\" id=\"\"><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for=\"password\">password</label>
                        </td>
                        <td>
                            <input type=\"password\" name=\"password\" id=\"\"><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for=\"nome\">nome</label>
                        </td>
                        <td>
                            <input type=\"text\" name=\"nome\" id=\"\"><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for=\"cognome\">cognome</label>
                        </td>
                        <td>
                            <input type=\"text\" name=\"cognome\" id=\"\"><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for=\"numTelefono\">numero di telefono</label>
                        </td>
                        <td>
                            <input type=\"text\" name=\"numTelefono\" id=\"\"><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for=\"indirizzo\">indirizzo</label>
                        </td>
                        <td>
                            <input type=\"text\" name=\"indirizzo\" id=\"\"><br>
                        </td>
                    </tr>
                    <tr>
                    <td>
                    <label for=\"amministratore\">amministratore?    </label>
                    </td>
                    <td>
                    <label for=\"si\">si</label>

                    <input type=\"radio\" name=\"amministratore\" id=\"\" value=\"si\">
                    <label for=\"no\">no</label>
                    <input type=\"radio\" name=\"amministratore\" id=\"\" value=\"no\"><br>
                    </td>
                    </tr>
                    <tr>
                        <td>
                            <label for=\"codice\">codice</label>
                        </td>
                        <td>
                            <input type=\"text\" name=\"codice\" id=\"\"><br>
                        </td>
                    </tr>

                </table>
                <input type=\"submit\" value =\"invia\" style=\"margin-top:15px\">
            </form>";
        }
    ?>
        </div>
        <footer style="position: absolute; bottom:0; width:100%">
                <p style="font-weight: 700;">De Giorgi Mattia || Legittimo Tommaso || Ligori Giovanni || Paglialonga Mattia</p>
                <p>Anno scolastico: 2023/2024</p>
    
            </footer>
    </body>
</html>

