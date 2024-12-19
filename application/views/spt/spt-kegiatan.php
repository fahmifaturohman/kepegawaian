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
                            </div>
                        </h4>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Kepegawaian</a></li>
                            <li class="breadcrumb-item active"><?=$title;?></li>
                            <li class="breadcrumb-item active"><?=isThangLabel()?></li>
                        </ol>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-12">
                    <div class="card-box" style="font-size:12px !important">
                        <table id="dataTableServer" class="table dt-responsive table-striped table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Aksi</th>
                                <th>No</th>
                                <th>No Surat</th>
                                <th>Kegiatan/Tempat Kegiatan</th>
                                <th>Dipa</th>
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
<?php include_once('delete_spt.php'); ?>


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
                url: "<?= base_url('spt/table_spt_kegiatan');?>",
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
                        return `${data['nomor']}<br><b>penugas: </b>${data['penugas']}<br><b>ditetapkan: </b>${data['tgl']}`
                    }, orderable:false, width:"130px"
                },
                {"data": function(data, type, dataToSet) {
                        return `<b>${data['tgl_kegiatan']}</b><br>${data['kegiatan']}<br> dilaksanakan di ${data['tempat_kegiatan']}`
                    }, orderable:false, width:"280px"
                },
                {data: function(data, type) {
                        return `${data['dipa_style']}`
                    }, orderable:false, width:"200px"
                },
                {data: "peserta", orderable: false},                
            ],
        });
    });
</script>
