 

                    <div id="form_input" class="row">
                    <?php echo form_open(base_url().'barang_satuan/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('id_barang : ','id_barang',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_barang','','id="id_barang" class="form-control" placeholder="Enter id_barang"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('kode : ','kode',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kode','','id="kode" class="form-control" placeholder="Enter kode"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Isi2 : ','Isi2',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Isi2','','id="Isi2" class="form-control" placeholder="Enter Isi2"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Isi3 : ','Isi3',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Isi3','','id="Isi3" class="form-control" placeholder="Enter Isi3"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Satuan1 : ','Satuan1',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Satuan1','','id="Satuan1" class="form-control" placeholder="Enter Satuan1"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Satuan2 : ','Satuan2',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Satuan2','','id="Satuan2" class="form-control" placeholder="Enter Satuan2"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Satuan3 : ','Satuan3',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Satuan3','','id="Satuan3" class="form-control" placeholder="Enter Satuan3"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Max : ','Max',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Max','','id="Max" class="form-control" placeholder="Enter Max"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('SatuanMax : ','SatuanMax',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('SatuanMax','','id="SatuanMax" class="form-control" placeholder="Enter SatuanMax"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Min : ','Min',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Min','','id="Min" class="form-control" placeholder="Enter Min"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('SatuanMin : ','SatuanMin',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('SatuanMin','','id="SatuanMin" class="form-control" placeholder="Enter SatuanMin"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('StKon : ','StKon',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('StKon','','id="StKon" class="form-control" placeholder="Enter StKon"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('User : ','User',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('User','','id="User" class="form-control" placeholder="Enter User"'); ?>
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
            


 