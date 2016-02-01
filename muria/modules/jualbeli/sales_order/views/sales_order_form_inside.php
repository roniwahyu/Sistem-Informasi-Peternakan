 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'sales_order/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
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
                                <?php echo form_label('tgl_kedaluarsa : ','tgl_kedaluarsa',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tgl_kedaluarsa',set_value('tgl_kedaluarsa', isset($default['tgl_kedaluarsa']) ? $default['tgl_kedaluarsa'] : ''),'id="tgl_kedaluarsa" class="form-control" placeholder="Masukkan tgl_kedaluarsa"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tgl_terima : ','tgl_terima',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tgl_terima',set_value('tgl_terima', isset($default['tgl_terima']) ? $default['tgl_terima'] : ''),'id="tgl_terima" class="form-control" placeholder="Masukkan tgl_terima"'); ?>
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
                                <?php echo form_label('pajak : ','pajak',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('pajak',set_value('pajak', isset($default['pajak']) ? $default['pajak'] : ''),'id="pajak" class="form-control" placeholder="Masukkan pajak"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('total_pajak : ','total_pajak',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('total_pajak',set_value('total_pajak', isset($default['total_pajak']) ? $default['total_pajak'] : ''),'id="total_pajak" class="form-control" placeholder="Masukkan total_pajak"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('grandtotal : ','grandtotal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('grandtotal',set_value('grandtotal', isset($default['grandtotal']) ? $default['grandtotal'] : ''),'id="grandtotal" class="form-control" placeholder="Masukkan grandtotal"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('biaya_lain : ','biaya_lain',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('biaya_lain',set_value('biaya_lain', isset($default['biaya_lain']) ? $default['biaya_lain'] : ''),'id="biaya_lain" class="form-control" placeholder="Masukkan biaya_lain"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('status : ','status',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('status',set_value('status', isset($default['status']) ? $default['status'] : ''),'id="status" class="form-control" placeholder="Masukkan status"'); ?>
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
            


 