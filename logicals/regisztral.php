<?php

if(isset($_POST['csnev']) &&
   isset($_POST['keresztnev']) &&
   isset($_POST['fn']) &&
   isset($_POST['pw'])) {
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=devdev', 'devdev', 'devdev' ,
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        
        $sqlSelect = "select id from felhasznalok where bejelentkezes = :bejelentkezes";
        $sth = $dbh->prepare($sqlSelect);
        $sth->bindParam(':bejelentkezes', $_POST['fn'], PDO::PARAM_STR) or die($sth->errorInfo());
        $sth->execute() or die($sth->errorInfo());
        $row = $sth->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $uzenet = "A felhasználói név már foglalt!";
            $ujra = true;
        }
        else {
            $sqlInsert = "insert into felhasznalok(id, csalad_nev, kereszt_nev, bejelentkezes, jelszo)
                          values(0, :csaladnev, :keresztnev, :bejelentkezes, sha1(:jelszo))";
            $stmt = $dbh->prepare($sqlInsert);
            
            $stmt->bindParam(':csaladnev', $_POST['csnev'], PDO::PARAM_STR) or die($sth->errorInfo()); 
            $stmt->bindParam(':keresztnev', $_POST['keresztnev'], PDO::PARAM_STR) or die($sth->errorInfo()); 
            $stmt->bindParam(':bejelentkezes', $_POST['fn'], PDO::PARAM_STR) or die($sth->errorInfo()); 
            $stmt->bindParam(':jelszo', $_POST['pw'], PDO::PARAM_STR) or die($sth->errorInfo()); 
            
            $stmt->execute() or die($sth->errorInfo()); 
            $count = $stmt->rowCount();
            if($count) {
                $uzenet = "A regisztráció sikerült.<br>Be tud jelentkezni.";                     
                $ujra = false;
            }
            else {
                $uzenet = "A regisztráció nem sikerült.";
                $ujra = true;
            }
        }
    }
    catch (PDOException $e) {
        $uzenet = "Hiba: ".$e->getMessage();
        $ujra = true;
    }      
}
else {
    header("Location: .");
}
?>


