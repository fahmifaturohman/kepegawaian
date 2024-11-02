 <!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="page-title-box">
                        <h4 class="page-title float-left">Dashboard</h4>

                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="card-box tilebox-one">
                        <i class="icon-layers float-right text-muted"></i>
                        <h6 class="text-muted text-uppercase m-b-20"><a href="<?=base_url()?>spt/spt_kegiatan" target="_blank">SPT KEGIATAN</a></h6>
                        <h2 class="m-b-20" data-plugin="counterup"><?=$data['spt_kegiatan']?></h2>
                        <span class="badge badge-success"><?=$data['spt_kegiatan_persen']?> % </span> <span class="text-muted"><?=isThangLabel()?></span>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card-box tilebox-one">
                        <i class="icon-paypal float-right text-muted"></i>
                        <h6 class="text-muted text-uppercase m-b-20"><a href="<?=base_url()?>spt/spt_plh" target="_blank">SPT PLH</a></h6>
                        <h2 class="m-b-20"><span data-plugin="counterup"><?=$data['spt_plh']?></span></h2>
                        <span class="badge badge-danger"><?=$data['spt_plh_persen']?> % </span> <span class="text-muted"> <?=isThangLabel()?></span>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card-box tilebox-one">
                        <i class="icon-chart float-right text-muted"></i>
                        <h6 class="text-muted text-uppercase m-b-20"><a href="<?=base_url()?>spt/spt_diklat" target="_blank">SPT DIKLAT</a></h6>
                        <h2 class="m-b-20"><span data-plugin="counterup"><?=$data['spt_diklat']?></span></h2>
                        <span class="badge badge-pink"><?=$data['spt_diklat_persen']?> % </span> <span class="text-muted"> <?=isThangLabel()?></span>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card-box tilebox-one">
                        <i class="icon-rocket float-right text-muted"></i>
                        <h6 class="text-muted text-uppercase m-b-20"><a href="<?=base_url()?>spt" target="_blank">TOTAL SPT</a></h6>
                        <h2 class="m-b-20" data-plugin="counterup"><?=$data['spt']?></h2>
                        <span class="text-muted"> <?=isThangLabel()?></span>
                    </div>
                </div>
            </div>
            <!-- end row -->

           
            <div class="row">
                <div class="col-xl-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-20">Izin Keluar Kantor 5 Terakhir </h4>

                                <div class="inbox-widget nicescroll" style="height: 339px;">
                                    <?php foreach ($data['izin'] as $key ) { ?>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <p class="inbox-item-author"><?=mb_strimwidth($key->nama, 0,22, "...")?></p>
                                            <p class="inbox-item-text"><?=$key->jabatan?></p>
                                            <p class="inbox-item-date"><?=strdateindo($key->tgl_mengetahui)?>, <?=$key->dari.' - '.$key->sampai?></p>
                                        </div>
                                    </a>
                                    <?php } ?>                                    
                                </div>

                            </div>
                        </div>
                    </div>
                </div><!-- end col-->

                <div class="col-xl-8">
                    <div class="card-box">

                        <h4 class="header-title m-t-0 m-b-30">Riwayat Spt (5 Terakhir)</h4>

                        <div class="table-responsive nicescroll" style="height: 335px;">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>SPT</th>
                                        <th width="50%">PESERTA</th>
                                        <th>TANGGAL</th>
                                        <th>MENGETAHUI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['dataspt'] as $key) { ?>
                                    <tr>
                                        <th class="text-muted"><?=$key->spt_tipe?></th>
                                        <td><?=$key->peserta?></td>
                                        <td><?=strdateindo($key->tgl)?></td>
                                        <td><span><?=$key->nama?></span></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div><!-- end col-->


            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->



</div>
<!-- End content-page -->
