 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'supir_armada/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('id_karyawan : ','id_karyawan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_karyawan',set_value('id_karyawan', isset($default['id_karyawan']) ? $default['id_karyawan'] : ''),'id="id_karyawan" class="form-control" placeholder="Masukkan id_karyawan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('nama_supir : ','nama_supir',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nama_supir',set_value('nama_supir', isset($default['nama_supir']) ? $default['nama_supir'] : ''),'id="nama_supir" class="form-control" placeholder="Masukkan nama_supir"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('no_ktp : ','no_ktp',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('no_ktp',set_value('no_ktp', isset($default['no_ktp']) ? $default['no_ktp'] : ''),'id="no_ktp" class="form-control" placeholder="Masukkan no_ktp"'); ?>
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
            


 