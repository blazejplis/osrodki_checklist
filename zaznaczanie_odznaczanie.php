<?php 
                      require_once "config.php";
                    
                    if(isset($_POST['send_checked_places'])) { 
                        $wybrana_miejscowosc = $_SESSION["selected_val"];   
                        
                        if(!empty($_POST['do_zmiany'])) {
                            $zaznaczone = implode("','", $_POST['do_zmiany']); 
                            $sql1 = "UPDATE $wybrana_miejscowosc SET selected='TAK' WHERE nazwa IN ('$zaznaczone')";
                            $stmt1 = mysqli_prepare($link,$sql1);
                            $stmt1->execute();       

                            $sql = "UPDATE $wybrana_miejscowosc SET selected=NULL WHERE nazwa NOT IN ('$zaznaczone')";
                            $stmt = mysqli_prepare($link,$sql);
                            $stmt->execute();             
                        }else {
                            
                            $sql2 = "UPDATE $wybrana_miejscowosc SET selected=NULL";
                            $stmt2 = mysqli_prepare($link,$sql2);
                            $stmt2->execute();
                            
                        }
                    }                   
                ?>