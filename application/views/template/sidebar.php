<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul>
                <li class="text-muted menu-title">Navigation</li>

                <li class="has_sub">
                    <a href="<?=base_url()?>" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i><span> Dashboard </span> </a>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect 
                    <?=$active = ($page == "asaltujuan" || $page == "klasifikasi" || $page == "pimpinan" || $page == "pegawai") ? "subdrop active":"";?>">
                    <i class="zmdi zmdi-folder-outline"></i> <span>Master</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li class="<?=$active = ($page == "asaltujuan") ? "active":""; ?>"><a href="<?=base_url()?>asaltujuan">Asal/Tujuan SPT</a></li>
                        <li class="<?=$active = ($page == "pimpinan") ? "active":""; ?>"><a href="<?=base_url()?>pimpinan">Pimpinan</a></li>
                        <li class="<?=$active = ($page == "pegawai") ? "active":""; ?>"><a href="<?=base_url()?>pegawai">Pegawai</a></li>
                        <li class="<?=$active = ($page == "ppnpn") ? "active":""; ?>"><a href="<?=base_url()?>ppnpn">PPNPN</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect 
                    <?=$active = ($page == "spt" || $page == "spt-kegiatan" || $page == "spt-plh" || $page == "spt-diklat" || $page == "undangan" ||  $page == "edit-spt-kegiatan" ||  $page == "edit-spt-plh" ||  $page == "edit-spt-diklat") ? "active subdrop":"";?>">
                    <i class="zmdi zmdi-format-list-bulleted"></i> <span>Kepegawaian</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li class="<?=$active = ($page == "spt") ? "active":""; ?>"><a href="<?=base_url()?>spt">SPT</a></li>
                        <li class="<?=$active = ($page == "spt-kegiatan" || $page == "edit-spt-kegiatan") ? "active":""; ?>"><a href="<?=base_url()?>spt/spt_kegiatan">SPT Kegiatan</a></li>
                        <li class="<?=$active = ($page == "spt-plh" || $page == "edit-spt-plh") ? "active":""; ?>"><a href="<?=base_url()?>spt/spt_plh">SPT Plh</a></li>
                        <li class="<?=$active = ($page == "spt-diklat" || $page == "edit-spt-diklat") ? "active":""; ?>"><a href="<?=base_url()?>spt/spt_diklat">SPT Diklat</a></li>
                        <!-- <li class="<?=$active = ($page == "undangan") ? "active":""; ?>"><a href="<?=base_url()?>undangan">Undangan</a></li> -->
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect 
                    <?=$active = ($page == "izin-keluar" || $page == "izin-keluar") ? "active subdrop":"";?>">
                    <i class="zmdi zmdi-collection-text"></i> <span>Izin</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li class="<?=$active = ($page == "izin-keluar") ? "active":""; ?>"><a href="<?=base_url()?>izinkeluar">Izin Keluar Kantor</a></li>
                    </ul>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
</div>
<!-- Left Sidebar End -->