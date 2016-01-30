 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'formulasi/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('tanggal : ','tanggal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tanggal',set_value('tanggal', isset($default['tanggal']) ? $default['tanggal'] : ''),'id="tanggal" class="form-control" placeholder="Masukkan tanggal"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('nama : ','nama',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nama',set_value('nama', isset($default['nama']) ? $default['nama'] : ''),'id="nama" class="form-control" placeholder="Masukkan nama"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('keterangan : ','keterangan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('keterangan',set_value('keterangan', isset($default['keterangan']) ? $default['keterangan'] : ''),'id="keterangan" class="form-control" placeholder="Masukkan keterangan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_mitra : ','id_mitra',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_mitra',set_value('id_mitra', isset($default['id_mitra']) ? $default['id_mitra'] : ''),'id="id_mitra" class="form-control" placeholder="Masukkan id_mitra"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_kandang : ','id_kandang',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_kandang',set_value('id_kandang', isset($default['id_kandang']) ? $default['id_kandang'] : ''),'id="id_kandang" class="form-control" placeholder="Masukkan id_kandang"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_gudang : ','id_gudang',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_gudang',set_value('id_gudang', isset($default['id_gudang']) ? $default['id_gudang'] : ''),'id="id_gudang" class="form-control" placeholder="Masukkan id_gudang"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_layer : ','id_layer',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_layer',set_value('id_layer', isset($default['id_layer']) ? $default['id_layer'] : ''),'id="id_layer" class="form-control" placeholder="Masukkan id_layer"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_strain : ','id_strain',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_strain',set_value('id_strain', isset($default['id_strain']) ? $default['id_strain'] : ''),'id="id_strain" class="form-control" placeholder="Masukkan id_strain"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_grade : ','id_grade',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_grade',set_value('id_grade', isset($default['id_grade']) ? $default['id_grade'] : ''),'id="id_grade" class="form-control" placeholder="Masukkan id_grade"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('jml_hasil_prediksi : ','jml_hasil_prediksi',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('jml_hasil_prediksi',set_value('jml_hasil_prediksi', isset($default['jml_hasil_prediksi']) ? $default['jml_hasil_prediksi'] : ''),'id="jml_hasil_prediksi" class="form-control" placeholder="Masukkan jml_hasil_prediksi"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('jml_hasil_jadi : ','jml_hasil_jadi',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('jml_hasil_jadi',set_value('jml_hasil_jadi', isset($default['jml_hasil_jadi']) ? $default['jml_hasil_jadi'] : ''),'id="jml_hasil_jadi" class="form-control" placeholder="Masukkan jml_hasil_jadi"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('satuan_jadi : ','satuan_jadi',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('satuan_jadi',set_value('satuan_jadi', isset($default['satuan_jadi']) ? $default['satuan_jadi'] : ''),'id="satuan_jadi" class="form-control" placeholder="Masukkan satuan_jadi"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('umur : ','umur',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('umur',set_value('umur', isset($default['umur']) ? $default['umur'] : ''),'id="umur" class="form-control" placeholder="Masukkan umur"'); ?>
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
            


 