    <form method="get" class="text-center" id="n-pregled-frm">

        <div class="mb-3">
            <label>Datum</label>
            <input type="text" class="form-control" name="datum">
        </div>

        <div class="mb-3">
            <label>Pacijent</label>
            <select class="form-select" name="pacijent">
                <?php

                $konekcijaDB = new mysqli("localhost", "root", "", "med_tech") or die("Neuspešna konekcija sa bazom! - %s\n" . $konekcijaDB->error);
                $upit = "SELECT pacijent_id, ime, prezime FROM pacijent";

                $pacijenti = $konekcijaDB->query($upit);

                while ($p = mysqli_fetch_assoc($pacijenti)) :
                ?>
                    <option class="text-center" value="<?php echo $p['pacijent_id']; ?>">
                        <?php echo $p['ime'] . " " . $p['prezime']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Lekar</label>
            <select class="form-select" name="lekar">
                <?php

                $upit2 = "SELECT lekar_id, ime, prezime, specijalizacija FROM lekar";

                $lekari = $konekcijaDB->query($upit2);

                while ($l = mysqli_fetch_assoc($lekari)) :
                ?>
                    <option class="text-center" value="<?php echo $l['lekar_id']; ?>">
                        <?php echo $l['ime'] . " " . $l['prezime'] . " - " . $l['specijalizacija']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>


        <button type="submit" name="unesi_pregled_btn" class="btn btn-primary">Unesi pregled</button>
    </form>