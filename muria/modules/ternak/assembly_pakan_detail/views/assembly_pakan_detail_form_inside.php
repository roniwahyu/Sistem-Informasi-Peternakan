 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'assembly_pakan_detail/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id_detail" name="id_detail">
                            
                            <div class="form-group">
                                <?php echo form_label('id_assembly : ','id_assembly',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_assembly',set_value('id_assembly', isset($default['id_assembly']) ? $default['id_assembly'] : ''),'id="id_assembly" class="form-control" placeholder="Masukkan id_assembly"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('faktur_assembly : ','faktur_assembly',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('faktur_assembly',set_value('faktur_assembly', isset($default['faktur_assembly']) ? $default['faktur_assembly'] : ''),'id="faktur_assembly" class="form-control" placeholder="Masukkan faktur_assembly"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_barang : ','id_barang',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_barang',set_value('id_barang', isset($default['id_barang']) ? $default['id_barang'] : ''),'id="id_barang" class="form-control" placeholder="Masukkan id_barang"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('jumlah_satuan : ','jumlah_satuan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('jumlah_satuan',set_value('jumlah_satuan', isset($default['jumlah_satuan']) ? $default['jumlah_satuan'] : ''),'id="jumlah_satuan" class="form-control" placeholder="Masukkan jumlah_satuan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('jumlah_total : ','jumlah_total',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('jumlah_total',set_value('jumlah_total', isset($default['jumlah_total']) ? $default['jumlah_total'] : ''),'id="jumlah_total" class="form-control" placeholder="Masukkan jumlah_total"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_satuan : ','id_satuan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_satuan',set_value('id_satuan', isset($default['id_satuan']) ? $default['id_satuan'] : ''),'id="id_satuan" class="form-control" placeholder="Masukkan id_satuan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('harga : ','harga',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('harga',set_value('harga', isset($default['harga']) ? $default['harga'] : ''),'id="harga" class="form-control" placeholder="Masukkan harga"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('subtotal : ','subtotal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('subtotal',set_value('subtotal', isset($default['subtotal']) ? $default['subtotal'] : ''),'id="subtotal" class="form-control" placeholder="Masukkan subtotal"'); ?>
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
            


 