 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'receive_item/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('faktur : ','faktur',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('faktur',set_value('faktur', isset($default['faktur']) ? $default['faktur'] : ''),'id="faktur" class="form-control" placeholder="Masukkan faktur"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('faktur_reff : ','faktur_reff',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('faktur_reff',set_value('faktur_reff', isset($default['faktur_reff']) ? $default['faktur_reff'] : ''),'id="faktur_reff" class="form-control" placeholder="Masukkan faktur_reff"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('faktur_do : ','faktur_do',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('faktur_do',set_value('faktur_do', isset($default['faktur_do']) ? $default['faktur_do'] : ''),'id="faktur_do" class="form-control" placeholder="Masukkan faktur_do"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_supplier : ','id_supplier',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_supplier',set_value('id_supplier', isset($default['id_supplier']) ? $default['id_supplier'] : ''),'id="id_supplier" class="form-control" placeholder="Masukkan id_supplier"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tanggal : ','tanggal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tanggal',set_value('tanggal', isset($default['tanggal']) ? $default['tanggal'] : ''),'id="tanggal" class="form-control" placeholder="Masukkan tanggal"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tanggal_terima : ','tanggal_terima',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tanggal_terima',set_value('tanggal_terima', isset($default['tanggal_terima']) ? $default['tanggal_terima'] : ''),'id="tanggal_terima" class="form-control" placeholder="Masukkan tanggal_terima"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('kirim_via : ','kirim_via',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kirim_via',set_value('kirim_via', isset($default['kirim_via']) ? $default['kirim_via'] : ''),'id="kirim_via" class="form-control" placeholder="Masukkan kirim_via"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('keterangan : ','keterangan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('keterangan',set_value('keterangan', isset($default['keterangan']) ? $default['keterangan'] : ''),'id="keterangan" class="form-control" placeholder="Masukkan keterangan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('alamat_terima : ','alamat_terima',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('alamat_terima',set_value('alamat_terima', isset($default['alamat_terima']) ? $default['alamat_terima'] : ''),'id="alamat_terima" class="form-control" placeholder="Masukkan alamat_terima"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_cabang : ','id_cabang',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_cabang',set_value('id_cabang', isset($default['id_cabang']) ? $default['id_cabang'] : ''),'id="id_cabang" class="form-control" placeholder="Masukkan id_cabang"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_mitra : ','id_mitra',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_mitra',set_value('id_mitra', isset($default['id_mitra']) ? $default['id_mitra'] : ''),'id="id_mitra" class="form-control" placeholder="Masukkan id_mitra"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_kandang : ','id_kandang',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_kandang',set_value('id_kandang', isset($default['id_kandang']) ? $default['id_kandang'] : ''),'id="id_kandang" class="form-control" placeholder="Masukkan id_kandang"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_gudang : ','id_gudang',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_gudang',set_value('id_gudang', isset($default['id_gudang']) ? $default['id_gudang'] : ''),'id="id_gudang" class="form-control" placeholder="Masukkan id_gudang"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('nopol_pengirim : ','nopol_pengirim',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nopol_pengirim',set_value('nopol_pengirim', isset($default['nopol_pengirim']) ? $default['nopol_pengirim'] : ''),'id="nopol_pengirim" class="form-control" placeholder="Masukkan nopol_pengirim"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('nama_pengirim : ','nama_pengirim',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nama_pengirim',set_value('nama_pengirim', isset($default['nama_pengirim']) ? $default['nama_pengirim'] : ''),'id="nama_pengirim" class="form-control" placeholder="Masukkan nama_pengirim"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('is_approved : ','is_approved',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('is_approved',set_value('is_approved', isset($default['is_approved']) ? $default['is_approved'] : ''),'id="is_approved" class="form-control" placeholder="Masukkan is_approved"'); ?>
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
            


 