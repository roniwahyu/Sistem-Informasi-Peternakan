 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'delivery_order/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('faktur : ','faktur',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('faktur',set_value('faktur', isset($default['faktur']) ? $default['faktur'] : ''),'id="faktur" class="form-control" placeholder="Masukkan faktur"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('faktur_reff : ','faktur_reff',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('faktur_reff',set_value('faktur_reff', isset($default['faktur_reff']) ? $default['faktur_reff'] : ''),'id="faktur_reff" class="form-control" placeholder="Masukkan faktur_reff"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('faktur_po : ','faktur_po',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('faktur_po',set_value('faktur_po', isset($default['faktur_po']) ? $default['faktur_po'] : ''),'id="faktur_po" class="form-control" placeholder="Masukkan faktur_po"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_customer : ','id_customer',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_customer',set_value('id_customer', isset($default['id_customer']) ? $default['id_customer'] : ''),'id="id_customer" class="form-control" placeholder="Masukkan id_customer"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tanggal : ','tanggal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tanggal',set_value('tanggal', isset($default['tanggal']) ? $default['tanggal'] : ''),'id="tanggal" class="form-control" placeholder="Masukkan tanggal"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tanggal_kirim : ','tanggal_kirim',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tanggal_kirim',set_value('tanggal_kirim', isset($default['tanggal_kirim']) ? $default['tanggal_kirim'] : ''),'id="tanggal_kirim" class="form-control" placeholder="Masukkan tanggal_kirim"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('kirim_via : ','kirim_via',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kirim_via',set_value('kirim_via', isset($default['kirim_via']) ? $default['kirim_via'] : ''),'id="kirim_via" class="form-control" placeholder="Masukkan kirim_via"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('keterangan : ','keterangan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('keterangan',set_value('keterangan', isset($default['keterangan']) ? $default['keterangan'] : ''),'id="keterangan" class="form-control" placeholder="Masukkan keterangan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('alamat_kirim : ','alamat_kirim',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('alamat_kirim',set_value('alamat_kirim', isset($default['alamat_kirim']) ? $default['alamat_kirim'] : ''),'id="alamat_kirim" class="form-control" placeholder="Masukkan alamat_kirim"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('alamat_tagihan : ','alamat_tagihan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('alamat_tagihan',set_value('alamat_tagihan', isset($default['alamat_tagihan']) ? $default['alamat_tagihan'] : ''),'id="alamat_tagihan" class="form-control" placeholder="Masukkan alamat_tagihan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('biaya_id : ','biaya_id',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('biaya_id',set_value('biaya_id', isset($default['biaya_id']) ? $default['biaya_id'] : ''),'id="biaya_id" class="form-control" placeholder="Masukkan biaya_id"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('biaya_kirim : ','biaya_kirim',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('biaya_kirim',set_value('biaya_kirim', isset($default['biaya_kirim']) ? $default['biaya_kirim'] : ''),'id="biaya_kirim" class="form-control" placeholder="Masukkan biaya_kirim"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('armada_id : ','armada_id',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('armada_id',set_value('armada_id', isset($default['armada_id']) ? $default['armada_id'] : ''),'id="armada_id" class="form-control" placeholder="Masukkan armada_id"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('is_approved : ','is_approved',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('is_approved',set_value('is_approved', isset($default['is_approved']) ? $default['is_approved'] : ''),'id="is_approved" class="form-control" placeholder="Masukkan is_approved"'); ?>
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
            


 