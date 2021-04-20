<header class="header header-inverse" style="background-color: #755549;">
    <div class="container">
        <div class="header-info">
            <div class="left">
                <br>
                <h2 class="header-title"><strong>E-izin</strong> tidak masuk kantor<small class="subtitle">Sistem izin online kejaksaan negeri kota kediri</small></h2>
            </div>
        </div>
    </div>
</header>
<div class="main-content">

    <div class="container">
        <!--ALERT-->
        <?php if ($this->session->flashdata('alert')) {
            $dataalert = explode("|", $this->session->flashdata('alert'));
            $status = $dataalert[0];
            $message = $dataalert[1];
        ?>
            <div class="alert alert-<?php echo $status; ?>">
                <?php echo $message; ?>
            </div>
        <?php } ?>

        <?php if ($this->session->flashdata('alert2')) {
            $dataalert = explode("|", $this->session->flashdata('alert2'));
            $status = $dataalert[0];
            $message = $dataalert[1];
        ?>
            <div class="alert alert-<?php echo $status; ?>">
                <?php echo $message; ?>
            </div>
        <?php } ?>
        <!--END ALERT-->
        <form id="izin" class="row" action="" enctype="multipart/form-data" method="POST" onsubmit="validate()">
            <div class="col-lg-12">
                <div class="card shadow-1">
                    <h4 class="card-title"><strong>Pengajuan</strong> Izin tidak masuk</h4>

                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" id="nrp" placeholder="Masukka NRP anda untuk pencarian data">
                            <span class="input-group-append">
                                <button class="btn btn-light" type="button" id="cari">Cari Pegawai!</button>
                            </span>
                        </div>
                        <div id="data_detail" style="display: none;">
                            <hr>
                            <div class="form-group">
                                <label>Nama Pegawai</label>
                                <input type="hidden" id="id" name="id">
                                <input type="hidden" id="id_golongan" name="id_golongan">
                                <input type="hidden" id="id_bidang" name="id_bidang">
                                <input class="form-control" type="text" id="nama" placeholder="Otomatis ketika masukkan NRP" disabled>
                            </div>
                            <div class="form-group">
                                <label>Pangkat / Gol</label>
                                <input class="form-control" type="text" id="pangkat" placeholder="Otomatis ketika masukkan NRP" disabled>
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <input class="form-control" type="text" id="jabatan" placeholder="Otomatis ketika masukkan NRP" disabled>
                            </div>
                            <div class="form-group">
                                <label>Nomor Whatsapp</label> <small style="color:red">*Pastikan nomor whatsapp terbaru</small>
                                <input class="form-control" type="text" id="no_telp" name="no_telp" placeholder="Masukkan Nomor Whatsapp" required>
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select title="Pilih Kategori" name="kategori" data-provide="selectpicker" data-width="100%">
                                    <option>Sakit</option>
                            		<option>Kepentingan Keluarga</option>
                            		<option>Pembuatan Dokumen Kependudukan</option>
									<option>Menghadiri Undangan</option>
									<option>Kepentingan Keluarga</option>
									<option>Lainnya</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tanggal Izin</label>
                                <input class="form-control" id="start" name="start" type="text" placeholder="Tanggal Mulai Izin" data-provide="datepicker" required>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Masuk</label>
                                <input class="form-control" id="end" name="end" type="text" placeholder="Tanggal Selesai Izin" data-provide="datepicker" required>
                            </div>
                            <div class="form-group">
                                <label>Saya melakukan izin karena</label>
                                <input class="form-control" type="text" id="keterangan" name="keterangan" placeholder="Berkunjung ke rumah saudara" required>
                            </div>
                            <div class="form-group">
                                <label>Bukti Jika Sakit</label>
                                <input type="file" data-provide="dropify" name="bukti">
                            </div>
                        </div>
                    </div>

                    <footer class="card-footer flexbox" id="tombol_ajukan" style="display: none;">
                        <div class="text-right flex-grow">
                            <button class="btn btn-bold btn-primary" id="btn-submit" type="submit">Ajukan Sekarang</button>
                        </div>
                    </footer>
                </div>
            </div>

        </form>
    </div>
</div>

<script>
    $('#cari').on('click', function() {
        var nrp = $("#nrp").val();
        $.getJSON("<?php echo base_url(); ?>cari-nrp/" + nrp, function(data) {
            if (data != null) {
                $("#data_detail").show();
                $("#tombol_ajukan").show();
                $("#id").val(data.id);
                $("#nama").val(data.nama);
                $("#nrp").val(data.nrp);
                $("#id_golongan").val(data.id_golongan);
                $("#id_bidang").val(data.id_bidang);
                $("#no_telp").val(data.no_telp);
                $("#pangkat").val(data.pangkat_nama + " (" + data.golongan_nama + ")");
                $("#jabatan").val(data.jabatan_nama);
            } else {
                swal(
                    'NRP Tidak di temukan',
                    'Silahkan hubungi bagian pembinaan untuk cek NRP anda.',
                    'error'
                )
            }
        });
    });

    function getDateDiff(time1, time2) {
        var str1 = time1.split('/');
        var str2 = time2.split('/');

        //                yyyy   , mm       , dd
        var t1 = new Date(str1[2], str1[0] - 1, str1[1]);
        var t2 = new Date(str2[2], str2[0] - 1, str2[1]);

        var diffMS = t1 - t2;
        console.log(diffMS + ' ms');

        var diffS = diffMS / 1000;
        console.log(diffS + ' ');

        var diffM = diffS / 60;
        console.log(diffM + ' minutes');

        var diffH = diffM / 60;
        console.log(diffH + ' hours');

        var diffD = diffH / 24;
        console.log(diffD + ' days');
        // alert(diffD);
        return diffD;
    }

    function validate() {
        var start = $("#start").val();
        var end = $("#end").val();
        var no_telp = $("#no_telp").val();
        var keterangan = $("#keterangan").val();
        var hari = getDateDiff(end, start);
        console.log(start);
        console.log(end);
        console.log(hari);
        event.preventDefault(); // prevent form submit
        if (hari < 0) {
            alert("Pastikan tanggal selesai lebih 1 hari dari mulai");
        } else {
            var form = document.forms["izin"]; // storing the form
            swal({
                    title: "Konfirmasi Izin",
                    text: "Apakah benar anda mengajukan izin " + hari + " hari dengan keterangan " + keterangan + "",
                    showCancelButton: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        }

    }
</script>