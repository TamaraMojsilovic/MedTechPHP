   <table class="table text-center" id="svi_pregledi_tbl">

       <thead>
           <tr>
               <th>Pregled ID</th>
               <th>Datum</th>
               <th>Pacijent</th>
               <th>Lekar</th>
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
               </tr>

           <?php endwhile; ?>


       </tbody>

   </table>