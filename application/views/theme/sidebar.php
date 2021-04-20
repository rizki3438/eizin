<aside class="sidebar sidebar-icons-right sidebar-icons-boxed sidebar-expand-lg sidebar-light">
    <header class="sidebar-header bg-light">
        <span class="logo">
            <a href="index.html"><img src="<?php echo base_url();?>/assets/img/header-logo-2.png" alt="logo" style="height:70px;"></a>
        </span>
    </header>

    <nav class="sidebar-navigation">
        <ul class="menu">
            <li class="menu-category">Utama</li>

            <li class="menu-item <?php if ($this->uri->segment(2, 0) == 'dashboard') {
                                        echo 'active';
                                    } ?>">
                <a class="menu-link" href="<?php echo base_url(); ?>admin/dashboard">
                    <span class="icon pe-7s-home"></span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="menu-category">E-IZIN</li>
            <li class="menu-item <?php if ($this->uri->segment(2, 0) == "izin-tidak-masuk") {
                                        echo 'active';
                                    } ?>">
                <a class="menu-link" href="<?php echo base_url(); ?>admin/izin-tidak-masuk">
                    <span class="icon pe-7s-date"></span>
                    <span class="title">Izin Tidak Masuk</span>
                </a>
            </li>
            <li class="menu-category">Master</li>
            <li class="menu-item <?php if ($this->uri->segment(2, 0) == "jabatan") {
                                        echo 'active';
                                    } ?>">
                <a class="menu-link" href="<?php echo base_url(); ?>admin/jabatan">
                    <span class="icon pe-7s-anchor"></span>
                    <span class="title">Data Jabatan</span>
                </a>
            </li>
            <li class="menu-item <?php if ($this->uri->segment(2, 0) == "pangkat") {
                                        echo 'active';
                                    } ?>">
                <a class="menu-link" href="<?php echo base_url(); ?>admin/pangkat">
                    <span class="icon pe-7s-medal"></span>
                    <span class="title">Data Pangkat</span>
                </a>
            </li>
            <li class="menu-item <?php if ($this->uri->segment(2, 0) == "bidang") {
                                        echo 'active';
                                    } ?>">
                <a class="menu-link" href="<?php echo base_url(); ?>admin/bidang">
                    <span class="icon pe-7s-culture"></span>
                    <span class="title">Data Bidang</span>
                </a>
            </li>
            <li class="menu-item <?php if ($this->uri->segment(2, 0) == "golongan") {
                                        echo 'active';
                                    } ?>">
                <a class="menu-link" href="<?php echo base_url(); ?>admin/golongan">
                    <span class="icon pe-7s-graph1"></span>
                    <span class="title">Data Golongan</span>
                </a>
            </li>
            <li class="menu-item <?php if ($this->uri->segment(2, 0) == "pegawai") {
                                        echo 'active';
                                    } ?>">
                <a class="menu-link" href="<?php echo base_url(); ?>admin/pegawai">
                    <span class="icon pe-7s-users"></span>
                    <span class="title">Data Pegawai</span>
                </a>
            </li>
        </ul>
    </nav>

</aside>