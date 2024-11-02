<div class="modal fade" id="modal-spt-kegiatan" role="dialog" aria-labelledby="myModalLabel-2" data-backdrop="static">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel-2">TAMBAH SPT KEGIATAN</h4>
			</div>
            <form id="form-submit-kegiatan" class="form-kegiatan">           
			<div class="modal-body" style="overflow:auto;height:400px !important">
                <div class="row">
                    <input type="hidden" name="spt_tipe" class="input-spt-tipe">
                    <div class="col-12">
                        <label class="form-label">
                            <button type="button" class="btn btn-instagram waves-effect waves-light btn-add-menimbang-kegiatan">
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
                            <button type="button" class="btn btn-instagram waves-effect waves-light btn-add-dasar-kegiatan">
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
                    <div class="form-group col-4">
                        <label for="input-cari-pegawai" class="control-label">Pejabat yang memberi tugas :</label>                        
                        <input type="text" class="form-control typeahead input-cari-jabatan required" placeholder="contoh : Ketua" autocomplete="off">
                        <input type="hidden" name="penugas" class="input-penugas">
                        <div class="text-danger"></div>
                    </div>
                    <div class="form-group col-4">
                        <label for="input-cari-pegawai" class="control-label">Hari/Tanggal Kegiatan</label>
                        <input type="text" name="tgl_kegiatan" class="form-control input-tanggal-kegiatan input-daterange-datepicker required" placeholder="Waktu Kegiatan" autocomplete="off">
                        <div class="text-danger"></div>
                    </div>
                    <div class="form-group col-4">
                        <label for="input-cari-pegawai" class="control-label">Pukul</label>
                        <input type="text" name="pukul" class="form-control input-pukul-kegiatan required" placeholder="Waktu Kegiatan" autocomplete="off">
                        <div class="text-danger"></div>
                    </div>   
                    <div class="form-group col-12">
                        <label for="" class="control-label">Tempat</label>
                        <input type="text" name="tempat" class="form-control typehead input-tempat input-cari-tempat required" placeholder="Tempat Kegiatan" autocomplete="off">
                        <div class="text-danger"></div>
                    </div>
                    <div class="form-group col-12">
                        <label for="" class="control-label">Alamat Tempat Kegiatan (optional)</label>
                        <textarea name="alamat" class="form-control input-alamat" autocomplete="on" cols="10" rows="3"></textarea>
                        <div class="text-danger"></div>
                    </div>           
                    <div class="form-group col-12">
                        <label for="" class="control-label">Kegiatan</label>
                        <textarea name="kegiatan" class="form-control input-kegiatan required" autocomplete="off" cols="10" rows="3"></textarea>
                        <div class="text-danger"></div>
                    </div>  
                    <div class="form-group col-12">
                        <div class="row">
                            <div class="col-2">
                                <input type="radio" name="dipa_status" class="control-label radio-dipa dipa" value="1" checked> 
                                <label for="" class="control-label span-dipa">DIPA</label>
                            </div>
                            <div class="col-2">
                                <input type="radio" name="dipa_status" class="control-label radio-dipa non-dipa" value="0"> 
                                <label for="" class="control-label span-dipa">NON DIPA</label>
                            </div>
                        </div>
                    </div>                  
                    <div class="form-group col-6 list-dipa">
                        <label for="" class="control-label">Dipa (Satuan Kerja)</label>
                        <div class="row col-12">
                            <select class="select2 form-control input-dipa" name="dipa">
                                <?php foreach ($data['dipa'] as $key ) { ?>
                                <option value="<?=$key?>"><?=$key?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                <?php } ?>
                            </select> 
                        </div>                 
                        <div class="text-danger"></div>
                    </div>

                    <div class="form-group col-6 list-dipa">
                        <label for="" class="control-label">Tahun Anggaran</label>
                        <div class="input-group">
                            <input type="text" name="tahun" class="form-control input-tahun datepicker-year" placeholder="Tahun" autocomplete="off" readonly>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                            </div>
                        </div>
                        <div class="text-danger"></div>
                    </div>
                    <div class="col-12"><hr></div>
                    <div class="col-12 text-right">
                    <button type="button" class="form-control col-3 btn btn-outline-success btn-tambah-petugas-kegiatan"><i class="ion-plus-circled"></i> Tambah Petugas</button>
                    </div>
                    <div class="col-12 list-petugas">
                        <div class="row petugas">
                            <div class="form-group col-5">
                                <label for="" class="control-label">Petugas 1</label>
                                <input type="text" name="nama[]" class="form-control typehead input-nama input-cari-pegawai required" autocomplete="off">
                                <div class="text-danger"></div>
                            </div>
                            <div class="form-group col-6">
                                <label for="" class="control-label">Jabatan 1</label>
                                <input type="text" name="jabatan[]" class="form-control input-jabatan required" autocomplete="off">
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
                    <div class="form-group col-6">
                        <label for="" class="control-label">Ditetapkan Pada Tanggal</label>
                        <div class="input-group">
                            <input type="text" name="tgl" class="form-control input-tgl datepicker-autoclose required" placeholder="dd/mm/yyyy" autocomplete="off" readonly>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                            </div>
                        </div>
                        <div class="text-danger"></div>
                    </div>
                    <div class="form-group col-6">
                        <label for="" class="control-label">Mengetahui</label>
                        <div class="input-group">
                            <input type="text" class="form-control typehead input-cari-ttd required" placeholder="Mengetahui" readonly>
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
				<button type="button" class="btn btn-outline-secondary btn-sm waves-effect waves-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-instagram waves-effect waves-light btn-blue">
                    <span class="btn-label"><i class="fa fa-save"></i> </span>Submit SPT Kegiatan
                </button>
			</div>
            </form>
		</div>
	</div>
</div>