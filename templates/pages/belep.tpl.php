<?php if(isset($row)) { ?>
    <?php if($row) { ?>
        <h1>Sikeresen bejelentkezett.</h1>
    <?php } else { ?>
        <h1>Hibás jelszó vagy felhasználónév, próbálkozzon újra!</h1>
        <a href="?oldal=belepes" >Próbálja újra!</a>
    <?php } ?>
<?php } ?>
<?php if(isset($errormessage)) { ?>
    <h2><?= $errormessage ?></h2>
<?php } ?>
