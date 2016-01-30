 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'bukti/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('kode_bukti : ','kode_bukti',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kode_bukti',set_value('kode_bukti', isset($default['kode_bukti']) ? $default['kode_bukti'] : ''),'id="kode_bukti" class="form-control" placeholder="Masukkan kode_bukti"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Keterangan : ','Keterangan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Keterangan',set_value('Keterangan', isset($default['Keterangan']) ? $default['Keterangan'] : ''),'id="Keterangan" class="form-control" placeholder="Masukkan Keterangan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('parent : ','parent',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('parent',set_value('parent', isset($default['parent']) ? $default['parent'] : ''),'id="parent" class="form-control" placeholder="Masukkan parent"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('module : ','module',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('module',set_value('module', isset($default['module']) ? $default['module'] : ''),'id="module" class="form-control" placeholder="Masukkan module"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('load_url : ','load_url',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('load_url',set_value('load_url', isset($default['load_url']) ? $default['load_url'] : ''),'id="load_url" class="form-control" placeholder="Masukkan load_url"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('is_active : ','is_active',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('is_active',set_value('is_active', isset($default['is_active']) ? $default['is_active'] : ''),'id="is_active" class="form-control" placeholder="Masukkan is_active"'); ?>
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
            


 