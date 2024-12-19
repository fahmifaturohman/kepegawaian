<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="page-title-box">
                        <h4 class="page-title float-left">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="#" type="button" class="btn waves-effect waves-light btn-sm btn-purple btn-spt-kegiatan" data-toggle="modal" data-id="spt kegiatan"><i class="ion-plus-circled m-r-5"></i>Tambah SPT Kegiatan</a>
                                <a href="#" type="button" class="btn waves-effect waves-light btn-sm btn-orange-light btn-spt-plh" data-toggle="modal" data-id="spt plh"><i class="ion-plus-circled m-r-5"></i>Tambah SPT PLH</a>
                                <a href="#" type="button" class="btn waves-effect waves-light btn-sm btn-purple btn-spt-diklat" data-toggle="modal" data-id="spt diklat"><i class="ion-plus-circled m-r-5"></i>Tambah SPT Diklat</a>
                            </div>
                        </h4>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Kepegawaian</a></li>
                            <li class="breadcrumb-item active">SPT</li>
                            <li class="breadcrumb-item active"><?=isThangLabel()?></li>
                        </ol>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <table id="dataTableServer" class="table dt-responsive table-striped table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Aksi</th>
                                <th>No</th>
                                <th>No Surat</th>
                                <th>Ditetapkan</th>
                                <th>Tgl</th>
                                <th>Peserta</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                            
                        </table>
                    </div>
                </div>
            </div> <!-- end row -->


        </div> <!-- container -->

    </div> <!-- content -->
</div>

<?php include_once('add_kegiatan.php'); ?>
<?php include_once('add_plh.php'); ?>
<?php include_once('add_diklat.php'); ?>
<?php include_once('delete_spt.php') ?>




<script>
    var tabel = null;
    $(document).ready(function() {
        tabel = $('#dataTableServer').DataTable({
            iDisplayLength: 5,
            processing: true,
            responsive:true,
            serverSide: true,
            ordering: true,
            stateSave: false,
            order: [[ 1, 'DESC' ]],
            ajax:
            {
                url: "<?= base_url('spt/table');?>",
                type: "POST"
            },
            deferRender: true,
            aLengthMenu: [[5, 10, 50, 100],[ 5, 10, 50, 100]],
            columns: [
                {data: function(data,type,dataToSet) {
                        text = data.spt_tipe
                        str = `<div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="<?=base_url('spt/')?>edit_${text.replace(' ', '_')}/${data['id_spt']}" class="btn waves-effect waves-light btn-sm btn-facebook btn-edit"><i class="ion-compose"></i></a>
                                    <a type="button" class="btn waves-effect waves-light btn-sm btn-youtube btn-delete" data-toggle="modal" data-id="${data['id_spt']}"><i class="ion-trash-a"></i></a>
                                    <a href="<?=base_url("spt/report/")?>${data['id_spt']}" target ="_blank" class="btn waves-effect waves-light btn-sm btn-primary"><i class="ion-android-download"></i></a>
                                </div>`
                        return str    }
                },
                {data: "id_spt", sortable: false,  sClass: "text-center", orderable: false, searchable: false, width: "10px",
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }, orderable : false 
                },              
                {"data": function(data, type, dataToSet) {
                        return `${data['spt_tipe']}<br>${data['nomor']}`
                    }, orderable:false, width:"150px"
                },
                {data: "ditetapkan", orderable: false, width:"100px"},
                {data: function(data, type) {
                        return `<b>Penugas : </b>${data['penugas']}<br>${data['tgl']}`
                    }, orderable:false, width:"150px"
                },
                {data: "peserta", orderable: false},                
            ],
        });
    });
</script>
