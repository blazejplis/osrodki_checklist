            <?php
            require_once "config.php";
            if(isset($_POST['show_places'])){
            $selected_val = $_POST['miejscowosci'];
            $_SESSION["selected_val"] = $selected_val; 
            $ask = "SELECT * FROM $selected_val";
            $osrodki = mysqli_query($link,$ask);
                while($wynik = mysqli_fetch_array($osrodki)){
                    echo "<div class='funkyradio-success'><input type='checkbox' id='".$wynik['nazwa']."' name='do_zmiany[]' value=".$wynik['nazwa']." ".($wynik['selected']==NULL ? "" : "checked")." /><label for='".$wynik['nazwa']."'>".$wynik['nazwa']."</label></div>";
                }
            }  ?> 