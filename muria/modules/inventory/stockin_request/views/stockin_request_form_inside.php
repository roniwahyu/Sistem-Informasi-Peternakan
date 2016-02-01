 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'stockin_request/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('id_barang : ','id_barang',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_barang','','id="id_barang" class="form-control" placeholder="Enter id_barang"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('jml : ','jml',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('jml','','id="jml" class="form-control" placeholder="Enter jml"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('stok : ','stok',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('stok','','id="stok" class="form-control" placeholder="Enter stok"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_user : ','id_user',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_user','','id="id_user" class="form-control" placeholder="Enter id_user"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_gudang : ','id_gudang',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_gudang','','id="id_gudang" class="form-control" placeholder="Enter id_gudang"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_kandang : ','id_kandang',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_kandang','','id="id_kandang" class="form-control" placeholder="Enter id_kandang"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('datetime : ','datetime',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('datetime','','id="datetime" class="form-control" placeholder="Enter datetime"'); ?>
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
            


 