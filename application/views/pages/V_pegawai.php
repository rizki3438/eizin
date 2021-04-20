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
            <h2>List Pegawai <button class="btn btn-warning btn-round" data-toggle="modal" data-target="#modal-add">Add Pegawai</button></h2>
            <hr class="my-2">

            <div class="m-10">
                <table data-provide="datatables" class="table table-responsive table-sm">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Nama</td>
                            <td>NIP</td>
                            <td>NRP</td>
                            <td>Golongan</td>
                            <td>Pangkat</td>
                            <td>Bidang</td>
                            <td>Jabatan</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($listdata->result() as $row_data) { ?>
                            <tr>
                                <td><small><?php echo $i; ?></small></td>
                                <td><small><?php echo $row_data->nama; ?></small></td>
                                <td><small><?php echo $row_data->nip; ?></small></td>
                                <td><small><?php echo $row_data->nrp; ?></small></td>
                                <td><small><?php echo $row_data->golongan_nama; ?></small></td>
                                <td><small><?php echo $row_data->pangkat_nama; ?></small></td>
                                <td><small><?php echo $row_data->bidang_nama; ?></small></td>
                                <td><small><?php echo $row_data->jabatan_nama; ?></small></td>
                                <td>
                                    <div class="btn-group ">
                                        <button class="btn btn-info btn-sm btn-round dropdown-toggle" data-toggle="dropdown">Action</button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-edit" onclick="getview('<?php echo $row_data->id; ?>')"><i class="fa fa-edit"></i> Edit Data</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-delete" onclick="deletenow('<?php echo $row_data->id; ?>')"><i class="fa fa-trash"></i> Delete Data</a>
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

<!-- Modal -->
<div class="modal modal-center fade" id="modal-add" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="border-radius: 10px;">
            <form action="<?php echo base_url(); ?>admin/pegawai/add" method="POST">
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
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" class="form-control" id="nip" name="nip" required>
                            </div>
                            <div class="form-group">
                                <label for="nrp">NRP</label>
                                <input type="text" class="form-control" id="nrp" name="nrp" required>
                            </div>
                            <div class="form-group">
                                <label for="no_telp">No Telp</label>
                                <input type="text" class="form-control" id="no_telp" name="no_telp" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_pangkat">Pangkat</label>
                                <select class="form-control" name="id_pangkat" id="id_pangkat" required>
                                    <option value="">Pilih Pangkat</option>
                                    <?php foreach ($listpangkat->result() as $row_pangkat) { ?>
                                        <option value="<?php echo $row_pangkat->id; ?>"><?php echo $row_pangkat->nama; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_bidang">Bidang</label>
                                <select class="form-control" name="id_bidang" id="id_bidang" required>
                                    <option value="">Pilih Bidang</option>
                                    <?php foreach ($listbidang->result() as $row_bidang) { ?>
                                        <option value="<?php echo $row_bidang->id; ?>"><?php echo $row_bidang->nama; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_jabatan">Jabatan</label>
                                <select class="form-control" name="id_jabatan" id="id_jabatan" required>
                                    <option value="">Pilih Jabatan</option>
                                    <?php foreach ($listjabatan->result() as $row_jabatan) { ?>
                                        <option value="<?php echo $row_jabatan->id; ?>"><?php echo $row_jabatan->nama; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_golongan">Golongan</label>
                                <select class="form-control" name="id_golongan" id="id_golongan" required>
                                    <option value="">Pilih Golongan</option>
                                    <?php foreach ($listgolongan->result() as $row_golongan) { ?>
                                        <option value="<?php echo $row_golongan->id; ?>"><?php echo $row_golongan->nama; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_tipe">Tipe</label>
                                <select class="form-control" name="tipe" id="tipe" required>
                                    <option value="">Pilih Tipe</option>
                                    <option value="JF">Jaksa Fungsional</option>
                                    <option value="TU">Tata Usaha</option>
                                </select>
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
<div class="modal modal-center fade" id="modal-edit" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="border-radius: 10px;">
            <form action="<?php echo base_url(); ?>admin/pegawai/update" method="POST">
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
                                <label for="nama_update">Nama</label>
                                <input type="text" class="form-control" id="nama_update" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="nip_update">NIP</label>
                                <input type="text" class="form-control" id="nip_update" name="nip" required>
                            </div>
                            <div class="form-group">
                                <label for="nrp_update">NRP</label>
                                <input type="text" class="form-control" id="nrp_update" name="nrp" required>
                            </div>
                            <div class="form-group">
                                <label for="no_telp_update">No Telp</label>
                                <input type="text" class="form-control" id="no_telp_update" name="no_telp" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_pangkat_update">Pangkat</label>
                                <select class="form-control" name="id_pangkat" id="id_pangkat_update" required>
                                    <option value="">Pilih Pangkat</option>
                                    <?php foreach ($listpangkat->result() as $row_pangkat) { ?>
                                        <option value="<?php echo $row_pangkat->id; ?>"><?php echo $row_pangkat->nama; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_bidang_update">Bidang</label>
                                <select class="form-control" name="id_bidang" id="id_bidang_update" required>
                                    <option value="">Pilih Bidang</option>
                                    <?php foreach ($listbidang->result() as $row_bidang) { ?>
                                        <option value="<?php echo $row_bidang->id; ?>"><?php echo $row_bidang->nama; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_jabatan_update">Jabatan</label>
                                <select class="form-control" name="id_jabatan" id="id_jabatan_update" required>
                                    <option value="">Pilih Jabatan</option>
                                    <?php foreach ($listjabatan->result() as $row_jabatan) { ?>
                                        <option value="<?php echo $row_jabatan->id; ?>"><?php echo $row_jabatan->nama; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_golongan_update">Golongan</label>
                                <select class="form-control" name="id_golongan" id="id_golongan_update" required>
                                    <option value="">Pilih Golongan</option>
                                    <?php foreach ($listgolongan->result() as $row_golongan) { ?>
                                        <option value="<?php echo $row_golongan->id; ?>"><?php echo $row_golongan->nama; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_tipe_update">Tipe</label>
                                <select class="form-control" name="tipe" id="tipe_update" required>
                                    <option value="">Pilih Tipe</option>
                                    <option value="JF">Jaksa Fungsional</option>
                                    <option value="TU">Tata Usaha</option>
                                </select>
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
            <form action="<?php echo base_url(); ?>admin/pegawai/delete" method="POST">
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

<script>
    function getview(id) {
        $.getJSON("<?php echo base_url(); ?>admin/pegawai/view/" + id, function(data) {
            // console.log(data);
            $("#id_update").val(data.id);
            $("#nama_update").val(data.nama);
            $("#nip_update").val(data.nip);
            $("#nrp_update").val(data.nrp);
            $("#no_telp_update").val(data.no_telp);
            $("#id_pangkat_update").val(data.id_pangkat);
            $("#id_bidang_update").val(data.id_bidang);
            $("#id_jabatan_update").val(data.id_jabatan);
            $("#id_golongan_update").val(data.id_golongan);
            $("#tipe_update").val(data.tipe);
        });
    }

    function deletenow(id) {
        $("#id_delete").val(id);
        $("#id_delete_display").html(id);
    }
</script>