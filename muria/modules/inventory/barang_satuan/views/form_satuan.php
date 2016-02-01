 

                    <div id="form_input" class="row">
                    <?php echo form_open(base_url().'barang_satuan/submit',array('id'=>'addform_satuan','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            <?php echo form_hidden('id_barang',set_value('id_barang', isset($default['id_barang']) ? $default['id_barang'] : ''),'id="id_barang" class="form-control text-center" readonly'); ?>
                            
                            <h3><?php echo !empty($default['nmbarang'])?$default['nmbarang']:'' ?></h3>
                            <div class="form-group">
                                <?php echo form_label('Kode Barang : ','kode',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <input id="kode" type="text" name="kode" value="<?php echo !empty($default['kode'])?$default['kode']:'' ?>" class="form-control" placeholder="Enter kode" readonly  >
                                </div>
                            </div>
                        
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                
                        
                       
                            <div class="form-group">
                                <?php echo form_label('Satuan1 : ','Satuan1',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_dropdown('Satuan1',$opt_satuan,'','id="Satuan1" class="form-control" placeholder="Enter Satuan1"'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('Jumlah Satuan : ','isi1',array('class'=>'control-label')); ?>
                                <div class="input-group">
                                      
                                        <div class="controls">
                                        <?php echo form_input('isi1','','id="isi1" class="form-control text-center" value="1" placeholder="1" readonly'); ?>
                                        </div>
                                        <span class="input-group-btn">
                                            <span class="txt1 btn btn-info "></span>
                                        </span>
                                    </div>
                                
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                
                            <div class="form-group">
                                <?php echo form_label('Satuan2 : ','Satuan2',array('class'=>'control-label')); ?>
                                

                                <div class="controls">
                                <?php echo form_dropdown('Satuan2',$opt_satuan,'','id="Satuan2" class="form-control" placeholder="Enter Satuan2"'); ?>
                                </div>
                                      
                            </div>
                            <div class="form-group">
                                <?php echo form_label('Jumlah Satuan : ','Isi2',array('class'=>'control-label')); ?>
                                <div class="input-group">
                                    <div class="controls">
                                    <?php echo form_input('Isi2',set_value('Isi2', isset($default['Isi2']) ? $default['Isi2'] : ''),'id="Isi2" class="form-control text-center" placeholder="Enter Isi2"'); ?>
                                    </div>
                                    <span class="input-group-btn">
                                            <span class="txt2 btn btn-danger"></span>
                                        </span>
                                    </div>
                            </div>
                             
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                             <div class="form-group">
                                <?php echo form_label('Satuan : ','Satuan3',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_dropdown('Satuan3',$opt_satuan,'','id="Satuan3" class="form-control" placeholder="Enter Satuan3"'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('Jumlah Satuan : ','Isi3',array('class'=>'control-label')); ?>
                                <div class="input-group">
  
                                <div class="controls">
                                <?php echo form_input('Isi3',set_value('Isi3', isset($default['Isi3']) ? $default['Isi3'] : ''),'id="Isi3" class="form-control text-center" placeholder="Enter Isi3"'); ?>
                                </div>
                                        <span class="input-group-btn">
                                            <span class="txt3 btn btn-success"></span>
                                        </span>
                                </div>
                            </div>
                           
                            
                    
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            
                            <div class="form-group">
                                <?php echo form_label('SatuanMax : ','SatuanMax',array('class'=>'control-label')); ?>
                                <div class="controls">
                                    <?php //echo form_dropdown('SatuanMax',$opt_satuan,'','id="SatuanMax" class="form-control" placeholder="Enter SatuanMax"'); ?>

                                <?php echo form_input('SatuanMax',set_value('SatuanMax', isset($default['SatuanMax']) ? $default['SatuanMax'] : ''),'id="SatuanMax" class="form-control" placeholder="Enter SatuanMax"'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            
                            <div class="form-group">
                                <?php echo form_label('SatuanMin : ','SatuanMin',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php //echo form_dropdown('SatuanMin',$opt_satuan,'','id="SatuanMin" class="form-control" placeholder="Enter SatuanMin"'); ?>

                                <?php echo form_input('SatuanMin',set_value('SatuanMin', isset($default['SatuanMin']) ? $default['SatuanMin'] : ''),'id="SatuanMin" class="form-control" placeholder="Enter SatuanMin"'); ?>
                                </div>
                            </div>
                        
                     
                        
                        
                        </div>
                
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <button id="save_satuan" type="submit" data-dismiss="modal" class="btn btn-lg btn-success"><icon class="fa fa-floppy-o"></icon> Simpan</button>
                            <button id="save_edit" type="submit" class="btn btn-lg btn-primary" style="display:none;"><icon class="fa fa-refresh"></icon> Perbaiki</button>
                         
                        </div>
                   
                    <?php echo form_close();?>
                    </div>
            


 