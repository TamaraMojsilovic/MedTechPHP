<?php

$konekcijaDB = new mysqli("localhost", "root", "", "med_tech") or die("Neuspešna konekcija sa bazom! - %s\n" . $konekcijaDB->error);

$ID = $_POST['ID'];

$upit = "DELETE FROM pregled WHERE pregled_id=" . $ID;

return $konekcijaDB->query($upit);
