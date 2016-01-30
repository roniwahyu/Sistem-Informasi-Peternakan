 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'jurnal/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('no_jurnal : ','no_jurnal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('no_jurnal',set_value('no_jurnal', isset($default['no_jurnal']) ? $default['no_jurnal'] : ''),'id="no_jurnal" class="form-control" placeholder="Masukkan no_jurnal"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('no_bukti : ','no_bukti',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('no_bukti',set_value('no_bukti', isset($default['no_bukti']) ? $default['no_bukti'] : ''),'id="no_bukti" class="form-control" placeholder="Masukkan no_bukti"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('jurnal_group : ','jurnal_group',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('jurnal_group',set_value('jurnal_group', isset($default['jurnal_group']) ? $default['jurnal_group'] : ''),'id="jurnal_group" class="form-control" placeholder="Masukkan jurnal_group"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tgl : ','tgl',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tgl',set_value('tgl', isset($default['tgl']) ? $default['tgl'] : ''),'id="tgl" class="form-control" placeholder="Masukkan tgl"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('ket : ','ket',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('ket',set_value('ket', isset($default['ket']) ? $default['ket'] : ''),'id="ket" class="form-control" placeholder="Masukkan ket"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('ref : ','ref',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('ref',set_value('ref', isset($default['ref']) ? $default['ref'] : ''),'id="ref" class="form-control" placeholder="Masukkan ref"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('akun_jurnal : ','akun_jurnal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('akun_jurnal',set_value('akun_jurnal', isset($default['akun_jurnal']) ? $default['akun_jurnal'] : ''),'id="akun_jurnal" class="form-control" placeholder="Masukkan akun_jurnal"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('total_debet : ','total_debet',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('total_debet',set_value('total_debet', isset($default['total_debet']) ? $default['total_debet'] : ''),'id="total_debet" class="form-control" placeholder="Masukkan total_debet"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('total_kredit : ','total_kredit',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('total_kredit',set_value('total_kredit', isset($default['total_kredit']) ? $default['total_kredit'] : ''),'id="total_kredit" class="form-control" placeholder="Masukkan total_kredit"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('status : ','status',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('status',set_value('status', isset($default['status']) ? $default['status'] : ''),'id="status" class="form-control" placeholder="Masukkan status"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('is_jrnl : ','is_jrnl',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('is_jrnl',set_value('is_jrnl', isset($default['is_jrnl']) ? $default['is_jrnl'] : ''),'id="is_jrnl" class="form-control" placeholder="Masukkan is_jrnl"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('is_void : ','is_void',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('is_void',set_value('is_void', isset($default['is_void']) ? $default['is_void'] : ''),'id="is_void" class="form-control" placeholder="Masukkan is_void"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('from_trx : ','from_trx',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('from_trx',set_value('from_trx', isset($default['from_trx']) ? $default['from_trx'] : ''),'id="from_trx" class="form-control" placeholder="Masukkan from_trx"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('is_posted : ','is_posted',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('is_posted',set_value('is_posted', isset($default['is_posted']) ? $default['is_posted'] : ''),'id="is_posted" class="form-control" placeholder="Masukkan is_posted"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tgl_posted : ','tgl_posted',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tgl_posted',set_value('tgl_posted', isset($default['tgl_posted']) ? $default['tgl_posted'] : ''),'id="tgl_posted" class="form-control" placeholder="Masukkan tgl_posted"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('is_cancel : ','is_cancel',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('is_cancel',set_value('is_cancel', isset($default['is_cancel']) ? $default['is_cancel'] : ''),'id="is_cancel" class="form-control" placeholder="Masukkan is_cancel"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tgl_cancel : ','tgl_cancel',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tgl_cancel',set_value('tgl_cancel', isset($default['tgl_cancel']) ? $default['tgl_cancel'] : ''),'id="tgl_cancel" class="form-control" placeholder="Masukkan tgl_cancel"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('alasan : ','alasan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('alasan',set_value('alasan', isset($default['alasan']) ? $default['alasan'] : ''),'id="alasan" class="form-control" placeholder="Masukkan alasan"'); ?>
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
            


 