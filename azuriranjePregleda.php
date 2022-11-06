<?php

$konekcijaDB = new mysqli("localhost", "root", "", "med_tech") or die("Neuspešna konekcija sa bazom! - %s\n" . $konekcijaDB->error);

$ID = $_POST['ID'];
$datum = $_POST['datum'];
$lekar_id = $_POST['lekar_id'];
$pacijent_id = $_POST['pacijent_id'];

$upit = "UPDATE pregled SET datum='" . $datum . "', pacijent_id='" . $pacijent_id . "', lekar_id='" . $lekar_id . "' where pregled_id=" . $ID;

$konekcijaDB->query($upit);
