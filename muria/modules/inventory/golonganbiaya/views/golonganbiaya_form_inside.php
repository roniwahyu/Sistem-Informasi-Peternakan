 
<!-- <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 kelola" style="display:none"> -->
                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'golonganbiaya/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                                
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="Kode" name="Kode">
                            
                            <div class="form-group">
                                <?php echo form_label('Keterangan : ','Keterangan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Keterangan','','id="Keterangan" class="form-control" placeholder="Enter Keterangan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Rekening : ','Rekening',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Rekening','','id="Rekening" class="form-control" placeholder="Enter Rekening"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Status : ','Status',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Status','','id="Status" class="form-control" placeholder="Enter Status"'); ?>
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
 