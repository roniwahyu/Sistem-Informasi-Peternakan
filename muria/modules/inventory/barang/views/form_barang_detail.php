 
<!-- <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 kelola" style="display:none"> -->
                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'barang/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                                
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            
                                <?php echo form_hidden('id','','id="id" class="form-control" placeholder="Enter id"'); ?>
                            <div class="form-group">
                                <?php echo form_label('Kode : ','Kode',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Kode','','id="Kode" class="form-control" placeholder="Enter Kode"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Cabang : ','Cabang',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Cabang','','id="Cabang" class="form-control" placeholder="Enter Cabang"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Barcode : ','Barcode',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Barcode','','id="Barcode" class="form-control" placeholder="Enter Barcode"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Nama : ','Nama',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Nama','','id="Nama" class="form-control" placeholder="Enter Nama"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Keterangan : ','Keterangan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Keterangan','','id="Keterangan" class="form-control" placeholder="Enter Keterangan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_golongan : ','id_golongan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_golongan','','id="id_golongan" class="form-control" placeholder="Enter id_golongan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Kemasan : ','Kemasan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Kemasan','','id="Kemasan" class="form-control" placeholder="Enter Kemasan"'); ?>
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
                                <?php echo form_label('StKon : ','StKon',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('StKon','','id="StKon" class="form-control" placeholder="Enter StKon"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_supplier : ','id_supplier',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_supplier','','id="id_supplier" class="form-control" placeholder="Enter id_supplier"'); ?>
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


 