<?php

class Pacijent
{
    public $pacijent_id;
    public $ime;
    public $prezime;
    public $datum_rodjenja;
    public $broj_telefona;
    public $adresa;

    public function unesiPacijenta($pacijent)
    {
        $konekcijaDB = new mysqli("localhost", "root", "", "med_tech") or die("Neuspešna konekcija sa bazom! - %s\n" . $konekcijaDB->error);

        $upit = "INSERT INTO pacijent values (NULL, '$pacijent->ime', '$pacijent->prezime', '$pacijent->datum_rodjenja', '$pacijent->broj_telefona', '$pacijent->adresa')";

        return $konekcijaDB->query($upit);
    }
}
