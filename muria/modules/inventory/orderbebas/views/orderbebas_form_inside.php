 
<!-- <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 kelola" style="display:none"> -->
                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'orderbebas/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                                
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="Faktur" name="Faktur">
                            
                            <div class="form-group">
                                <?php echo form_label('Tgl : ','Tgl',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Tgl','','id="Tgl" class="form-control" placeholder="Enter Tgl"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Kepada : ','Kepada',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Kepada','','id="Kepada" class="form-control" placeholder="Enter Kepada"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Alamat : ','Alamat',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Alamat','','id="Alamat" class="form-control" placeholder="Enter Alamat"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Sopir : ','Sopir',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Sopir','','id="Sopir" class="form-control" placeholder="Enter Sopir"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Mobil : ','Mobil',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Mobil','','id="Mobil" class="form-control" placeholder="Enter Mobil"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Barang : ','Barang',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Barang','','id="Barang" class="form-control" placeholder="Enter Barang"'); ?>
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
                                <?php echo form_label('Status : ','Status',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Status','','id="Status" class="form-control" placeholder="Enter Status"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('cNoJrn : ','cNoJrn',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('cNoJrn','','id="cNoJrn" class="form-control" placeholder="Enter cNoJrn"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('lVoid : ','lVoid',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('lVoid','','id="lVoid" class="form-control" placeholder="Enter lVoid"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('lPosted : ','lPosted',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('lPosted','','id="lPosted" class="form-control" placeholder="Enter lPosted"'); ?>
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


 