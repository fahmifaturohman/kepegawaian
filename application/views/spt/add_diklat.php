<div class="modal fade" id="modal-spt-diklat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-2" data-backdrop="static">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel-2">TAMBAH SPT DIKLAT</h4>
			</div>
            <form id="form-submit-diklat">
			<div class="modal-body" style="overflow:auto;height:400px !important">
                <div class="row">
                    <input type="hidden" name="spt_tipe" class="input-spt-tipe">
                    <div class="col-12">
                        <label class="form-label">
                            <button type="button" class="btn btn-instagram waves-effect waves-light btn-add-menimbang-diklat">
                            <span class="btn-label"><i class="fa fa-plus"></i> </span> Tambah Menimbang
                            </button>
                        </label>
                        <div class="list-menimbang">
                            <div class="row menimbang" style="padding-bottom: 10px;">
                                <div class="input-group col-md-12">
                                    <textarea name="menimbang[]" class="form-control input-menimbang" cols="30" rows="2"></textarea>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12"><hr></div>
                    <div class="col-12">
                        <label class="form-label">
                            <button type="button" class="btn btn-instagram waves-effect waves-light btn-add-dasar-diklat">
                            <span class="btn-label"><i class="fa fa-plus"></i> </span> Tambah Dasar Hukum
                            </button>
                        </label>
                        <div class="list-dasar">
                            <div class="row dasar" style="padding-bottom: 10px;">
                                <div class="input-group col-md-12">
                                    <textarea name="dasar[]" class="form-control input-dasar" cols="30" rows="2"></textarea>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12"><hr></div>  
                    <div class="form-group col-6">
                        <label for="input-cari-pegawai" class="control-label">Berdasarkan Surat</label>                        
                            <input type="text" name="berdasarkan" class="form-control input-berdasarkan" placeholder="Berdasarkan" autocomplete="off">
                        <div class="text-danger"></div>
                    </div>
                    <div class="form-group col-3">
                        <label for="input-cari-pegawai" class="control-label">Nomor</label>                        
                            <input type="text" name="nomor" class="form-control input-nomor" placeholder="Nomor" autocomplete="off">
                        <div class="text-danger"></div>
                    </div>
                    <div class="form-group col-3">
                        <label for="input-cari-pegawai" class="control-label">Tanggal</label>
                        <input type="text" name="tgl_sumber" class="form-control input-tanggal-sumber datepicker-autoclose" placeholder="yyyy-mm-dd" autocomplete="off">
                        <div class="text-danger"></div>
                    </div>
                    <div class="form-group col-12">
                        <label for="input-cari-pegawai" class="control-label">Ditugaskan Oleh</label>                        
                        <input type="text" class="form-control typeahead input-cari-jabatan required" placeholder="contoh : Ketua" autocomplete="off">
                        <input type="hidden" name="penugas" class="input-penugas">
                        <div class="text-danger"></div>
                    </div>
                    <div class="form-group col-12">
                        <label for="" class="control-label">Untuk Mengikuti</label>
                        <textarea name="perihal" id="" cols="30" rows="5" class="form-control input-perihal"></textarea>
                        <div class="text-danger"></div>
                    </div>
                    <div class="col-12"><hr><label>Menugaskan Saudara :</label></div>
                    <div class="col-12 text-right">
                    <button type="button" class="form-control col-3 btn btn-outline-success btn-tambah-petugas-kegiatan"><i class="ion-plus-circled"></i> Tambah Petugas</button>
                    </div>
                    <div class="col-12 list-petugas">
                        <div class="row petugas">
                            <div class="form-group col-5">
                                <label for="" class="control-label">Petugas 1</label>
                                <input type="text" name="nama[]" class="form-control typehead input-nama input-cari-pegawai-all" autocomplete="off">
                                <div class="text-danger"></div>
                            </div>
                            <div class="form-group col-5">
                                <label for="" class="control-label">Jabatan 1</label>
                                <input type="text" name="jabatan[]" class="form-control input-jabatan" autocomplete="off">
                                <input type="hidden" name="nip[]" class="form-control input-nip">
                                <input type="hidden" name="pangkat[]" class="form-control input-pangkat">
                                <div class="text-danger"></div>
                            </div>
                            <div class="form-group col-1 p-pt-20">
                                <label for="" class="control-label text-white">-</label>                               
                            </div>
                        </div>
                    </div>
                    <div class="col-12"><hr></div>
                    <div class="col-12 text-right">
                    <button type="button" class="form-control col-3 btn btn-outline-success btn-tambah-tahap"><i class="ion-plus-circled"></i> Tahap</button>
                    </div>
                    <div class="col-12 list-tahap">
                        <div class="row tahap">
                            <div class="form-group col-5">
                                <label for="" class="control-label">Tahap 1</label>
                                <input type="text" name="tahap[]" class="form-control input-tahap" autocomplete="off">
                                <div class="text-danger"></div>
                            </div>
                            <div class="form-group col-5">
                                <label for="" class="control-label">Tempat</label>
                                <input type="text" name="tempat[]" class="form-control input-tempat" autocomplete="off">
                                <div class="text-danger"></div>
                            </div>
                            <div class="form-group col-1 p-pt-20">
                                <label for="" class="control-label text-white">-</label>                               
                            </div>
                        </div>
                    </div>
                    <div class="col-12"><hr></div>
                    <div class="form-group col-6">
                        <label for="" class="control-label">Ditetapkan Pada Tanggal</label>
                        <div class="input-group">
                            <input type="text" name="tgl" class="form-control input-tgl datepicker-autoclose" placeholder="dd/mm/yyyy" autocomplete="off" readonly>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                            </div>
                        </div>
                        <div class="text-danger"></div>
                    </div>
                    <div class="form-group col-6">
                        <label for="" class="control-label">Mengetahui</label>
                        <div class="input-group">
                            <input type="text" class="form-control typehead input-cari-ttd" placeholder="Mengetahui" readonly>
                            <input type="hidden" name="ttd" class="form-control typehead input-ttd" placeholder="Mengetahui">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-account-o"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-12" style="margin-bottom:60px">
                        <input type="hidden" name="ttd_nama" class="input-ttd-nama">
                        <input type="hidden" name="ttd_note" class="input-ttd-note">
                        <span class="text-mengetahui"></span>
                    </div>
                </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-sm waves-effect waves-light" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-instagram waves-effect waves-light btn-blue">
                    <span class="btn-label"><i class="fa fa-save"></i> </span>Submit SPT Diklat
                </button>
			</div>
            </form>
		</div>
	</div>
</div>