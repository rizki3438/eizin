<div class="col-12">

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

    <div class="card" style="border-radius: 10px;">
        <div class="card-body">
            <h2>List Surat Izin Tidak Masuk <button class="btn btn-warning btn-round" data-toggle="modal" data-target="#modal-add">Tambah Data</button></h2>
            <hr class="my-2">

            <div class="m-10">
                <table data-provide="datatables" class="table table-responsive table-sm">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Nama</td>
                            <td>Bidang</td>
                            <!-- <td>Jabatan</td>
                            <td>Pangkat / (Gol)</td> -->
                            <td>Tanggal</td>
                            <td>Keterangan</td>
                            <td>Status</td>
                            <td>Bukti</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        /*$qrCode = new Endroid\QrCode\QrCode('123456');
                        $qrCode->writeFile('https://api.qrserver.com/v1/create-qr-code/?data=<?=$rowdata->nrp?>&size=220x220&margin=0'.$row_data->nrp.".png");*/
                        $i = 1;
                        foreach ($listdata->result() as $row_data) { ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row_data->nama; ?></td>
                                <td><?php echo $row_data->bidang_nama; ?></td>
                                <!-- <td><?php echo $row_data->jabatan_nama; ?></td>
                                <td><?php echo $row_data->pangkat_nama; ?> / (<?php echo $row_data->golongan_nama; ?>)</td> -->
                                <td><?php echo date('d-m-Y', $row_data->start); ?> / <?php echo date('d-m-Y', $row_data->end); ?></td>
                                <td><?php echo $row_data->keterangan; ?></td>
                                <td><?php echo $row_data->status; ?></td>
                                <td>
                                    <?php
                                        if ($row_data->bukti == NULL){
                                            echo "Tidak ada";
                                        }
                                        else{?>
                                            <a href="<?=base_url()?>/assets/uploads/bukti_izin/<?=$row_data->bukti;?>" target="_blank"><img src="<?=base_url()?>/assets/uploads/bukti_izin/<?=$row_data->bukti;?>" style="width: 100px; height: 50px;"></a>
                                        <?php
                                        }?>
                                </td>
                                <td>
                                    <div class="btn-group ">
                                        <button class="btn btn-info btn-sm btn-round dropdown-toggle" data-toggle="dropdown">Action</button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-bukti" onclick="getbukti('<?php echo $row_data->bukti; ?>')"><i class="fa fa-camera-retro"></i> Lihat Bukti</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-edit" onclick="getview('<?php echo $row_data->id; ?>')"><i class="fa fa-edit"></i> Edit Data</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-delete" onclick="deletenow('<?php echo $row_data->id; ?>')"><i class="fa fa-trash"></i> Delete Data</a>
                                            <?php if($row_data->status=="DISETUJUI"){; ?>
                                            <a class="dropdown-item" target="_blank" href="<?php echo base_url();?>tidak-masuk/print/<?php echo $row_data->code; ?>"><i class="fa fa-download"></i> Cetak Surat</a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php $i++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-center fade" id="modal-bukti" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 10px;">
            <form action="<?php echo base_url(); ?>admin/izin-tidak-masuk/update" method="POST">
                
                <?php
                    foreach($listdata->result() as $row_data){ ?>
                        <?php
                            if ($row_data->bukti == NULL) {
                                echo "Tidak ada";
                            }
                            else{?>
                                <img src="<?=base_url()?>/assets/uploads/bukti_izin/<?=$row_data->bukti;?>" style="width: 100px; height: 100px;">
                           <?php
                            }?>

                    <?php
                    }
                ?>
                <div class="modal-footer">
                    <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal modal-center fade" id="modal-add" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 10px;">
            <form action="<?php echo base_url(); ?>admin/izin-tidak-masuk/add" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id">Pilih Pegawai</label>
                                <select class="form-control" id="id" name="id" required>
                                    <option value="">Pilih Pegawai</option>
                                    <?php foreach ($listpegawai->result() as $row_pegawai) { ?>
                                        <option value="<?php echo $row_pegawai->id; ?>"><?php echo $row_pegawai->nama; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select title="Pilih Kategori" name="kategori" data-provide="selectpicker" data-width="100%">
                                    <option value="Kepentingan Keluarga">Kepentingan Keluarga</option>
                                    <option value="Sakit">Sakit</option>
                                    <option value="Pembuatan Dokumen Kependudukan">Pembuatan Dokumen Kependudukan</option>
                                    <option value="Menghadiri Panggilan/Undangan">Menghadiri Panggilan/Undangan</option>
                                    <option value="Urusan Kepegawaian di Kejati/Kejagung">Urusan Kepegawaian di Kejati/Kejagung</option>
                                    <option value="Lainnya">Lainnya</option>
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
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Saya melakukan izin karena</label>
                                <input class="form-control" type="text" id="keterangan" name="keterangan" placeholder="Berkunjung ke rumah saudara" required>
                            </div>
                            <div class="form-group">
                                <label>Bukti Jika Sakit</label>
                                <input type="file" data-provide="dropify">
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-bold btn-pure btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal modal-center fade" id="modal-edit" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 10px;">
            <form action="<?php echo base_url(); ?>admin/izin-tidak-masuk/update" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Ubah Data</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_update">ID</label>
                                <input type="text" class="form-control" id="id_update" name="id" readonly>
                            </div>
                            <div class="form-group">
                                <label for="id">Pilih Pegawai</label>
                                <select class="form-control" id="id_pegawai_update" name="id_pegawai" readonly>
                                    <option value="">Pilih Pegawai</option>
                                    <?php foreach ($listpegawai->result() as $row_pegawai) { ?>
                                        <option value="<?php echo $row_pegawai->id; ?>"><?php echo $row_pegawai->nama; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select title="Pilih Kategori" id="kategori_update" name="kategori" data-provide="selectpicker" data-width="100%">
                                    <option value="Acara Keluarga">Acara Keluarga</option>
                                    <option value="Sakit">Sakit</option>
                                    <option value="Mengurus Ktp">Mengurus Ktp</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Izin</label>
                                <input class="form-control" id="start_update" name="start" type="text" placeholder="Tanggal Mulai Izin" data-provide="datepicker" required>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Masuk</label>
                                <input class="form-control" id="end_update" name="end" type="text" placeholder="Tanggal Selesai Izin" data-provide="datepicker" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Saya melakukan izin karena</label>
                                <input class="form-control" type="text" id="keterangan_update" name="keterangan" placeholder="Berkunjung ke rumah saudara" required>
                            </div>
                            <div class="form-group">
                                <label>Bukti Jika Sakit</label>
                                <input type="file" data-provide="dropify">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-bold btn-pure btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal modal-center fade" id="modal-delete" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 10px;">
            <form action="<?php echo base_url(); ?>admin/izin-tidak-masuk/delete" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Delete Data</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="id_delete" name="id">
                    <h3>Apakah anda yakin ingin menghapus data <b id="id_delete_display">-</b></h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-bold btn-pure btn-primary">Delete Now</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
<script>
    function epochdate(x){
        var date = new Date(Number(x) * 1000);
        var formattedDate =  (date.getUTCMonth() + 1)+ '/' +date.getUTCDate() + '/'+ date.getUTCFullYear();
        return formattedDate;
    }
    function getview(id) {
        $.getJSON("<?php echo base_url(); ?>admin/izin-tidak-masuk/view/" + id, function(data) {
            // console.log(data);
            $("#id_update").val(data.id);
            $("#id_pegawai_update").val(data.id_pegawai);
            $("#start_update").val(moment.unix(data.start).format('DD-MM-YYYY'));
            $("#end_update").val(moment.unix(data.end).format('DD-MM-YYYY'));
            $("#kategori_update").val(data.kategori);
            $("#keterangan_update").val(data.keterangan);
        });
    }

    function deletenow(id) {
        $("#id_delete").val(id);
        $("#id_delete_display").html(id);
    }

    /*function getbukti(id){
        var img = $(this).attr("src");
    }*/
    function getbukti(id){
          var img = $(this).attr("src");
          var appear_image = "<div id='appear_image_div' onclick='closeImage()'></div>";
          appear_image = appear_image.concat("<img id='appear_image' src='"+img+"' />");
          appear_image = appear_image.concat("<div id='close_image' onclick='closeImage()'>x</div>");
          $('body').append(appear_image);
    };
    function closeImage() {
        $('#appear_image_div').remove();
        $('#appear_image').remove();
        $('#close_image').remove();
      }
</script>