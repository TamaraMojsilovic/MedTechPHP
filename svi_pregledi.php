    <div id="svi_pregledi_tbl">
        <table class="table table-hover text-center" id="pregledi_tbl">

            <thead class="table-secondary">
                <tr>
                    <th class="text-center">Pregled ID</th>
                    <th class="text-center">Datum</th>
                    <th class="text-center">Pacijent</th>
                    <th class="text-center">Lekar</th>
                    <th class="text-center"></th>
                </tr>
            </thead>

            <tbody>
                <?php

                $konekcijaDB = new mysqli("localhost", "root", "", "med_tech") or die("Neuspešna konekcija sa bazom! - %s\n" . $konekcijaDB->error);

                $upit = "SELECT pregled_id, datum, pacijent.ime as pime, pacijent.prezime as pprez, lekar.ime as lime, lekar.prezime as lprez
             FROM pregled JOIN pacijent ON pregled.pacijent_id = pacijent.pacijent_id
             JOIN lekar ON pregled.lekar_id = lekar.lekar_id";

                $pregledi = $konekcijaDB->query($upit);

                while ($p = mysqli_fetch_array($pregledi)) :
                ?>
                    <tr>
                        <td><?php echo $p['pregled_id'] ?></td>
                        <td><?php echo $p['datum'] ?></td>
                        <td><?php echo $p['pime'] . " " . $p['pprez'] ?></td>
                        <td><?php echo $p['lime'] . " " . $p['lprez'] ?></td>
                        <td>
                            <button class="btn btn-primary" name="izmeni_btn" value="<?php echo $p['pregled_id'] ?>">Izmeni</button>
                        </td>
                    </tr>

                <?php endwhile; ?>


            </tbody>

        </table>
    </div>