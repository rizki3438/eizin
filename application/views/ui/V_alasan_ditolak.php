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
        <form id="izin" class="row" action="" method="POST">
            <div class="col-lg-12">
                <div class="card shadow-1">
                    <h4 class="card-title"><strong>Pengajuan</strong> Izin tidak masuk</h4>

                    <div class="card-body">
                        <div id="data_detail">
                            <div class="form-group">
                                <label>Alasan Kenapa Ditolak</label>
                                <textarea class="form-control" name="alasan_ditolak" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>

                    <footer class="card-footer flexbox" id="tombol_ajukan">
                        <div class="text-right flex-grow">
                            <button class="btn btn-bold btn-primary" id="btn-submit" type="submit">Ajukan Sekarang</button>
                        </div>
                    </footer>
                </div>
            </div>

        </form>
    </div>
</div>
