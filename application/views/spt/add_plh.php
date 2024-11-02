<div class="modal fade" id="modal-spt-plh" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-2" data-backdrop="static">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel-2">TAMBAH SPT PLH</h4>
			</div>
            <form id="form-submit-plh">
			<div class="modal-body" style="overflow:auto;height:560px !important">
                <div class="row">
                    <input type="hidden" name="spt_tipe" class="input-spt-tipe">
                    
                    <div class="col-12">
                        <label class="form-label">
                            <button type="button" class="btn btn-instagram waves-effect waves-light btn-add-menimbang-plh">
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
                            <button type="button" class="btn btn-instagram waves-effect waves-light btn-add-dasar-plh">
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
                    <div class="form-group col-md-12 col-sm-12">
                        <label for="input-cari-pegawai" class="control-label">Pejabat Yang Memberi Tugas :</label>                        
                        <input type="text" class="form-control typeahead input-cari-jabatan required" placeholder="contoh : Ketua" autocomplete="off">
                        <input type="hidden" name="penugas" class="input-penugas">
                        <div class="text-danger"></div>
                    </div>
                    <div class="col-12"><hr></div>                    
                    <div class="col-12 list-petugas">
                        <div class="row petugas">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="" class="control-label">Pejabat Yang diberi Tugas : </label>
                                <input type="text" name="nama[]" class="form-control typehead input-nama input-cari-pegawai" autocomplete="off">
                                <div class="text-danger"></div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="" class="control-label">Jabatan</label>
                                <input type="text" name="jabatan[]" class="form-control input-jabatan" autocomplete="off" readonly>
                                <input type="hidden" name="nip[]" class="form-control input-nip">
                                <input type="hidden" name="pangkat[]" class="form-control input-pangkat">
                                <div class="text-danger"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="input-cari-pegawai" class="control-label">Ditugaskan Sebagai :</label>
                        <select name="plh" class="form-control input-plh">
                            <option value="">-</option>
                            <option value="Ketua">Ketua</option>
                            <option value="Panitera">Panitera</option>
                            <option value="Sekretaris">Sekretaris</option>
                        </select>
                        <div class="text-danger"></div>
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label class="control-label">Waktu PLH :</label>
                        <input type="text" name="waktu" class="form-control input-waktu input-daterange-datepicker required" placeholder="Waktu Plh" autocomplete="off">
                        <div class="text-danger"></div>
                    </div>
                    <div class="form-group col-12">
                        <label for="input-cari-pegawai" class="control-label">Alasan Plh</label>                            
                        <select name="alasan" class="form-control input-alasan required">
                            <option value="dinas luar" selected>Dinas Luar</option>
                            <option value="cuti">Cuti</option>
                        </select>
                    </div>
                    <div class="form-group col-12">
                        <label for="input-cari-pegawai" class="control-label">Keterangan :</label>
                        <div class="row">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>1. </td>
                                        <td>Surat Tugas ini dibuat karena <b><span class="input-keterangan"></span></b> Pengadilan Tinggi Agama Bandar Lampung sedang <b><span class="text-alasan">dinas luar</span></b></td>
                                    </tr>
                                    <tr>
                                        <td>2. </td>
                                        <td>Kepada Pejabat yang ditunjuk untuk dapat melaksanakan tugasnya sebagai Pelaksana Harian (Plh) <b><span class="input-keterangan"></span></b> Pengadilan Tinggi Agama Bandar Lampung dan melaporkan tugasnya kepada <span class="input-keterangan"></span> Pengadilan Tinggi Agama Bandar Lampung</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12"><hr></div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="" class="control-label">Ditetapkan Pada Tanggal</label>
                        <div class="input-group">
                            <input type="text" name="tgl" class="form-control input-tgl datepicker-autoclose" placeholder="dd/mm/yyyy" autocomplete="off" readonly>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                            </div>
                        </div>
                        <div class="text-danger"></div>
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
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
                    <span class="btn-label"><i class="fa fa-save"></i> </span>Submit SPT PLH
                </button>
			</div>
            </form>
		</div>
	</div>
</div>