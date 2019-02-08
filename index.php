<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="checkbox.css" >
<meta charset="UTF-8">
    <style>
        .form-group input[type="checkbox"] {
    display: none;
}

.form-group input[type="checkbox"] + .btn-group > label span {
    width: 20px;
}

.form-group input[type="checkbox"] + .btn-group > label span:first-child {
    display: none;
}
.form-group input[type="checkbox"] + .btn-group > label span:last-child {
    display: inline-block;   
}

.form-group input[type="checkbox"]:checked + .btn-group > label span:first-child {
    display: inline-block;
}
.form-group input[type="checkbox"]:checked + .btn-group > label span:last-child {
    display: none;   
}
.nazwa-uz{
  right: 0;
  top: 0;
  color: red;
}
    </style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<script>
$(document).ready(function() {
        $('#submit').click(function(e){
        e.preventDefault();
        var miejscowosc = $('#miejscowosc').val();
        var nazwa = $('#nazwa_nowego_osr').val();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "dodaj_nowy_osrodek.php",
            data: {nazwa_nowego_osr:nazwa, miejscowosc:miejscowosc},

        });
});
</script>
</head>
<body>
<div class="container">

    <div class="wrapper">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
            <div class="form-group">
            <h1 class="display-3">Dodaj ośrodek</h1>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" >
            <h3 class="display-2">Nazwa osrodka:</h3> <input type="text" class="form-control" id="nazwa_nowego_osr" name="nazwa_nowego_osr">
            <h3 class="display-4">Miejscowosc: </h3>
            <select type="text" class="form-control" name="miejscowosc" id="miejscowosc">
<option value="borowice">Borowice</option>
<option value="jelenia_gora">Jelenia Góra</option>
<option value="karpacz">Karpacz</option>
<option value="podgorzyn">Podgórzyn</option>
<option value="przesieka">Przesieka</option>
<option value="szklarska">Szklarska</option>
<option value="swieradow">Świeradów</option>
<option value="zachelmie">Zachełmie</option>
            </select>
            </div>
            <div class="form-group">
                <input type="submit" id="submit" name="save" class="btn btn-primary" value="Dodaj">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
                </form> 

            <?php
             require "dodaj_nowy_osrodek.php";
            ?>
            </div>
            <div class="col-sm-2"></div>
        </div>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
            <div class="form-group">
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <h1 class="display-3">Gdzie byłeś?</h1>
            <h3 class="display-4">Wybierz miejscowość </h3>
            <select type="text" class="form-control" name="miejscowosci">
<option value="borowice">Borowice</option>
<option value="jelenia_gora">Jelenia Góra</option>
<option value="karpacz">Karpacz</option>
<option value="podgorzyn">Podgórzyn</option>
<option value="przesieka">Przesieka</option>
<option value="szklarska">Szklarska</option>
<option value="swieradow">Świeradów</option>
<option value="zachelmie">Zachełmie</option>
            </select></div>
            <div class="form-group"><input type="submit" name="show_places" value="Pokaż ośrodki w wybranej miejscowości" class="btn btn-primary"></div></form>
            <ul class="list-group"><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"><div class="funkyradio">
            <?php
            require "pokaz_osrodki_w_wyb_miejscowosci.php";
            ?>
              </div>
                    <div class='form-group'>
                    <input type='submit' class='btn btn-primary' name='send_checked_places' value='Wyślij'>
                    <?php
                require "zaznaczanie_odznaczanie.php";
                    ?>
                                </div>
            </form>
            </ul>

            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
</div>
</body>


</html>