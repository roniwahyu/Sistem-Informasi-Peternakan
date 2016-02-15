 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'sales_trx/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('faktur : ','faktur',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('faktur',set_value('faktur', isset($default['faktur']) ? $default['faktur'] : ''),'id="faktur" class="form-control" placeholder="Masukkan faktur"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tgl : ','tgl',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tgl',set_value('tgl', isset($default['tgl']) ? $default['tgl'] : ''),'id="tgl" class="form-control" placeholder="Masukkan tgl"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_so : ','id_so',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_so',set_value('id_so', isset($default['id_so']) ? $default['id_so'] : ''),'id="id_so" class="form-control" placeholder="Masukkan id_so"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('termin : ','termin',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('termin',set_value('termin', isset($default['termin']) ? $default['termin'] : ''),'id="termin" class="form-control" placeholder="Masukkan termin"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_customer : ','id_customer',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_customer',set_value('id_customer', isset($default['id_customer']) ? $default['id_customer'] : ''),'id="id_customer" class="form-control" placeholder="Masukkan id_customer"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_sales : ','id_sales',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_sales',set_value('id_sales', isset($default['id_sales']) ? $default['id_sales'] : ''),'id="id_sales" class="form-control" placeholder="Masukkan id_sales"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('akun_piutang : ','akun_piutang',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('akun_piutang',set_value('akun_piutang', isset($default['akun_piutang']) ? $default['akun_piutang'] : ''),'id="akun_piutang" class="form-control" placeholder="Masukkan akun_piutang"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('keterangan : ','keterangan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('keterangan',set_value('keterangan', isset($default['keterangan']) ? $default['keterangan'] : ''),'id="keterangan" class="form-control" placeholder="Masukkan keterangan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('ref : ','ref',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('ref',set_value('ref', isset($default['ref']) ? $default['ref'] : ''),'id="ref" class="form-control" placeholder="Masukkan ref"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_shipping : ','id_shipping',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_shipping',set_value('id_shipping', isset($default['id_shipping']) ? $default['id_shipping'] : ''),'id="id_shipping" class="form-control" placeholder="Masukkan id_shipping"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_bayar : ','id_bayar',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_bayar',set_value('id_bayar', isset($default['id_bayar']) ? $default['id_bayar'] : ''),'id="id_bayar" class="form-control" placeholder="Masukkan id_bayar"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('totalbayar : ','totalbayar',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('totalbayar',set_value('totalbayar', isset($default['totalbayar']) ? $default['totalbayar'] : ''),'id="totalbayar" class="form-control" placeholder="Masukkan totalbayar"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('uangmuka : ','uangmuka',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('uangmuka',set_value('uangmuka', isset($default['uangmuka']) ? $default['uangmuka'] : ''),'id="uangmuka" class="form-control" placeholder="Masukkan uangmuka"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('biayakirim : ','biayakirim',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('biayakirim',set_value('biayakirim', isset($default['biayakirim']) ? $default['biayakirim'] : ''),'id="biayakirim" class="form-control" placeholder="Masukkan biayakirim"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('ppn : ','ppn',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('ppn',set_value('ppn', isset($default['ppn']) ? $default['ppn'] : ''),'id="ppn" class="form-control" placeholder="Masukkan ppn"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('grandtotal : ','grandtotal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('grandtotal',set_value('grandtotal', isset($default['grandtotal']) ? $default['grandtotal'] : ''),'id="grandtotal" class="form-control" placeholder="Masukkan grandtotal"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('status : ','status',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('status',set_value('status', isset($default['status']) ? $default['status'] : ''),'id="status" class="form-control" placeholder="Masukkan status"'); ?>
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
            


 