 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'wilayah/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('kd_wilayah : ','kd_wilayah',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kd_wilayah',set_value('kd_wilayah', isset($default['kd_wilayah']) ? $default['kd_wilayah'] : ''),'id="kd_wilayah" class="form-control" placeholder="Masukkan kd_wilayah"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('wilayah : ','wilayah',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('wilayah',set_value('wilayah', isset($default['wilayah']) ? $default['wilayah'] : ''),'id="wilayah" class="form-control" placeholder="Masukkan wilayah"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('propinsi : ','propinsi',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('propinsi',set_value('propinsi', isset($default['propinsi']) ? $default['propinsi'] : ''),'id="propinsi" class="form-control" placeholder="Masukkan propinsi"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('keterangan : ','keterangan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('keterangan',set_value('keterangan', isset($default['keterangan']) ? $default['keterangan'] : ''),'id="keterangan" class="form-control" placeholder="Masukkan keterangan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_user : ','id_user',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_user',set_value('id_user', isset($default['id_user']) ? $default['id_user'] : ''),'id="id_user" class="form-control" placeholder="Masukkan id_user"'); ?>
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
                        
                        </div>
                
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <button id="save" type="submit" class="btn btn-lg btn-success"><icon class="fa fa-floppy-o"></icon> Simpan</button>
                            <button id="save_edit" type="submit" class="btn btn-lg btn-primary" style="display:none;"><icon class="fa fa-refresh"></icon> Perbaiki</button>
                            <a href="#" id="cancel_edit" class="btn btn-lg btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal</a>
                        </div>
                   
                    <?php echo form_close();?>
                    </div>
            


 