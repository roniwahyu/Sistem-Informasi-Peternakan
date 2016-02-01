 
<!-- <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 kelola" style="display:none"> -->
                    <div id="form_input" class="">
                    <?php echo form_open(base_url('supplier/submit'),array('id'=>'add_supplier_form','role'=>'form','class'=>'form')); ?>
                                                                
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('Kode : ','Kode',array('class'=>'control-label')); ?>
                                <div class="input-group">
                                    <div class="controls">
                                    <?php echo form_input('Kode','','id="Kode" readonly class="form-control" placeholder="Enter Kode"'); ?>
                                    </div>
                                     <span class="input-group-btn">
                                            <a href="#" class="gen_kdsp btn btn-info" type="button"><i class="fa fa-refresh"></i></a>
                                        </span>
                                </div>
                            </div>
                        
                            
                            <div class="form-group">
                                <?php echo form_label('Contact Person : ','Contact',array('class'=>'control-label')); ?>
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
                           
                        </div>
                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
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
                                <?php echo form_label('Kota : ','Kota',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Kota','','id="Kota" class="form-control" placeholder="Enter Kota"'); ?>
                                </div>
                            </div>
                        
                           
                        
                        
                          
                        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <button id="save_supplier" data-dismiss="modal" type="submit" class="btn btn-md btn-success"><icon class="fa fa-floppy-o"></icon> Simpan</button>
                            <button id="save_edit" type="submit" class="btn btn-md btn-primary" style="display:none;"><icon class="fa fa-refresh"></icon> Perbaiki</button>
                            <a href="#" id="cancel_edit" class="btn btn-md btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal</a>
                        </div>
                    </div>
                    <?php echo form_close();?>
                    </div>
                <!-- </div> -->


 