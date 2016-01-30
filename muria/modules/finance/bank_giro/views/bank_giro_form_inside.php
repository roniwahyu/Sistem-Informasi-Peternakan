 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'bank_giro/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('id_trx_bank : ','id_trx_bank',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_trx_bank',set_value('id_trx_bank', isset($default['id_trx_bank']) ? $default['id_trx_bank'] : ''),'id="id_trx_bank" class="form-control" placeholder="Masukkan id_trx_bank"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('bukti_bank : ','bukti_bank',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('bukti_bank',set_value('bukti_bank', isset($default['bukti_bank']) ? $default['bukti_bank'] : ''),'id="bukti_bank" class="form-control" placeholder="Masukkan bukti_bank"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tipe_tt_giro : ','tipe_tt_giro',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tipe_tt_giro',set_value('tipe_tt_giro', isset($default['tipe_tt_giro']) ? $default['tipe_tt_giro'] : ''),'id="tipe_tt_giro" class="form-control" placeholder="Masukkan tipe_tt_giro"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('no_tt_giro : ','no_tt_giro',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('no_tt_giro',set_value('no_tt_giro', isset($default['no_tt_giro']) ? $default['no_tt_giro'] : ''),'id="no_tt_giro" class="form-control" placeholder="Masukkan no_tt_giro"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tgl_tt_giro : ','tgl_tt_giro',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tgl_tt_giro',set_value('tgl_tt_giro', isset($default['tgl_tt_giro']) ? $default['tgl_tt_giro'] : ''),'id="tgl_tt_giro" class="form-control" placeholder="Masukkan tgl_tt_giro"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('nominal : ','nominal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nominal',set_value('nominal', isset($default['nominal']) ? $default['nominal'] : ''),'id="nominal" class="form-control" placeholder="Masukkan nominal"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('keterangan : ','keterangan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('keterangan',set_value('keterangan', isset($default['keterangan']) ? $default['keterangan'] : ''),'id="keterangan" class="form-control" placeholder="Masukkan keterangan"'); ?>
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
            


 