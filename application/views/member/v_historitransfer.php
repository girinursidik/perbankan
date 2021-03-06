<?php
include "v_header.php";
include "v_sidebar.php";
if ($rekening['jenis']!="Regular")
  redirect(base_url('member'));
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        <?php
          if (NOW>=03 && NOW<=10)
            echo "Selamat pagi";
          else if(NOW>=11 && NOW<=14)
            echo "Selamat siang";
          else if(NOW>=15 && NOW<=18)
            echo "Selamat sore";
          else if(NOW>=19 && NOW<=22)
            echo "Selamat malam";
        if ($person['nama_lengkap'] != "")
        {
          $called = $person['nama_lengkap'];
          echo ", <b>".$called."</b>";
        }
        ?>
      </h1>
      <ul class="breadcrumb">
        <li>Beranda</li>
        <li>Histori</li>
        <li class="active">Transfer</li>
      </ul>
    </section>

    <section class="content">
      <div class="row konten">
        <center class="title">Data Transfer</center>
          <center>
          <table class="table-data">
            <thead>
              <tr>
                <td>Tujuan</td>
                <td>Nominal</td>
                <td>Media</td>
                <td>Tanggal</td>
                <td>Waktu</td>
                <td>Status</td>
              </tr>
            </thead>
            <tbody>
              <?php
              if (count($transfer)>0)
              {
                foreach($transfer as $log)
                {
                    ?><tr>
                      <td><?= $log->tujuan; ?></td>
                      <td>Rp<?= number_format($log->nominal,"0",".","."); ?></td>
                      <td><?= $log->atm==1 ? "ATM" : "Bukan ATM"; ?></td>
                      <td><?= $log->tanggal; ?></td>
                      <td><?= $log->jam; ?></td>
                      <td><?= $log->approval == 1 ? "Success" : "Waiting for admin"; ?></td>
                    </tr><?php
                }
              }

              else
              {
                ?><tr><td colspan="6"><center>Tidak ada data transfer</center></td></tr><?php
              }?>
            </tbody>
          </table>
          </center>
      </div>
    </section>
  </div>
</div>
</div>
<?php include "v_footer.php"; ?>
</body>
</html>