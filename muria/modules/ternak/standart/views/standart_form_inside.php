 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'standart/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('Kode : ','Kode',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Kode',set_value('Kode', isset($default['Kode']) ? $default['Kode'] : ''),'id="Kode" class="form-control" placeholder="Masukkan Kode"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Umur : ','Umur',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Umur',set_value('Umur', isset($default['Umur']) ? $default['Umur'] : ''),'id="Umur" class="form-control" placeholder="Masukkan Umur"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Berat : ','Berat',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Berat',set_value('Berat', isset($default['Berat']) ? $default['Berat'] : ''),'id="Berat" class="form-control" placeholder="Masukkan Berat"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Pakan : ','Pakan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Pakan',set_value('Pakan', isset($default['Pakan']) ? $default['Pakan'] : ''),'id="Pakan" class="form-control" placeholder="Masukkan Pakan"'); ?>
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
            


 