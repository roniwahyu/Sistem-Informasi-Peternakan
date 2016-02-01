 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'supplier/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('Kode : ','Kode',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Kode',set_value('Kode', isset($default['Kode']) ? $default['Kode'] : ''),'id="Kode" class="form-control" placeholder="Masukkan Kode"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Nama : ','Nama',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Nama',set_value('Nama', isset($default['Nama']) ? $default['Nama'] : ''),'id="Nama" class="form-control" placeholder="Masukkan Nama"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Alamat : ','Alamat',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Alamat',set_value('Alamat', isset($default['Alamat']) ? $default['Alamat'] : ''),'id="Alamat" class="form-control" placeholder="Masukkan Alamat"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Kota : ','Kota',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Kota',set_value('Kota', isset($default['Kota']) ? $default['Kota'] : ''),'id="Kota" class="form-control" placeholder="Masukkan Kota"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Telepon : ','Telepon',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Telepon',set_value('Telepon', isset($default['Telepon']) ? $default['Telepon'] : ''),'id="Telepon" class="form-control" placeholder="Masukkan Telepon"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Fax : ','Fax',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Fax',set_value('Fax', isset($default['Fax']) ? $default['Fax'] : ''),'id="Fax" class="form-control" placeholder="Masukkan Fax"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Contact : ','Contact',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Contact',set_value('Contact', isset($default['Contact']) ? $default['Contact'] : ''),'id="Contact" class="form-control" placeholder="Masukkan Contact"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('JthTempo : ','JthTempo',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('JthTempo',set_value('JthTempo', isset($default['JthTempo']) ? $default['JthTempo'] : ''),'id="JthTempo" class="form-control" placeholder="Masukkan JthTempo"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Diskon : ','Diskon',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Diskon',set_value('Diskon', isset($default['Diskon']) ? $default['Diskon'] : ''),'id="Diskon" class="form-control" placeholder="Masukkan Diskon"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('NPWP : ','NPWP',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('NPWP',set_value('NPWP', isset($default['NPWP']) ? $default['NPWP'] : ''),'id="NPWP" class="form-control" placeholder="Masukkan NPWP"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Hutang : ','Hutang',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Hutang',set_value('Hutang', isset($default['Hutang']) ? $default['Hutang'] : ''),'id="Hutang" class="form-control" placeholder="Masukkan Hutang"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Bayar : ','Bayar',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Bayar',set_value('Bayar', isset($default['Bayar']) ? $default['Bayar'] : ''),'id="Bayar" class="form-control" placeholder="Masukkan Bayar"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Sisa : ','Sisa',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Sisa',set_value('Sisa', isset($default['Sisa']) ? $default['Sisa'] : ''),'id="Sisa" class="form-control" placeholder="Masukkan Sisa"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Bank : ','Bank',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Bank',set_value('Bank', isset($default['Bank']) ? $default['Bank'] : ''),'id="Bank" class="form-control" placeholder="Masukkan Bank"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Rekening : ','Rekening',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Rekening',set_value('Rekening', isset($default['Rekening']) ? $default['Rekening'] : ''),'id="Rekening" class="form-control" placeholder="Masukkan Rekening"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('AnRekening : ','AnRekening',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('AnRekening',set_value('AnRekening', isset($default['AnRekening']) ? $default['AnRekening'] : ''),'id="AnRekening" class="form-control" placeholder="Masukkan AnRekening"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Potongan : ','Potongan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Potongan',set_value('Potongan', isset($default['Potongan']) ? $default['Potongan'] : ''),'id="Potongan" class="form-control" placeholder="Masukkan Potongan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('User : ','User',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('User',set_value('User', isset($default['User']) ? $default['User'] : ''),'id="User" class="form-control" placeholder="Masukkan User"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Time : ','Time',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Time',set_value('Time', isset($default['Time']) ? $default['Time'] : ''),'id="Time" class="form-control" placeholder="Masukkan Time"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('NoAcc : ','NoAcc',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('NoAcc',set_value('NoAcc', isset($default['NoAcc']) ? $default['NoAcc'] : ''),'id="NoAcc" class="form-control" placeholder="Masukkan NoAcc"'); ?>
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
            


 