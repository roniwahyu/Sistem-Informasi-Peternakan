 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'bank/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('bukti_bank : ','bukti_bank',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('bukti_bank',set_value('bukti_bank', isset($default['bukti_bank']) ? $default['bukti_bank'] : ''),'id="bukti_bank" class="form-control" placeholder="Masukkan bukti_bank"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tipe_trx : ','tipe_trx',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tipe_trx',set_value('tipe_trx', isset($default['tipe_trx']) ? $default['tipe_trx'] : ''),'id="tipe_trx" class="form-control" placeholder="Masukkan tipe_trx"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('akun_bank : ','akun_bank',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('akun_bank',set_value('akun_bank', isset($default['akun_bank']) ? $default['akun_bank'] : ''),'id="akun_bank" class="form-control" placeholder="Masukkan akun_bank"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_bank : ','id_bank',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_bank',set_value('id_bank', isset($default['id_bank']) ? $default['id_bank'] : ''),'id="id_bank" class="form-control" placeholder="Masukkan id_bank"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_supplier : ','id_supplier',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_supplier',set_value('id_supplier', isset($default['id_supplier']) ? $default['id_supplier'] : ''),'id="id_supplier" class="form-control" placeholder="Masukkan id_supplier"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_customer : ','id_customer',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_customer',set_value('id_customer', isset($default['id_customer']) ? $default['id_customer'] : ''),'id="id_customer" class="form-control" placeholder="Masukkan id_customer"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tgl_bank : ','tgl_bank',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tgl_bank',set_value('tgl_bank', isset($default['tgl_bank']) ? $default['tgl_bank'] : ''),'id="tgl_bank" class="form-control" placeholder="Masukkan tgl_bank"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('keterangan : ','keterangan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('keterangan',set_value('keterangan', isset($default['keterangan']) ? $default['keterangan'] : ''),'id="keterangan" class="form-control" placeholder="Masukkan keterangan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('total_bank : ','total_bank',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('total_bank',set_value('total_bank', isset($default['total_bank']) ? $default['total_bank'] : ''),'id="total_bank" class="form-control" placeholder="Masukkan total_bank"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('total_giro : ','total_giro',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('total_giro',set_value('total_giro', isset($default['total_giro']) ? $default['total_giro'] : ''),'id="total_giro" class="form-control" placeholder="Masukkan total_giro"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('ref : ','ref',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('ref',set_value('ref', isset($default['ref']) ? $default['ref'] : ''),'id="ref" class="form-control" placeholder="Masukkan ref"'); ?>
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
            


 