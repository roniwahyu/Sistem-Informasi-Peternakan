 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'sales_return_detail/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id_detail" name="id_detail">
                            
                            <div class="form-group">
                                <?php echo form_label('faktur_sr : ','faktur_sr',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('faktur_sr',set_value('faktur_sr', isset($default['faktur_sr']) ? $default['faktur_sr'] : ''),'id="faktur_sr" class="form-control" placeholder="Masukkan faktur_sr"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_sr : ','id_sr',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_sr',set_value('id_sr', isset($default['id_sr']) ? $default['id_sr'] : ''),'id="id_sr" class="form-control" placeholder="Masukkan id_sr"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_barang : ','id_barang',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_barang',set_value('id_barang', isset($default['id_barang']) ? $default['id_barang'] : ''),'id="id_barang" class="form-control" placeholder="Masukkan id_barang"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('harga_jual : ','harga_jual',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('harga_jual',set_value('harga_jual', isset($default['harga_jual']) ? $default['harga_jual'] : ''),'id="harga_jual" class="form-control" placeholder="Masukkan harga_jual"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('jumlah : ','jumlah',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('jumlah',set_value('jumlah', isset($default['jumlah']) ? $default['jumlah'] : ''),'id="jumlah" class="form-control" placeholder="Masukkan jumlah"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_satuan : ','id_satuan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_satuan',set_value('id_satuan', isset($default['id_satuan']) ? $default['id_satuan'] : ''),'id="id_satuan" class="form-control" placeholder="Masukkan id_satuan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('keterangan : ','keterangan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('keterangan',set_value('keterangan', isset($default['keterangan']) ? $default['keterangan'] : ''),'id="keterangan" class="form-control" placeholder="Masukkan keterangan"'); ?>
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
            


 