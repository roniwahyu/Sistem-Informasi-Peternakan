 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'sales_trx_detail/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id_detail" name="id_detail">
                            
                            <div class="form-group">
                                <?php echo form_label('faktur : ','faktur',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('faktur',set_value('faktur', isset($default['faktur']) ? $default['faktur'] : ''),'id="faktur" class="form-control" placeholder="Masukkan faktur"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_st : ','id_st',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_st',set_value('id_st', isset($default['id_st']) ? $default['id_st'] : ''),'id="id_st" class="form-control" placeholder="Masukkan id_st"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_barang : ','id_barang',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_barang',set_value('id_barang', isset($default['id_barang']) ? $default['id_barang'] : ''),'id="id_barang" class="form-control" placeholder="Masukkan id_barang"'); ?>
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
                                <?php echo form_label('harga_jual : ','harga_jual',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('harga_jual',set_value('harga_jual', isset($default['harga_jual']) ? $default['harga_jual'] : ''),'id="harga_jual" class="form-control" placeholder="Masukkan harga_jual"'); ?>
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
                                <?php echo form_label('diskon3 : ','diskon3',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('diskon3',set_value('diskon3', isset($default['diskon3']) ? $default['diskon3'] : ''),'id="diskon3" class="form-control" placeholder="Masukkan diskon3"'); ?>
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
            


 