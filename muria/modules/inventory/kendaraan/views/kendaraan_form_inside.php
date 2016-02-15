 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'kendaraan/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('nopol : ','nopol',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nopol',set_value('nopol', isset($default['nopol']) ? $default['nopol'] : ''),'id="nopol" class="form-control" placeholder="Masukkan nopol"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('nama : ','nama',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nama',set_value('nama', isset($default['nama']) ? $default['nama'] : ''),'id="nama" class="form-control" placeholder="Masukkan nama"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('kode : ','kode',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kode',set_value('kode', isset($default['kode']) ? $default['kode'] : ''),'id="kode" class="form-control" placeholder="Masukkan kode"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('akun_biaya : ','akun_biaya',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('akun_biaya',set_value('akun_biaya', isset($default['akun_biaya']) ? $default['akun_biaya'] : ''),'id="akun_biaya" class="form-control" placeholder="Masukkan akun_biaya"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('akun_aktiva : ','akun_aktiva',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('akun_aktiva',set_value('akun_aktiva', isset($default['akun_aktiva']) ? $default['akun_aktiva'] : ''),'id="akun_aktiva" class="form-control" placeholder="Masukkan akun_aktiva"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('akun_penyusutan : ','akun_penyusutan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('akun_penyusutan',set_value('akun_penyusutan', isset($default['akun_penyusutan']) ? $default['akun_penyusutan'] : ''),'id="akun_penyusutan" class="form-control" placeholder="Masukkan akun_penyusutan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('daya_angkut : ','daya_angkut',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('daya_angkut',set_value('daya_angkut', isset($default['daya_angkut']) ? $default['daya_angkut'] : ''),'id="daya_angkut" class="form-control" placeholder="Masukkan daya_angkut"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_wilayah : ','id_wilayah',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_wilayah',set_value('id_wilayah', isset($default['id_wilayah']) ? $default['id_wilayah'] : ''),'id="id_wilayah" class="form-control" placeholder="Masukkan id_wilayah"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('jenis : ','jenis',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('jenis',set_value('jenis', isset($default['jenis']) ? $default['jenis'] : ''),'id="jenis" class="form-control" placeholder="Masukkan jenis"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('kir_awal : ','kir_awal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kir_awal',set_value('kir_awal', isset($default['kir_awal']) ? $default['kir_awal'] : ''),'id="kir_awal" class="form-control" placeholder="Masukkan kir_awal"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('kir_akhir : ','kir_akhir',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kir_akhir',set_value('kir_akhir', isset($default['kir_akhir']) ? $default['kir_akhir'] : ''),'id="kir_akhir" class="form-control" placeholder="Masukkan kir_akhir"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('user_id : ','user_id',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('user_id',set_value('user_id', isset($default['user_id']) ? $default['user_id'] : ''),'id="user_id" class="form-control" placeholder="Masukkan user_id"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('datetime : ','datetime',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('datetime',set_value('datetime', isset($default['datetime']) ? $default['datetime'] : ''),'id="datetime" class="form-control" placeholder="Masukkan datetime"'); ?>
                                </div>
                            </div>
                        
                        </div>
                
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <button id="save" type="submit" class="btn btn-lg btn-success"><icon class="fa fa-floppy-o"></icon> Simpan</button>
                            <button id="save_edit" type="submit" class="btn btn-lg btn-primary" style="display:none;"><icon class="fa fa-refresh"></icon> Perbaiki</button>
                            <a href="#" id="cancel_edit" class="btn btn-lg btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal</a>
                        </div>
                   
                    <?php echo form_close();?>
                    </div>
            


 