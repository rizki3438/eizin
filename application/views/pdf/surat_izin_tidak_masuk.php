<html>
<head>
  <title><?php echo $_title;?></title>
  <style type="text/css">
    #outtable{
      padding: 20px;
      border:1px solid #e3e3e3;
      width: 800px;
      border-radius: 5px;
    }
    body{
      font-family: Arial;
      font-size: 22.6px
    }
    .pos {
      position: absolute;
      z-index: 0;
      left: 0px;
      top: 0px
    }
    table{
      border-collapse: collapse;
      font-family: arial;
      color:#5E5B5C;
      width: 800px;
    }
  </style>
</head>
<body>
    <!-- <div id="outtable"> -->
      <table>
        <nobr>
            <nowrap>
              <div class="pos" id="_0:0" style="top:0">
                <!-- <img src="<?php echo $_SERVER[base_url()]."/ci-dompdf8/media/dist/img/no-signal.png"; ?>" alt=""> -->
                  <!-- <img name="_1170:828" src="<?php echo base_url();?>assets/img/page_001.jpg" height="1170" width="828"
                      border="0" usemap="#Map"> -->
              </div>
              <!-- <div class="pos" id="_91:50" style="top:50;left:91">
                  <span id="_16.3" style=" font-family:Arial; font-size:16.3px; color:#000000">
                  </span>
              </div>
              <div class="pos" id="_178:50" style="top:50;left:178">
                  <span id="_16.3" style=" font-family:Arial; font-size:16.3px; color:#000000">
                  </span>
              </div> -->
              <div class="pos" id="_400:50" style="top:50;left:400">
                  <span id="_16.3" style=" font-family:Arial; font-size:16.3px; color:#000000">
                      Kediri, <?php echo date('d F Y');?></span>
              </div>
              <div class="pos" id="_10:100" style="top:100;left:10">
                  <span id="_15.8" style=" font-family:Arial; font-size:16.3px; color:#000000">
                      Perihal : Mohon Izin Tidak Masuk Kerja
                  </span>
              </div>
              <div class="pos" id="_10:130" style="top:130;left:10">
                  <span id="_15.5" style=" font-family:Arial; font-size:15.5px; color:#000000">
                      <span style="font-weight:bold"> KEPADA YTH :</span></span>
              </div>
              <div class="pos" id="_10:155" style="top:155;left:10">
                  <span id="_15.1" style="font-weight:bold; font-family:Arial; font-size:15.1px; color:#000000">
                      KEPALA KEJAKSAAN NEGERI </span>
              </div>
              <div class="pos" id="_10:170" style="top:170;left:10">
                  <span id="_16.3" style="font-weight:bold; font-family:Arial; font-size:16.3px; color:#000000">
                      KOTA KEDIRI</span>
              </div>
              <div class="pos" id="_10:195" style="top:195;left:10">
                  <span id="_16.3" style="font-weight:bold; font-family:Arial; font-size:16.3px; color:#000000">
                      Melalui</span>
              </div>
              <div class="pos" id="_10:210" style="top:210;left:10">
                  <span id="_15.2" style="font-weight:bold; font-family:Arial; font-size:15.2px; color:#000000">
                      KEPALA SUB BAGIAN <?php echo $rowdata->bidang_nama;?> </span>
              </div>
              <div class="pos" id="_10:235" style="top:235;left:10">
                  <span id="_15.2" style="font-weight:bold; font-family:Arial; font-size:15.2px; color:#000000">
                      KEJAKSAAN NEGERI KOTA KEDIRI</span>
              </div>
              <div class="pos" id="_10:260" style="top:260;left:10">
                  <span id="_16.3" style="font-weight:bold; font-family:Arial; font-size:16.3px; color:#000000">
                      DI &#150;</span>
              </div>
              <div class="pos" id="_30:290" style="top:290;left:30">
                  <span id="_21.7" style="font-weight:bold; font-family:Arial; font-size:21.7px; color:#000000">
                      <U>K</U><U></U><U>E</U><U></U><U>D</U><U></U><U>I</U><U></U><U>R</U><U></U><U>I</U></span>
              </div>
              <div class="pos" id="_10:355" style="top:355;left:10">
                  <span id="_15.3" style=" font-family:Arial; font-size:15.3px; color:#000000">
                      Dengan Hormat,</span>
              </div>
              <div class="pos" id="_10:380" style="top:380;left:10">
                  <span id="_15.3" style=" font-family:Arial; font-size:15.3px; color:#000000">
                      Yang bertanda tangan dibawah ini saya :</span>
              </div>
              <div class="pos" id="_25:405" style="top:405;left:25">
                  <span id="_14.5" style=" font-family:Arial; font-size:14.5px; color:#000000">
                      Nama </span>
              </div>
              <div class="pos" id="_100:405" style="top:405;left:100">
                  <span id="_16.3" style=" font-family:Arial; font-size:16.3px; color:#000000">
                      : </span>
              </div>
              <div class="pos" id="_115:406" style="top:406;left:115">
                  <span id="_15.1" style=" font-family:Arial; font-size:15.1px; color:#000000">
                      <?php echo $rowdata->nama;?></span>
              </div>
              <div class="pos" id="_25:430" style="top:430;left:25">
                  <span id="_15.1" style=" font-family:Arial; font-size:15.1px; color:#000000">
                      Pangkat / Gol. </span>
              </div>
              <div class="pos" id="_100:430" style="top:430;left:100">
                  <span id="_16.3" style=" font-family:Arial; font-size:16.3px; color:#000000">
                      : </span>
              </div>
              <div class="pos" id="_115:430" style="top:430;left:115">
                  <span id="_16.3" style=" font-family:Arial; font-size:16.3px; color:#000000">
                  <?php echo $rowdata->pangkat_nama;?> (<?php echo $rowdata->golongan_nama;?>)</span>
              </div>
              <div class="pos" id="_25:454" style="top:454;left:25">
                  <span id="_14.3" style=" font-family:Arial; font-size:14.3px; color:#000000">
                      NIP </span>
              </div>
              <div class="pos" id="_100:454" style="top:454;left:100">
                  <span id="_16.3" style=" font-family:Arial; font-size:16.3px; color:#000000">
                      : </span>
              </div>
              <div class="pos" id="_115:454" style="top:454;left:115">
                  <span id="_16.3" style=" font-family:Arial; font-size:16.3px; color:#000000">
                  <?php echo $rowdata->nip;?></span>
              </div>
              <div class="pos" id="_25:478" style="top:478;left:25">
                  <span id="_14.5" style=" font-family:Arial; font-size:14.5px; color:#000000">
                      Jabatan </span>
              </div>
              <div class="pos" id="_100:478" style="top:478;left:100">
                  <span id="_16.3" style=" font-family:Arial; font-size:16.3px; color:#000000">
                      : </span>
              </div>
              <div class="pos" id="_115:478" style="top:478;left:115">
                  <span id="_15.3" style=" font-family:Arial; font-size:15.3px; color:#000000">
                  <?php echo $rowdata->jabatan_nama;?> pada Sub Bagian <?php echo $rowdata->bidang_nama;?></span>
              </div>
              <div class="pos" id="_10:502" style="top:502;left:10">
                  <span id="_15.8" style=" font-family:Arial; font-size:15.8px; color:#000000">
                  <?php $diff  = $rowdata->end - $rowdata->start; $hari = round($diff / (60 * 60 * 24))?>
                      Dengan ini mengajukan permohonan ijin tidak masuk kerja selama <?php echo $hari;?> hari kerja tanggal
                  </span>
              </div>
              <div class="pos" id="_10:526" style="top:526;left:10">
                  <span id="_15.8" style=" font-family:Arial; font-size:15.8px; color:#000000">
                      <b><?php echo date('d-m-Y', $rowdata->start); ?> / <?php echo date('d-m-Y', $rowdata->end); ?></b> karena <?php echo $rowdata->keterangan;?>.</span>
              </div>
              <div class="pos" id="_10:550" style="top:550;left:10">
                  <span id="_15.8" style=" font-family:Arial; font-size:15.8px; color:#000000">
                      Demikian atas perkenan dan dikabulkannya permohonan ijin saya haturkan terima kasih.</span>
              </div>
              <div class="pos" id="_50:623" style="top:623;left:50">
                  <span id="_15.4" style=" font-family:Arial; font-size:15.4px; color:#000000">
                      Yang Menyetujui,</span>
              </div>
              <div class="pos" id="_54:650" style="top:650;left:54">
                  <span id="_15.1" style=" font-family:Arial; font-size:15.1px; color:#000000">
                      <img style="width: 100px; height: 100px;" src="assets/uploads/qr_code/<?php echo $pimpinan->nrp; ?>.png"></span>
              </div>
              <div class="pos" id="_26:730" style="top:730;left:26">
                  <span id="_15.1" style=" font-family:Arial; font-size:15.1px; color:#000000">
                      <B><U><?php echo $pimpinan->nama;?></U></B></span>
              </div>
              <div class="pos" id="_26:743" style="top:743;left:26">
                  <span id="_15.1" style=" font-family:Arial; font-size:15.1px; color:#000000">
                      <B>NIP. <?php echo $pimpinan->nip;?></B></span>
              </div>
              <div class="pos" id="350:623" style="top:623;left:350">
                  <span id="_15.4" style=" font-family:Arial; font-size:15.4px; color:#000000">
                      Hormat Saya,</span>
              </div>
              <div class="pos" id="_348:650" style="top:650;left:345">
                  <span id="_15.1" style=" font-family:Arial; font-size:15.1px; color:#000000">
                      <img style="width: 100px; height: 100px;" src="assets/uploads/qr_code/<?php echo $rowdata->nrp; ?>.png"></span>
              </div>
              <div class="pos" id="325:730" style="top:730;left:325">
                  <span id="_15.1" style=" font-family:Arial; font-size:15.1px; color:#000000">
                      <B><U><?php echo $rowdata->nama;?></U></B></span>
              </div>
              <div class="pos" id="325:743" style="top:743;left:325">
                  <span id="_15.1" style=" font-family:Arial; font-size:15.1px; color:#000000">
                      <B>NIP. <?php echo $rowdata->nip;?></B></span>
              </div>
          </nowrap>
        </nobr>
      </table>
    <!-- </div> -->
  </body>
</html>