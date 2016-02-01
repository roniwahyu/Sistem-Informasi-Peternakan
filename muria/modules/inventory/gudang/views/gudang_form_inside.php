 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'gudang/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('kd_gudang : ','kd_gudang',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kd_gudang',set_value('kd_gudang', isset($default['kd_gudang']) ? $default['kd_gudang'] : ''),'id="kd_gudang" class="form-control" placeholder="Masukkan kd_gudang"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('nama : ','nama',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nama',set_value('nama', isset($default['nama']) ? $default['nama'] : ''),'id="nama" class="form-control" placeholder="Masukkan nama"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_mitra : ','id_mitra',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_mitra',set_value('id_mitra', isset($default['id_mitra']) ? $default['id_mitra'] : ''),'id="id_mitra" class="form-control" placeholder="Masukkan id_mitra"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('kode_mitra : ','kode_mitra',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kode_mitra',set_value('kode_mitra', isset($default['kode_mitra']) ? $default['kode_mitra'] : ''),'id="kode_mitra" class="form-control" placeholder="Masukkan kode_mitra"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_user : ','id_user',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_user',set_value('id_user', isset($default['id_user']) ? $default['id_user'] : ''),'id="id_user" class="form-control" placeholder="Masukkan id_user"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_wilayah : ','id_wilayah',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_wilayah',set_value('id_wilayah', isset($default['id_wilayah']) ? $default['id_wilayah'] : ''),'id="id_wilayah" class="form-control" placeholder="Masukkan id_wilayah"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('status : ','status',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('status',set_value('status', isset($default['status']) ? $default['status'] : ''),'id="status" class="form-control" placeholder="Masukkan status"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('datetime : ','datetime',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('datetime',set_value('datetime', isset($default['datetime']) ? $default['datetime'] : ''),'id="datetime" class="form-control" placeholder="Masukkan datetime"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('timestamp : ','timestamp',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('timestamp',set_value('timestamp', isset($default['timestamp']) ? $default['timestamp'] : ''),'id="timestamp" class="form-control" placeholder="Masukkan timestamp"'); ?>
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
            


 