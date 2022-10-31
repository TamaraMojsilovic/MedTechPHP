<?php

$konekcijaDB = new mysqli("localhost", "root", "", "med_tech") or die("Neuspešna konekcija sa bazom! - %s\n" . $konekcijaDB->error);

$ID = $_POST['ID'];
$upit = "SELECT * FROM pregled WHERE pregled_id=" . $ID;

$pregled = mysqli_fetch_assoc($konekcijaDB->query($upit));

echo json_encode($pregled);
