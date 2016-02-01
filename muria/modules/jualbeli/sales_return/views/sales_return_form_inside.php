 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'sales_return/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('faktur_sr : ','faktur_sr',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('faktur_sr',set_value('faktur_sr', isset($default['faktur_sr']) ? $default['faktur_sr'] : ''),'id="faktur_sr" class="form-control" placeholder="Masukkan faktur_sr"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_st : ','id_st',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_st',set_value('id_st', isset($default['id_st']) ? $default['id_st'] : ''),'id="id_st" class="form-control" placeholder="Masukkan id_st"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tgl_sr : ','tgl_sr',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tgl_sr',set_value('tgl_sr', isset($default['tgl_sr']) ? $default['tgl_sr'] : ''),'id="tgl_sr" class="form-control" placeholder="Masukkan tgl_sr"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tipe_retur : ','tipe_retur',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tipe_retur',set_value('tipe_retur', isset($default['tipe_retur']) ? $default['tipe_retur'] : ''),'id="tipe_retur" class="form-control" placeholder="Masukkan tipe_retur"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_customer : ','id_customer',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_customer',set_value('id_customer', isset($default['id_customer']) ? $default['id_customer'] : ''),'id="id_customer" class="form-control" placeholder="Masukkan id_customer"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('akun_piutang : ','akun_piutang',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('akun_piutang',set_value('akun_piutang', isset($default['akun_piutang']) ? $default['akun_piutang'] : ''),'id="akun_piutang" class="form-control" placeholder="Masukkan akun_piutang"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('totalretur : ','totalretur',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('totalretur',set_value('totalretur', isset($default['totalretur']) ? $default['totalretur'] : ''),'id="totalretur" class="form-control" placeholder="Masukkan totalretur"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('bayar : ','bayar',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('bayar',set_value('bayar', isset($default['bayar']) ? $default['bayar'] : ''),'id="bayar" class="form-control" placeholder="Masukkan bayar"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('biayakirim : ','biayakirim',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('biayakirim',set_value('biayakirim', isset($default['biayakirim']) ? $default['biayakirim'] : ''),'id="biayakirim" class="form-control" placeholder="Masukkan biayakirim"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('grandtotal : ','grandtotal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('grandtotal',set_value('grandtotal', isset($default['grandtotal']) ? $default['grandtotal'] : ''),'id="grandtotal" class="form-control" placeholder="Masukkan grandtotal"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('keterangan : ','keterangan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('keterangan',set_value('keterangan', isset($default['keterangan']) ? $default['keterangan'] : ''),'id="keterangan" class="form-control" placeholder="Masukkan keterangan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('is_trx : ','is_trx',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('is_trx',set_value('is_trx', isset($default['is_trx']) ? $default['is_trx'] : ''),'id="is_trx" class="form-control" placeholder="Masukkan is_trx"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('is_void : ','is_void',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('is_void',set_value('is_void', isset($default['is_void']) ? $default['is_void'] : ''),'id="is_void" class="form-control" placeholder="Masukkan is_void"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('is_jrnl : ','is_jrnl',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('is_jrnl',set_value('is_jrnl', isset($default['is_jrnl']) ? $default['is_jrnl'] : ''),'id="is_jrnl" class="form-control" placeholder="Masukkan is_jrnl"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('is_post : ','is_post',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('is_post',set_value('is_post', isset($default['is_post']) ? $default['is_post'] : ''),'id="is_post" class="form-control" placeholder="Masukkan is_post"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('date_posted : ','date_posted',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('date_posted',set_value('date_posted', isset($default['date_posted']) ? $default['date_posted'] : ''),'id="date_posted" class="form-control" placeholder="Masukkan date_posted"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_user : ','id_user',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_user',set_value('id_user', isset($default['id_user']) ? $default['id_user'] : ''),'id="id_user" class="form-control" placeholder="Masukkan id_user"'); ?>
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
            


 