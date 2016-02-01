 

                    <div id="form_input" class="row">
                    <?php echo form_open(base_url().'wilayah/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-2">
                            
                                <?php echo form_hidden('id',set_value('id', isset($default['id']) ? $default['id'] : ''),'id="id" class="form-control" placeholder="Masukkan id"'); ?>
                            <div class="form-group">
                                <?php echo form_label('Kode : ','kd_wilayah',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kd_wilayah',set_value('kd_wilayah', isset($default['kd_wilayah']) ? $default['kd_wilayah'] : ''),'id="kd_wilayah" class="form-control" placeholder="Masukkan kd_wilayah"'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-2">
                            
                            <div class="form-group">
                                <?php echo form_label('Wilayah : ','wilayah',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('wilayah',set_value('wilayah', isset($default['wilayah']) ? $default['wilayah'] : ''),'id="wilayah" class="form-control" placeholder="Masukkan wilayah"'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                            
                            <div class="form-group">
                                <?php echo form_label('Propinsi : ','propinsi',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('propinsi',set_value('propinsi', isset($default['propinsi']) ? $default['propinsi'] : ''),'id="propinsi" class="form-control" placeholder="Masukkan propinsi"'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                            
                            <div class="form-group">
                                <?php echo form_label('Keterangan : ','keterangan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('keterangan',set_value('keterangan', isset($default['keterangan']) ? $default['keterangan'] : ''),'id="keterangan" class="form-control" placeholder="Masukkan keterangan"'); ?>
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
            


 