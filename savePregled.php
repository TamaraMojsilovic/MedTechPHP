<?php

$datum = $_POST['datum'];
$pacijent = $_POST['pacijent'];
$lekar = $_POST['lekar'];


$konekcijaDB = new mysqli("localhost", "root", "", "med_tech") or die("Neuspešna konekcija sa bazom! - %s\n" . $konekcijaDB->error);

$upit = "INSERT INTO pregled VALUES (NULL, '$datum', '$pacijent', '$lekar')";

return $konekcijaDB->query($upit);
