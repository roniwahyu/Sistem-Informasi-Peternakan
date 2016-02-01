 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'sales_quote/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('faktur : ','faktur',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('faktur',set_value('faktur', isset($default['faktur']) ? $default['faktur'] : ''),'id="faktur" class="form-control" placeholder="Masukkan faktur"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tanggal : ','tanggal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tanggal',set_value('tanggal', isset($default['tanggal']) ? $default['tanggal'] : ''),'id="tanggal" class="form-control" placeholder="Masukkan tanggal"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('kedaluarsa : ','kedaluarsa',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kedaluarsa',set_value('kedaluarsa', isset($default['kedaluarsa']) ? $default['kedaluarsa'] : ''),'id="kedaluarsa" class="form-control" placeholder="Masukkan kedaluarsa"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_customer : ','id_customer',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_customer',set_value('id_customer', isset($default['id_customer']) ? $default['id_customer'] : ''),'id="id_customer" class="form-control" placeholder="Masukkan id_customer"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('kepada : ','kepada',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kepada',set_value('kepada', isset($default['kepada']) ? $default['kepada'] : ''),'id="kepada" class="form-control" placeholder="Masukkan kepada"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('alamat : ','alamat',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('alamat',set_value('alamat', isset($default['alamat']) ? $default['alamat'] : ''),'id="alamat" class="form-control" placeholder="Masukkan alamat"'); ?>
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
                                <?php echo form_label('status : ','status',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('status',set_value('status', isset($default['status']) ? $default['status'] : ''),'id="status" class="form-control" placeholder="Masukkan status"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('diskon1 : ','diskon1',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('diskon1',set_value('diskon1', isset($default['diskon1']) ? $default['diskon1'] : ''),'id="diskon1" class="form-control" placeholder="Masukkan diskon1"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('diskon2 : ','diskon2',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('diskon2',set_value('diskon2', isset($default['diskon2']) ? $default['diskon2'] : ''),'id="diskon2" class="form-control" placeholder="Masukkan diskon2"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('pajak1 : ','pajak1',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('pajak1',set_value('pajak1', isset($default['pajak1']) ? $default['pajak1'] : ''),'id="pajak1" class="form-control" placeholder="Masukkan pajak1"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('pajak2 : ','pajak2',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('pajak2',set_value('pajak2', isset($default['pajak2']) ? $default['pajak2'] : ''),'id="pajak2" class="form-control" placeholder="Masukkan pajak2"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('grandtotal : ','grandtotal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('grandtotal',set_value('grandtotal', isset($default['grandtotal']) ? $default['grandtotal'] : ''),'id="grandtotal" class="form-control" placeholder="Masukkan grandtotal"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('is_approved : ','is_approved',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('is_approved',set_value('is_approved', isset($default['is_approved']) ? $default['is_approved'] : ''),'id="is_approved" class="form-control" placeholder="Masukkan is_approved"'); ?>
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
            


 