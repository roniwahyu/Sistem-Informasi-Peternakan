 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'setup_account/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('id_siklus : ','id_siklus',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_siklus',set_value('id_siklus', isset($default['id_siklus']) ? $default['id_siklus'] : ''),'id="id_siklus" class="form-control" placeholder="Masukkan id_siklus"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_rekening : ','id_rekening',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_rekening',set_value('id_rekening', isset($default['id_rekening']) ? $default['id_rekening'] : ''),'id="id_rekening" class="form-control" placeholder="Masukkan id_rekening"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('nama_account : ','nama_account',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nama_account',set_value('nama_account', isset($default['nama_account']) ? $default['nama_account'] : ''),'id="nama_account" class="form-control" placeholder="Masukkan nama_account"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('parent : ','parent',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('parent',set_value('parent', isset($default['parent']) ? $default['parent'] : ''),'id="parent" class="form-control" placeholder="Masukkan parent"'); ?>
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
            


 