 
<!-- <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 kelola" style="display:none"> -->
                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'customer/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                                
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('Kode : ','Kode',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Kode','','id="Kode" class="form-control" placeholder="Enter Kode"'); ?>
                                </div>
                            </div>
                        
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
                                <?php echo form_label('Wilayah : ','Wilayah',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Wilayah','','id="Wilayah" class="form-control" placeholder="Enter Wilayah"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Area : ','Area',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Area','','id="Area" class="form-control" placeholder="Enter Area"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Contact : ','Contact',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Contact','','id="Contact" class="form-control" placeholder="Enter Contact"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Telepon : ','Telepon',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Telepon','','id="Telepon" class="form-control" placeholder="Enter Telepon"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Fax : ','Fax',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Fax','','id="Fax" class="form-control" placeholder="Enter Fax"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Kota : ','Kota',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Kota','','id="Kota" class="form-control" placeholder="Enter Kota"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('JthTempo : ','JthTempo',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('JthTempo','','id="JthTempo" class="form-control" placeholder="Enter JthTempo"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Diskon : ','Diskon',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Diskon','','id="Diskon" class="form-control" placeholder="Enter Diskon"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Plafond : ','Plafond',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Plafond','','id="Plafond" class="form-control" placeholder="Enter Plafond"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Subsidi : ','Subsidi',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Subsidi','','id="Subsidi" class="form-control" placeholder="Enter Subsidi"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('NPWP : ','NPWP',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('NPWP','','id="NPWP" class="form-control" placeholder="Enter NPWP"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Status : ','Status',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Status','','id="Status" class="form-control" placeholder="Enter Status"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Hutang : ','Hutang',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Hutang','','id="Hutang" class="form-control" placeholder="Enter Hutang"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Bayar : ','Bayar',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Bayar','','id="Bayar" class="form-control" placeholder="Enter Bayar"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Sisa : ','Sisa',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Sisa','','id="Sisa" class="form-control" placeholder="Enter Sisa"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Bank : ','Bank',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Bank','','id="Bank" class="form-control" placeholder="Enter Bank"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Rekening : ','Rekening',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Rekening','','id="Rekening" class="form-control" placeholder="Enter Rekening"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('AnRekening : ','AnRekening',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('AnRekening','','id="AnRekening" class="form-control" placeholder="Enter AnRekening"'); ?>
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
                        
                            <div class="form-group">
                                <?php echo form_label('Golongan : ','Golongan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Golongan','','id="Golongan" class="form-control" placeholder="Enter Golongan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('NoAcc : ','NoAcc',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('NoAcc','','id="NoAcc" class="form-control" placeholder="Enter NoAcc"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('LastPrint : ','LastPrint',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('LastPrint','','id="LastPrint" class="form-control" placeholder="Enter LastPrint"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('StAktif : ','StAktif',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('StAktif','','id="StAktif" class="form-control" placeholder="Enter StAktif"'); ?>
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


 