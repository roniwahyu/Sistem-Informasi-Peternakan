 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'barang/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('Kode : ','Kode',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Kode',set_value('Kode', isset($default['Kode']) ? $default['Kode'] : ''),'id="Kode" class="form-control" placeholder="Masukkan Kode"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Cabang : ','Cabang',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Cabang',set_value('Cabang', isset($default['Cabang']) ? $default['Cabang'] : ''),'id="Cabang" class="form-control" placeholder="Masukkan Cabang"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Barcode : ','Barcode',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Barcode',set_value('Barcode', isset($default['Barcode']) ? $default['Barcode'] : ''),'id="Barcode" class="form-control" placeholder="Masukkan Barcode"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Nama : ','Nama',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Nama',set_value('Nama', isset($default['Nama']) ? $default['Nama'] : ''),'id="Nama" class="form-control" placeholder="Masukkan Nama"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Keterangan : ','Keterangan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Keterangan',set_value('Keterangan', isset($default['Keterangan']) ? $default['Keterangan'] : ''),'id="Keterangan" class="form-control" placeholder="Masukkan Keterangan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_golongan : ','id_golongan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_golongan',set_value('id_golongan', isset($default['id_golongan']) ? $default['id_golongan'] : ''),'id="id_golongan" class="form-control" placeholder="Masukkan id_golongan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Kemasan : ','Kemasan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Kemasan',set_value('Kemasan', isset($default['Kemasan']) ? $default['Kemasan'] : ''),'id="Kemasan" class="form-control" placeholder="Masukkan Kemasan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Isi2 : ','Isi2',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Isi2',set_value('Isi2', isset($default['Isi2']) ? $default['Isi2'] : ''),'id="Isi2" class="form-control" placeholder="Masukkan Isi2"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Isi3 : ','Isi3',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Isi3',set_value('Isi3', isset($default['Isi3']) ? $default['Isi3'] : ''),'id="Isi3" class="form-control" placeholder="Masukkan Isi3"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('StKon : ','StKon',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('StKon',set_value('StKon', isset($default['StKon']) ? $default['StKon'] : ''),'id="StKon" class="form-control" placeholder="Masukkan StKon"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_supplier : ','id_supplier',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_supplier',set_value('id_supplier', isset($default['id_supplier']) ? $default['id_supplier'] : ''),'id="id_supplier" class="form-control" placeholder="Masukkan id_supplier"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('User : ','User',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('User',set_value('User', isset($default['User']) ? $default['User'] : ''),'id="User" class="form-control" placeholder="Masukkan User"'); ?>
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
            


 