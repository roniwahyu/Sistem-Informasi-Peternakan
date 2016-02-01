 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'kartustok/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('faktur : ','faktur',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('faktur',set_value('faktur', isset($default['faktur']) ? $default['faktur'] : ''),'id="faktur" class="form-control" placeholder="Masukkan faktur"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('faktur_ref : ','faktur_ref',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('faktur_ref',set_value('faktur_ref', isset($default['faktur_ref']) ? $default['faktur_ref'] : ''),'id="faktur_ref" class="form-control" placeholder="Masukkan faktur_ref"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tanggal : ','tanggal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tanggal',set_value('tanggal', isset($default['tanggal']) ? $default['tanggal'] : ''),'id="tanggal" class="form-control" placeholder="Masukkan tanggal"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('akun : ','akun',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('akun',set_value('akun', isset($default['akun']) ? $default['akun'] : ''),'id="akun" class="form-control" placeholder="Masukkan akun"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tipe_kartustok : ','tipe_kartustok',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tipe_kartustok',set_value('tipe_kartustok', isset($default['tipe_kartustok']) ? $default['tipe_kartustok'] : ''),'id="tipe_kartustok" class="form-control" placeholder="Masukkan tipe_kartustok"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tipe : ','tipe',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tipe',set_value('tipe', isset($default['tipe']) ? $default['tipe'] : ''),'id="tipe" class="form-control" placeholder="Masukkan tipe"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('jumlah : ','jumlah',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('jumlah',set_value('jumlah', isset($default['jumlah']) ? $default['jumlah'] : ''),'id="jumlah" class="form-control" placeholder="Masukkan jumlah"'); ?>
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
                                <?php echo form_label('debet : ','debet',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('debet',set_value('debet', isset($default['debet']) ? $default['debet'] : ''),'id="debet" class="form-control" placeholder="Masukkan debet"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('kredit : ','kredit',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kredit',set_value('kredit', isset($default['kredit']) ? $default['kredit'] : ''),'id="kredit" class="form-control" placeholder="Masukkan kredit"'); ?>
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
            


 