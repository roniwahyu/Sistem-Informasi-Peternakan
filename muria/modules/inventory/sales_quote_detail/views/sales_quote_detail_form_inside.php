 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'sales_quote_detail/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id_detail" name="id_detail">
                            
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
                                <?php echo form_label('id_barang : ','id_barang',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_barang',set_value('id_barang', isset($default['id_barang']) ? $default['id_barang'] : ''),'id="id_barang" class="form-control" placeholder="Masukkan id_barang"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_satuan : ','id_satuan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_satuan',set_value('id_satuan', isset($default['id_satuan']) ? $default['id_satuan'] : ''),'id="id_satuan" class="form-control" placeholder="Masukkan id_satuan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('jumlah : ','jumlah',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('jumlah',set_value('jumlah', isset($default['jumlah']) ? $default['jumlah'] : ''),'id="jumlah" class="form-control" placeholder="Masukkan jumlah"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('jumlah_pesanan : ','jumlah_pesanan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('jumlah_pesanan',set_value('jumlah_pesanan', isset($default['jumlah_pesanan']) ? $default['jumlah_pesanan'] : ''),'id="jumlah_pesanan" class="form-control" placeholder="Masukkan jumlah_pesanan"'); ?>
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
            


 