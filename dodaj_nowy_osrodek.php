<?php

            require_once "config.php";
if(isset($_POST['save'])){
            if(!empty($_POST['nazwa_nowego_osr'])){
            $wybrana = $_POST['miejscowosc'];
            $sql = "INSERT INTO $wybrana(nazwa) VALUES (?)";
            $stmt = mysqli_prepare($link,$sql);
            $stmt->bind_param("s",$_POST['nazwa_nowego_osr']);
            $stmt->execute();
            echo "  <div class='alert alert-success'>
            <strong>Udało się!</strong> Pomyślnie dodano nowy ośrodek do bazy
          </div>";
          }
            else{
              echo "  <div class='alert alert-danger'>
              <strong>Robisz coś źle!</strong> Próbujesz dodać ośrodek bez nazwy
            </div>";
            }
          }


           

?>
            
            
            
        
         
        
   