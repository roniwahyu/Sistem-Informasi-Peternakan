 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'kas_masuk_detail/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id_detail" name="id_detail">
                            
                            <div class="form-group">
                                <?php echo form_label('id_kas_masuk : ','id_kas_masuk',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_kas_masuk',set_value('id_kas_masuk', isset($default['id_kas_masuk']) ? $default['id_kas_masuk'] : ''),'id="id_kas_masuk" class="form-control" placeholder="Masukkan id_kas_masuk"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('faktur_kas : ','faktur_kas',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('faktur_kas',set_value('faktur_kas', isset($default['faktur_kas']) ? $default['faktur_kas'] : ''),'id="faktur_kas" class="form-control" placeholder="Masukkan faktur_kas"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('faktur_lawan : ','faktur_lawan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('faktur_lawan',set_value('faktur_lawan', isset($default['faktur_lawan']) ? $default['faktur_lawan'] : ''),'id="faktur_lawan" class="form-control" placeholder="Masukkan faktur_lawan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('no_perkiraan : ','no_perkiraan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('no_perkiraan',set_value('no_perkiraan', isset($default['no_perkiraan']) ? $default['no_perkiraan'] : ''),'id="no_perkiraan" class="form-control" placeholder="Masukkan no_perkiraan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('keterangan : ','keterangan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('keterangan',set_value('keterangan', isset($default['keterangan']) ? $default['keterangan'] : ''),'id="keterangan" class="form-control" placeholder="Masukkan keterangan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('nominal : ','nominal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nominal',set_value('nominal', isset($default['nominal']) ? $default['nominal'] : ''),'id="nominal" class="form-control" placeholder="Masukkan nominal"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('user_id : ','user_id',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('user_id',set_value('user_id', isset($default['user_id']) ? $default['user_id'] : ''),'id="user_id" class="form-control" placeholder="Masukkan user_id"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('status_kas : ','status_kas',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('status_kas',set_value('status_kas', isset($default['status_kas']) ? $default['status_kas'] : ''),'id="status_kas" class="form-control" placeholder="Masukkan status_kas"'); ?>
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
            


 