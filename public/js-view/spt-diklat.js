
    
       //menimbang
    function menimbang() {
            var html = ""
            html += `<div class="row menimbang" style="padding-bottom: 10px;">
                        <div class="input-group col-md-12">
                            <textarea name="menimbang[]" class="form-control input-menimbang" cols="30" rows="2"></textarea>
                            <div class="input-group-append">
                            <span class="input-group-text btn-span-hapus btn-hapus-menimbang" id="basic-addon2">Hapus</span>
                            </div>
                        </div>
                    </div>`
        return html
    }
    //dasar hukum
    function dasar() {
        var html = ""
            html += `<div class="row dasar" style="padding-bottom: 10px;">
                        <div class="input-group col-md-12">
                            <textarea name="dasar[]" class="form-control input-dasar" cols="30" rows="2"></textarea>
                            <div class="input-group-append">
                            <span class="input-group-text btn-span-hapus btn-hapus-dasar" id="basic-addon2">Hapus</span>
                            </div>
                        </div>
                    </div>`
            return html
    } 

    function tahap(i = null) {
        var html = ""
        html += `
        <div class="row tahap">
            <div class="form-group col-lg-5 col-md-5 col-sm-12">
                <label for="" class="control-label">Tahap ${i}</label>
                <input type="text" name="tahap[]" class="form-control input-tahap" autocomplete="off">
                <div class="text-danger"></div>
            </div>
            <div class="form-group col-lg-5 col-md-5 col-sm-12">
                <label for="" class="control-label">Tempat ${i}</label>
                <input type="text" name="tempat[]" class="form-control input-tempat" autocomplete="off">
                <div class="text-danger"></div>
            </div>
            <div class="form-group col-lg-1 col-md-1 col-sm-12 p-pt-20">
            <label for="" class="control-label text-white">-</label>
            <button type="button" class="form-control btn btn-youtube btn-hapus-tahap"><i class="ion-close-circled"></i> hapus</button>                             
            </div>
        </div>
        `
        return html;
    }

    function typeheadTtd($els, $elsValue = "") {
        $els.typeahead({
            source: function (query, process) {
                $.ajax({
                    url: baseUrl+"pimpinan/caripegawai/"+query,
                    dataType: "json",
                    type: "GET",
                    success: function (data) {
                        let pegawai = data['data']
                        var results = pegawai.map(function(item) {
                            return item['nama'];
                        });
                        return process(results);
                    }
                });
            },
            afterSelect: function (item) {
                $.post(baseUrl+"pimpinan/caripegawairow", {nama:item}, function (res) {
                    var res = JSON.parse(res), data = res['data']
                    $elsValue.val(data['id'])
                });
            }
        })
    }

  
    //search semua pegawai dibawah pta
    function petugasAll(i = null) {
        var html = ""
        html += `
        <div class="row petugas">
            <div class="form-group col-md-4 col-sm-12">
                <label for="" class="control-label">Petugas</label>
                <input type="text" name="nama[]" class="form-control typehead input-nama input-cari-pegawai-all required" autocomplete="off">
                <div class="text-danger"></div>
            </div>
            <div class="form-group col-md-4 col-sm-12">
                <label for="" class="control-label">Jabatan</label>
                <input type="hidden" name="id_spt_detail[]">
                <input type="text" name="jabatan[]" class="form-control input-jabatan required" autocomplete="off">
                <input type="hidden" name="nip[]" class="form-control input-nip">
                <div class="text-danger"></div>
            </div>
            <div class="form-group col-md-3 col-sm-12">
                <label for="" class="control-label">Pangkat</label>   
                <input type="text" name="pangkat[]" class="form-control input-pangkat">
                <div class="text-danger"></div>
            </div>
            <div class="form-group col-md-1 col-sm-12 p-pt-20">
                <label for="" class="control-label text-white">-</label>
                <button type="button" class="form-control btn btn-youtube btn-hapus-petugas-kegiatan"><i class="ion-close-circled"></i> hapus</button>
            </div>
        </div>
        `;        
        return html;
    }
    function typeheadPetugasAll($els) {
        $els.typeahead({
            source: function (query, process) {
                $.ajax({
                    url: baseUrl+"pimpinan/caripegawaiAll/"+query,
                    dataType: "json",
                    type: "GET",
                    success: function (data) {
                        let pegawai = data['data']
                        var results = pegawai.map(function(item) {
                            return item['nama'];
                        });
                        return process(results);
                    }
                });
            },
            afterSelect: function (item) {
                $.post(baseUrl+"pimpinan/caripegawairowAll", {nama:item}, function (res) {
                    var res = JSON.parse(res), data = res['data']
                    if(res['type'] == "pegawai") {
                        $els.closest('.petugas').find('.input-jabatan').val(data['jabatan'])
                        $els.closest('.petugas').find('.input-pangkat').val(data['nama_golongan']+' ('+data['golongan']+')')
                        $els.closest('.petugas').find('.input-nip').val(data['username'])
                    } else {
                        $els.closest('.petugas').find('.input-jabatan').val(data['jabatan']+' '+data['unit_kerja'])
                        $els.closest('.petugas').find('.input-pangkat').val('PPNPN')
                        $els.closest('.petugas').find('.input-nip').val('-')
                    }
                });
            }
        })
    }

    //cari jabatan
    function typeheadJabatan($els, $elsValue) {
        $els.typeahead({
            source: function (query, process) {
                $.ajax({
                    url: baseUrl+"pimpinan/cariJabatan/"+query,
                    dataType: "json",
                    type: "GET",
                    success: function (data) {
                        let pegawai = data['data']
                        var results = pegawai.map(function(item) {
                            return item['bagian'];
                        });
                        return process(results);
                    }
                });
            },
            afterSelect: function (item) {
                $.post(baseUrl+"pimpinan/cariJabatanRow", {bagian:item}, function (res) {
                    var res = JSON.parse(res), data = res['data']
                    $elsValue.val(data['bagian'])
                    $('.input-cari-ttd').val(data['nama'])
                    $('.input-ttd').val(data['id_pegawai'])
                    $('.input-ttd-nama').val(data['nama'])
                    $('.input-ttd-note').val('Surat Perintah Tugas ini diketahui dan ditandatangani oleh '+ data['nama']+' sebagai '+data['status']+' Pengadilan Tinggi Agama Bandar Lampung')
                    $('.text-mengetahui').text('Surat Perintah Tugas ini diketahui dan ditandatangani oleh '+ data['nama']+' sebagai '+data['status']+' Pengadilan Tinggi Agama Bandar Lampung');
                });
            }
        })
    }

    
    //spt diklat
    $(document).ready(function() {
        var k = 1, l=1
        let modalDiklat = $('#form-edit')
        
        //button//
        $(document).on("click", ".btn-tambah-petugas-kegiatan", function(e) {
            k++;
            var html = petugasAll(k)
            modalDiklat.find('.list-petugas').prepend(html)
        })
        $(document).on("click", ".btn-hapus-petugas-kegiatan", function(e) {
            let id = $(this).attr('data-id')
            if(id !== undefined) { $('#form-edit').find('.list-petugas-hapus').append(`<input type="hidden" name="id_spt_detail_hapus[]" value="${id}">`) }
            $(this).closest('.petugas').remove()           
        })

        $(document).on('keyup', '.input-cari-jabatan', function() {
            typeheadJabatan($(this), $('.input-penugas'))
            if(($(this).val()).length > 0) success(this)
            else error(this, "*wajib diisi")
        }).on('blur', '.input-cari-jabatan', function() {
            if(($(this).val()).length > 0) success(this)
            else error(this, "*wajib diisi")
        })

        $(document).on('keyup', '.input-penugas',function() {
            let val = $(this).val()
            if(val.length > 0) success(this)
            else error(this, "*wajib diisi")
        }).on('blur','.input-penugas', function() {
            let val = $(this).val()
            if(val.length > 0) success(this)
            else error(this, "*wajib diisi")
        })

        $(document).on('keyup', '.input-cari-pegawai-all', function() {
            typeheadPetugasAll($(this))
            let val = $(this).val()
            if(val.length > 0) success(this)
            else error(this, "*wajib diisi")
            success($(this).closest('.petugas').find('.input-jabatan'))
        }).on('blur','.input-cari-pegawai-all', function() {
            let val = $(this).val()
            if(val.length > 0) success(this)
            else error(this, "*wajib diisi")
        })

        $(document).on('keyup','.input-cari-ttd', function() {            
            typeheadTtd($(this), $('.input-ttd'))
            if(($(this).val()).length > 0) success(this)
            else error(this, "*wajib diisi")
        }).on('blur', '.input-cari-ttd', function() {
            if(($(this).val()).length > 0) success(this)
            else error(this, "*wajib diisi")
        })



        $(document).on("click", ".btn-tambah-tahap", function(e) {
            l++;
            var html = tahap(l)
            modalDiklat.find('.list-tahap').prepend(html)
        })
        $(document).on("click", ".btn-hapus-tahap", function(e) {
            $(this).closest('.tahap').remove()
            let id = $(this).attr('data-id')
            if(id !== undefined) { $('#form-edit').find('.list-tahap-hapus').append(`<input type="hidden" name="id_spt_diklat_detail_hapus[]" value="${id}">`) }
        })
        $(document).on('keyup', '.input-berdasarkan',function() {
            let val = $(this).val()
            if(val.length > 0) success(this)
            else error(this, "*wajib diisi")
        }).on('blur','.input-berdasarkan', function() {
            let val = $(this).val()
            if(val.length > 0) success(this)
            else error(this, "*wajib diisi")
        })
        $(document).on('keyup', '.input-nomor',function() {
            let val = $(this).val()
            if(val.length > 0) success(this)
            else error(this, "*wajib diisi")
        }).on('blur','.input-nomor', function() {
            let val = $(this).val()
            if(val.length > 0) success(this)
            else error(this, "*wajib diisi")
        })
        $(document).on('change', '.input-tanggal-sumber',function() {
            let val = $(this).val()
            if(val.length > 0) success(this)
            else error(this, "*wajib diisi")
        }).on('blur','.input-tanggal-sumber', function() {
            let val = $(this).val()
            if(val.length > 0) success(this)
            else error(this, "*wajib diisi")
        })
        $(document).on('keyup', '.input-perihal',function() {
            let val = $(this).val()
            if(val.length > 0) success(this)
            else error(this, "*wajib diisi")
        }).on('blur','.input-perihal', function() {
            let val = $(this).val()
            if(val.length > 0) success(this)
            else error(this, "*wajib diisi")
        })
        
        $(document).on('keyup', '.input-tahap',function() {
            let val = $(this).val()
            if(val.length > 0) success(this)
            else error(this, "*wajib diisi")
        }).on('blur','.input-tahap', function() {
            let val = $(this).val()
            if(val.length > 0) success(this)
            else error(this, "*wajib diisi")
        })

        $(document).on('keyup', '.input-tempat',function() {
            let val = $(this).val()
            if(val.length > 0) success(this)
            else error(this, "*wajib diisi")
        }).on('blur','.input-tempat', function() {
            let val = $(this).val()
            if(val.length > 0) success(this)
            else error(this, "*wajib diisi")
        })

        $(document).on('change', '.input-tgl',function() {
            let val = $(this).val()
            if(val.length > 0) success(this)
            else error(this, "*wajib diisi")
        }).on('blur','.input-tgl', function() {
            let val = $(this).val()
            if(val.length > 0) success(this)
            else error(this, "*wajib diisi")
        })

       

        $(document).on('change', '.input-tgl',function() {
            let val = $(this).val()
            if(val.length > 0) success(this)
            else error(this, "*wajib diisi")
        }).on('blur','.input-tgl', function() {
            let val = $(this).val()
            if(val.length > 0) success(this)
            else error(this, "*wajib diisi")
        })
        
       

        $(document).on("submit", "#form-edit", function(e) {
            e.preventDefault();
            var valid = true
            $(this).find('.form-control.required').each(function() {
                if(!$(this).val()) {
                    error(this,"Silahkan lengkapi form !");
                    valid= false;
                }

                if ($(this).hasClass('is-invalid')){
                    valid = false;
                }
            })

            if(valid) { 
                postAjax("spt/edit_spt_diklat", "#form-edit") 
            }
        })


        $(document).on("click", ".btn-add-menimbang-kegiatan", function(e) {
            e.preventDefault()
            var html = menimbang()
            modalDiklat.find('.list-menimbang').prepend(html)
        })
        $(document).on("click", ".btn-add-dasar-kegiatan", function(e) {
            e.preventDefault()
            var html = dasar()
            modalDiklat.find('.list-dasar').prepend(html)
        })
        $(document).on("click", ".btn-hapus-menimbang", function(e) {
            let id = $(this).attr('data-id')
            if(id !== undefined) { $('#form-edit').find('.list-menimbang-hapus').append(`<input type="hidden" name="menimbang_id_hapus[]" value="${id}">`) }
            $(this).closest('.menimbang').remove()
        })
        $(document).on("click", ".btn-hapus-dasar", function(e) {
            let id = $(this).attr('data-id')
            if(id !== undefined) { $('#form-edit').find('.list-hukum-hapus').append(`<input type="hidden" name="hukum_id_hapus[]" value="${id}">`) }
            $(this).closest('.dasar').remove()
        })
          

    })