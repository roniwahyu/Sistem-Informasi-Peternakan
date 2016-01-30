 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'bank_detail/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id_detail" name="id_detail">
                            
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
                                <?php echo form_label('akun_debet : ','akun_debet',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('akun_debet',set_value('akun_debet', isset($default['akun_debet']) ? $default['akun_debet'] : ''),'id="akun_debet" class="form-control" placeholder="Masukkan akun_debet"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('akun_kredit : ','akun_kredit',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('akun_kredit',set_value('akun_kredit', isset($default['akun_kredit']) ? $default['akun_kredit'] : ''),'id="akun_kredit" class="form-control" placeholder="Masukkan akun_kredit"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('faktur_lawan : ','faktur_lawan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('faktur_lawan',set_value('faktur_lawan', isset($default['faktur_lawan']) ? $default['faktur_lawan'] : ''),'id="faktur_lawan" class="form-control" placeholder="Masukkan faktur_lawan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('akun_lawan : ','akun_lawan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('akun_lawan',set_value('akun_lawan', isset($default['akun_lawan']) ? $default['akun_lawan'] : ''),'id="akun_lawan" class="form-control" placeholder="Masukkan akun_lawan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('nominal_detail : ','nominal_detail',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nominal_detail',set_value('nominal_detail', isset($default['nominal_detail']) ? $default['nominal_detail'] : ''),'id="nominal_detail" class="form-control" placeholder="Masukkan nominal_detail"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('keterangan_detail : ','keterangan_detail',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('keterangan_detail',set_value('keterangan_detail', isset($default['keterangan_detail']) ? $default['keterangan_detail'] : ''),'id="keterangan_detail" class="form-control" placeholder="Masukkan keterangan_detail"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('status_detail : ','status_detail',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('status_detail',set_value('status_detail', isset($default['status_detail']) ? $default['status_detail'] : ''),'id="status_detail" class="form-control" placeholder="Masukkan status_detail"'); ?>
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
            


 