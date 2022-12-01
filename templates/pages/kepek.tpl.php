<?php
$uzenet = array();   

if (isset($_POST['kuld'])) {
    foreach($_FILES as $fajl) {
        if ($fajl['error'] == 4);   
        elseif (!in_array($fajl['type'], $MEDIATIPUSOK))
            $uzenet[] = " Nem megfelelő típus: " . $fajl['name'];
        elseif ($fajl['error'] == 1   
                    or $fajl['error'] == 2   
                    or $fajl['size'] > $MAXMERET) 
            $uzenet[] = " Túl nagy állomány: " . $fajl['name'];
        else {
            $vegsohely = $MAPPA.strtolower($fajl['name']);
            if (file_exists($vegsohely))
                $uzenet[] = " Már létezik: " . $fajl['name'];
            else {
                move_uploaded_file($fajl['tmp_name'], $vegsohely);
                $uzenet[] = ' Ok: ' . $fajl['name'];
            }
        }
    }        
}
?>
<?php   
include('config.inc.php');

    $kepek = array();
    $olvaso = opendir($MAPPA);
    while (($fajl = readdir($olvaso)) !== false)
        if (is_file($MAPPA.$fajl)) {
            $vege = strtolower(substr($fajl, strlen($fajl)-4));
            if (in_array($vege, $TIPUSOK))
                $kepek[$fajl] = filemtime($MAPPA.$fajl);            
        }
    closedir($olvaso);
?>
<div id="fogaleria">
    <h1 class="galeria">Képek</h1>
    <hr>
    <?php
    arsort($kepek);
    foreach($kepek as $fajl => $datum)
    {
    ?>
        <div id="kep">
            <a href="<?php echo $MAPPA.$fajl ?>">
                <img src="<?php echo $MAPPA.$fajl ?>">
            </a>            
        </div>
<?php
    }
    ?>
</div>
<?php
    if (!empty($uzenet))
    {
        echo '<ul>';
        foreach($uzenet as $u)
            echo "<li>$u</li>";
        echo '</ul>';
    }
?>
<form action="?oldal=kepek" method="post"
                enctype="multipart/form-data">
        <label>Tallózza a fájlt:
            <input type="file" name="elso" required>
        </label>     
        <input type="submit" name="kuld">
</form>    
