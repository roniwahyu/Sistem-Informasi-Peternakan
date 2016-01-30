 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'banks/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('Kode : ','Kode',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Kode',set_value('Kode', isset($default['Kode']) ? $default['Kode'] : ''),'id="Kode" class="form-control" placeholder="Masukkan Kode"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Rekening : ','Rekening',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Rekening',set_value('Rekening', isset($default['Rekening']) ? $default['Rekening'] : ''),'id="Rekening" class="form-control" placeholder="Masukkan Rekening"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Keterangan : ','Keterangan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Keterangan',set_value('Keterangan', isset($default['Keterangan']) ? $default['Keterangan'] : ''),'id="Keterangan" class="form-control" placeholder="Masukkan Keterangan"'); ?>
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
                        
                        </div>
                
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <button id="save" type="submit" class="btn btn-lg btn-success"><icon class="fa fa-floppy-o"></icon> Simpan</button>
                            <button id="save_edit" type="submit" class="btn btn-lg btn-primary" style="display:none;"><icon class="fa fa-refresh"></icon> Perbaiki</button>
                            <a href="#" id="cancel_edit" class="btn btn-lg btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal</a>
                        </div>
                   
                    <?php echo form_close();?>
                    </div>
            


 