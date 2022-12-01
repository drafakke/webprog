<?php
if(isset($_POST['felhasznalo']) && isset($_POST['jelszo'])) {
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=devdev', 'devdev', 'devdev',
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        // $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
        
        $sqlSelect = "select id, csalad_nev, kereszt_nev from felhasznalok where bejelentkezes = :bejelentkezes and jelszo = sha1(:jelszo)";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute(array(':bejelentkezes' => $_POST['felhasznalo'], ':jelszo' => $_POST['jelszo']));
        $row = $sth->fetch(PDO::FETCH_ASSOC) or die($sth->errorInfo());
        if($row) {
            $_SESSION['csnev'] = $row['csalad_nev'];
            $_SESSION['knev'] = $row['kereszt_nev'];
            $_SESSION['login'] = $_POST['felhasznalo'];
        }
    }
    catch (PDOException $e) {
        $errormessage = "Hiba: ".$e->getMessage();
    }      
}
else {
    header("Location: .");
}
?>
