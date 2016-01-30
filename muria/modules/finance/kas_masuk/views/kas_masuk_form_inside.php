 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'kas_masuk/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('nomor : ','nomor',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nomor',set_value('nomor', isset($default['nomor']) ? $default['nomor'] : ''),'id="nomor" class="form-control" placeholder="Masukkan nomor"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tgl_kas : ','tgl_kas',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tgl_kas',set_value('tgl_kas', isset($default['tgl_kas']) ? $default['tgl_kas'] : ''),'id="tgl_kas" class="form-control" placeholder="Masukkan tgl_kas"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('akun_kas : ','akun_kas',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('akun_kas',set_value('akun_kas', isset($default['akun_kas']) ? $default['akun_kas'] : ''),'id="akun_kas" class="form-control" placeholder="Masukkan akun_kas"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_customer : ','id_customer',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_customer',set_value('id_customer', isset($default['id_customer']) ? $default['id_customer'] : ''),'id="id_customer" class="form-control" placeholder="Masukkan id_customer"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('ref : ','ref',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('ref',set_value('ref', isset($default['ref']) ? $default['ref'] : ''),'id="ref" class="form-control" placeholder="Masukkan ref"'); ?>
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
                                <?php echo form_label('is_jurnal : ','is_jurnal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('is_jurnal',set_value('is_jurnal', isset($default['is_jurnal']) ? $default['is_jurnal'] : ''),'id="is_jurnal" class="form-control" placeholder="Masukkan is_jurnal"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('is_trx : ','is_trx',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('is_trx',set_value('is_trx', isset($default['is_trx']) ? $default['is_trx'] : ''),'id="is_trx" class="form-control" placeholder="Masukkan is_trx"'); ?>
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
            


 