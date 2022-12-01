<?php session_start(); ?>
<?php if(file_exists('./logicals/'.$keres['fajl'].'.php')) { include("./logicals/{$keres['fajl']}.php"); } ?>
<!DOCTYPE html>
<html lang="hu">
<head>
<meta charset="utf-8">
<title><?=  $ceg ?></title>
	<link rel="stylesheet" href="./styles/index.css" type="text/css">
	<?php if(file_exists('./styles/'.$keres['fajl'].'.css')) { ?><link rel="stylesheet" href="./styles/<?= $keres['fajl']?>.css" type="text/css"><?php } ?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title><?=  $ceg . $csnev . $unev?></title>

	
</head>
<body>

<div class="jumbotron text-left" style="margin-bottom:0">
        <h1><?= $fejlec['ceg'] ?></h1>
        <img src="./images/<?=$fejlec['kep']?>" alt="<?=$fejlec['kepalt']?>">
        <br>
        <p><?php if(isset($_SESSION['login'])) { ?><p class="bejelentkezett">Bejelentkezve mint: <strong><?= $_SESSION['csnev']." ".$_SESSION['unev']." (".$_SESSION['login'].")" ?></strong></p><?php } ?></p>


    </div>
	<nav class="navbar navbar-expand-sm bg-light navbar-light" div="valami">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="nav navbar-nav">
	  <?php foreach ($oldalak as $url => $oldal) { ?>
						<?php if(! isset($_SESSION['login']) && $oldal['menun'][0] || isset($_SESSION['login']) && $oldal['menun'][1]) { ?>
							<li<?= (($oldal == $keres) ? ' class="active"' : '') ?>>
							<a href="<?= ($url == '/') ? '.' : ('?oldal=' . $url) ?>">
							<?= $oldal['szoveg'] ?></a>
							</li>
						<?php } ?>
					<?php } ?>
      </ul>
      
    </div>
</nav>
  
<div class="container" style="margin-top:50px">
        <div class="row">
	<?php include("./templates/pages/{$keres['fajl']}.tpl.php"); ?>
      <hr>
      
    </div>
    
</div>

<footer class="jumbotron text-left" style="margin-bottom:10px">
        <?= $lablec['copyright']?>
        <?= " " . $lablec['ceg'] . " minden jog fenntartva." ?>
</footer>

</body>
</html>
