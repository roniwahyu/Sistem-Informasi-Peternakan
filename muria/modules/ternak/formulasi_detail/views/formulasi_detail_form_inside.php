 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'formulasi_detail/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id_detail" name="id_detail">
                            
                            <div class="form-group">
                                <?php echo form_label('id_formulasi : ','id_formulasi',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_formulasi',set_value('id_formulasi', isset($default['id_formulasi']) ? $default['id_formulasi'] : ''),'id="id_formulasi" class="form-control" placeholder="Masukkan id_formulasi"'); ?>
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
                                <?php echo form_label('prosentase : ','prosentase',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('prosentase',set_value('prosentase', isset($default['prosentase']) ? $default['prosentase'] : ''),'id="prosentase" class="form-control" placeholder="Masukkan prosentase"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('jml_form_jadi : ','jml_form_jadi',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('jml_form_jadi',set_value('jml_form_jadi', isset($default['jml_form_jadi']) ? $default['jml_form_jadi'] : ''),'id="jml_form_jadi" class="form-control" placeholder="Masukkan jml_form_jadi"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('jml_fakta_jadi : ','jml_fakta_jadi',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('jml_fakta_jadi',set_value('jml_fakta_jadi', isset($default['jml_fakta_jadi']) ? $default['jml_fakta_jadi'] : ''),'id="jml_fakta_jadi" class="form-control" placeholder="Masukkan jml_fakta_jadi"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('satuan_jadi : ','satuan_jadi',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('satuan_jadi',set_value('satuan_jadi', isset($default['satuan_jadi']) ? $default['satuan_jadi'] : ''),'id="satuan_jadi" class="form-control" placeholder="Masukkan satuan_jadi"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('keterangan : ','keterangan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('keterangan',set_value('keterangan', isset($default['keterangan']) ? $default['keterangan'] : ''),'id="keterangan" class="form-control" placeholder="Masukkan keterangan"'); ?>
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
            


 