 
<!-- <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 kelola" style="display:none"> -->
                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'karyawan/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                                
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="Kode" name="Kode">
                            
                            <div class="form-group">
                                <?php echo form_label('Nama : ','Nama',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Nama','','id="Nama" class="form-control" placeholder="Enter Nama"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Alamat : ','Alamat',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Alamat','','id="Alamat" class="form-control" placeholder="Enter Alamat"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('TempatLahir : ','TempatLahir',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('TempatLahir','','id="TempatLahir" class="form-control" placeholder="Enter TempatLahir"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('TglLahir : ','TglLahir',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('TglLahir','','id="TglLahir" class="form-control" placeholder="Enter TglLahir"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('JK : ','JK',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('JK','','id="JK" class="form-control" placeholder="Enter JK"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Telepon : ','Telepon',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Telepon','','id="Telepon" class="form-control" placeholder="Enter Telepon"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Jabatan : ','Jabatan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Jabatan','','id="Jabatan" class="form-control" placeholder="Enter Jabatan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('NmJabatan : ','NmJabatan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('NmJabatan','','id="NmJabatan" class="form-control" placeholder="Enter NmJabatan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('TglMasuk : ','TglMasuk',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('TglMasuk','','id="TglMasuk" class="form-control" placeholder="Enter TglMasuk"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Gapok : ','Gapok',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Gapok','','id="Gapok" class="form-control" placeholder="Enter Gapok"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Lembur : ','Lembur',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Lembur','','id="Lembur" class="form-control" placeholder="Enter Lembur"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('TunjanganKeluarga : ','TunjanganKeluarga',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('TunjanganKeluarga','','id="TunjanganKeluarga" class="form-control" placeholder="Enter TunjanganKeluarga"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('TunjanganJabatan : ','TunjanganJabatan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('TunjanganJabatan','','id="TunjanganJabatan" class="form-control" placeholder="Enter TunjanganJabatan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Transport : ','Transport',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Transport','','id="Transport" class="form-control" placeholder="Enter Transport"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Makan : ','Makan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Makan','','id="Makan" class="form-control" placeholder="Enter Makan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Lain : ','Lain',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Lain','','id="Lain" class="form-control" placeholder="Enter Lain"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Bonus : ','Bonus',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Bonus','','id="Bonus" class="form-control" placeholder="Enter Bonus"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Hutang : ','Hutang',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Hutang','','id="Hutang" class="form-control" placeholder="Enter Hutang"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('NoAcc : ','NoAcc',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('NoAcc','','id="NoAcc" class="form-control" placeholder="Enter NoAcc"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('User : ','User',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('User','','id="User" class="form-control" placeholder="Enter User"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Time : ','Time',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Time','','id="Time" class="form-control" placeholder="Enter Time"'); ?>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <button id="save" type="submit" class="btn btn-md btn-success"><icon class="fa fa-floppy-o"></icon> Simpan</button>
                            <button id="save_edit" type="submit" class="btn btn-md btn-primary" style="display:none;"><icon class="fa fa-refresh"></icon> Perbaiki</button>
                            <a href="#" id="cancel_edit" class="btn btn-md btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal</a>
                        </div>
                    </div>
                    <?php echo form_close();?>
                    </div>
                <!-- </div> -->


 