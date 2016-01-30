 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'jurnal_detail/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id_detail" name="id_detail">
                            
                            <div class="form-group">
                                <?php echo form_label('id_jurnal : ','id_jurnal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_jurnal',set_value('id_jurnal', isset($default['id_jurnal']) ? $default['id_jurnal'] : ''),'id="id_jurnal" class="form-control" placeholder="Masukkan id_jurnal"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('no_jurnal : ','no_jurnal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('no_jurnal',set_value('no_jurnal', isset($default['no_jurnal']) ? $default['no_jurnal'] : ''),'id="no_jurnal" class="form-control" placeholder="Masukkan no_jurnal"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('akun_detail : ','akun_detail',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('akun_detail',set_value('akun_detail', isset($default['akun_detail']) ? $default['akun_detail'] : ''),'id="akun_detail" class="form-control" placeholder="Masukkan akun_detail"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tipe_detail : ','tipe_detail',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tipe_detail',set_value('tipe_detail', isset($default['tipe_detail']) ? $default['tipe_detail'] : ''),'id="tipe_detail" class="form-control" placeholder="Masukkan tipe_detail"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('ket_detail : ','ket_detail',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('ket_detail',set_value('ket_detail', isset($default['ket_detail']) ? $default['ket_detail'] : ''),'id="ket_detail" class="form-control" placeholder="Masukkan ket_detail"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('nilai : ','nilai',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nilai',set_value('nilai', isset($default['nilai']) ? $default['nilai'] : ''),'id="nilai" class="form-control" placeholder="Masukkan nilai"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('no_urut : ','no_urut',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('no_urut',set_value('no_urut', isset($default['no_urut']) ? $default['no_urut'] : ''),'id="no_urut" class="form-control" placeholder="Masukkan no_urut"'); ?>
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
            


 