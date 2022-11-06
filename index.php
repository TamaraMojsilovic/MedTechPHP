<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/14ebaea159.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="index.css">
    <title>MedTech</title>
</head>

<body>

    <div class="container">

        <div class="heading-main">
            <i class="fa-solid fa-stethoscope fa-4x"></i>
            <h1 class="text-primary">MedTech Hospital</h2>
        </div>

        <div class="main-menu">
            <div class="novi-pacijent">
                <h3 id="np-h3">Novi pacijent</h3>
            </div>
            <div class="novi-pregled">
                <h3 id="npregled-h3">Novi pregled</h3>
            </div>
            <div class="svi-pregledi">
                <h3 id="sp-h3">Svi pregledi</h3>
            </div>
        </div>

        <?php
        include 'novi_pacijent.php';
        include 'novi_pregled.php';
        include 'svi_pregledi.php';
        include 'pacijent.php';


        if (isset($_GET['unesi_pacijenta_btn'])) {

            $pacijent = new Pacijent();
            $pacijent->ime = $_GET['ime'];
            $pacijent->prezime = $_GET['prezime'];
            $pacijent->datum_rodjenja = $_GET['datum_rodjenja'];
            $pacijent->broj_telefona = $_GET['broj_telefona'];
            $pacijent->adresa = $_GET['adresa'];


            if ($pacijent->unesiPacijenta($pacijent)) {
                echo "<script type='text/javascript'>alert('Novi pacijent uspešno sačuvan!'); location='index.php'</script>";
            }
        }
        ?>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
</body>

</html>

<script>
    $(document).ready(function() {
        $('#pregledi_tbl').DataTable();
    });

    //Prikaz forme za novog pacijenta
    $('#np-h3').on('click', function() {
        $('#n-pregled-frm').hide()
        $('#svi_pregledi_tbl').hide()
        $('#n-pacijent-frm').show()
    });
    //Prikaz forme za novi pregled
    $('#npregled-h3').on('click', function() {
        $('#n-pacijent-frm').hide()
        $('#svi_pregledi_tbl').hide()
        $('#n-pregled-frm').show()
    });
    //Prikaz svih pregleda
    $('#sp-h3').on('click', function() {
        $('#n-pacijent-frm').hide()
        $('#n-pregled-frm').hide()
        $('#svi_pregledi_tbl').show()
    });


    //Unos novog pregleda
    $("button[name='unesi_pregled_btn']").click(function(e) {

        e.preventDefault()

        $.ajax({
            url: 'savePregled.php',
            method: 'POST',
            data: {
                datum: $('input[name=datum]').val(),
                pacijent: $('select[name=pacijent]').val(),
                lekar: $('select[name=lekar]').val(),
            },
            success: function() {
                alert('Novi pregled uspešno sačuvan!')
                $("#n-pregled-frm").trigger('reset')
            }
        })

    });



    //Izmena pregleda
    $("button[name='izmeni_btn']").click(function(e) {

        e.preventDefault()

        $('#svi_pregledi_tbl').hide()
        $('#n-pregled-frm').show()

        //Hide dugme za unos, show dugme za ažuriranje
        $("button[name='unesi_pregled_btn']").hide()
        $("button[name='azuriraj_pregled_btn']").show()

        //Postavljanje id-a pregleda u dugme za azuriranje
        $("button[name='azuriraj_pregled_btn']").val($(this).val())

        $.ajax({
            url: 'izmenaPregleda.php',
            method: 'POST',
            data: {
                ID: $(this).val(),
            },
            dataType: 'JSON',

            success: function(data) {
                $("input[name='datum']").val(data.datum)
                $("select[name='pacijent']").val(data.pacijent_id)
                $("select[name='lekar']").val(data.lekar_id)
            }
        })

    });


    //Ažuriranje izvršenog pregleda
    $("button[name='azuriraj_pregled_btn']").click(function(e) {

        e.preventDefault()

        $.ajax({
            url: 'azuriranjePregleda.php',
            method: 'POST',
            data: {
                ID: $(this).val(),
                datum: $("input[name='datum']").val(),
                pacijent_id: $("select[name='pacijent']").val(),
                lekar_id: $("select[name='lekar']").val()
            },

            success: function() {
                alert('Pregled uspešno ažuriran!')
            }
        })

    });
</script>