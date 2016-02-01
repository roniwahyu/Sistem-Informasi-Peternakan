 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'purchase_request/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
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
                                <?php echo form_label('tanggal_tempo : ','tanggal_tempo',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tanggal_tempo',set_value('tanggal_tempo', isset($default['tanggal_tempo']) ? $default['tanggal_tempo'] : ''),'id="tanggal_tempo" class="form-control" placeholder="Masukkan tanggal_tempo"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_mitra : ','id_mitra',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_mitra',set_value('id_mitra', isset($default['id_mitra']) ? $default['id_mitra'] : ''),'id="id_mitra" class="form-control" placeholder="Masukkan id_mitra"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_gudang : ','id_gudang',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_gudang',set_value('id_gudang', isset($default['id_gudang']) ? $default['id_gudang'] : ''),'id="id_gudang" class="form-control" placeholder="Masukkan id_gudang"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_kandang : ','id_kandang',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_kandang',set_value('id_kandang', isset($default['id_kandang']) ? $default['id_kandang'] : ''),'id="id_kandang" class="form-control" placeholder="Masukkan id_kandang"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('keterangan : ','keterangan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('keterangan',set_value('keterangan', isset($default['keterangan']) ? $default['keterangan'] : ''),'id="keterangan" class="form-control" placeholder="Masukkan keterangan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('catatan : ','catatan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('catatan',set_value('catatan', isset($default['catatan']) ? $default['catatan'] : ''),'id="catatan" class="form-control" placeholder="Masukkan catatan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('user_id : ','user_id',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('user_id',set_value('user_id', isset($default['user_id']) ? $default['user_id'] : ''),'id="user_id" class="form-control" placeholder="Masukkan user_id"'); ?>
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
            


 