 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'recording_pakan/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('faktur : ','faktur',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('faktur',set_value('faktur', isset($default['faktur']) ? $default['faktur'] : ''),'id="faktur" class="form-control" placeholder="Masukkan faktur"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tanggal : ','tanggal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tanggal',set_value('tanggal', isset($default['tanggal']) ? $default['tanggal'] : ''),'id="tanggal" class="form-control" placeholder="Masukkan tanggal"'); ?>
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
                                <?php echo form_label('id_mitra : ','id_mitra',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_mitra',set_value('id_mitra', isset($default['id_mitra']) ? $default['id_mitra'] : ''),'id="id_mitra" class="form-control" placeholder="Masukkan id_mitra"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_recording : ','id_recording',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_recording',set_value('id_recording', isset($default['id_recording']) ? $default['id_recording'] : ''),'id="id_recording" class="form-control" placeholder="Masukkan id_recording"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('akun_perkiraan : ','akun_perkiraan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('akun_perkiraan',set_value('akun_perkiraan', isset($default['akun_perkiraan']) ? $default['akun_perkiraan'] : ''),'id="akun_perkiraan" class="form-control" placeholder="Masukkan akun_perkiraan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('total : ','total',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('total',set_value('total', isset($default['total']) ? $default['total'] : ''),'id="total" class="form-control" placeholder="Masukkan total"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tipe_stok : ','tipe_stok',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tipe_stok',set_value('tipe_stok', isset($default['tipe_stok']) ? $default['tipe_stok'] : ''),'id="tipe_stok" class="form-control" placeholder="Masukkan tipe_stok"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('is_trx : ','is_trx',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('is_trx',set_value('is_trx', isset($default['is_trx']) ? $default['is_trx'] : ''),'id="is_trx" class="form-control" placeholder="Masukkan is_trx"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('is_void : ','is_void',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('is_void',set_value('is_void', isset($default['is_void']) ? $default['is_void'] : ''),'id="is_void" class="form-control" placeholder="Masukkan is_void"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('is_jrnl : ','is_jrnl',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('is_jrnl',set_value('is_jrnl', isset($default['is_jrnl']) ? $default['is_jrnl'] : ''),'id="is_jrnl" class="form-control" placeholder="Masukkan is_jrnl"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('is_post : ','is_post',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('is_post',set_value('is_post', isset($default['is_post']) ? $default['is_post'] : ''),'id="is_post" class="form-control" placeholder="Masukkan is_post"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('date_posted : ','date_posted',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('date_posted',set_value('date_posted', isset($default['date_posted']) ? $default['date_posted'] : ''),'id="date_posted" class="form-control" placeholder="Masukkan date_posted"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_user : ','id_user',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_user',set_value('id_user', isset($default['id_user']) ? $default['id_user'] : ''),'id="id_user" class="form-control" placeholder="Masukkan id_user"'); ?>
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
            


 