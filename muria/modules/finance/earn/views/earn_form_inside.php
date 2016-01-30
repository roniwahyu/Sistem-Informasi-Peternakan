 
<!-- <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 kelola" style="display:none"> -->
                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'earn/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                                
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('Faktur : ','Faktur',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Faktur',(!empty($faktur)?$faktur:''),'id="Faktur" class="form-control" placeholder="Enter Faktur" disabled'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Tgl : ','Tgl',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Tgl',date('Y-m-d'),'id="Tgl" class="form-control" placeholder="Enter Tgl"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Kode : ','Kode',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Kode','','id="Kode" class="form-control" placeholder="Enter Kode"'); ?>
                                </div>
                            </div>
                        
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
                                <?php echo form_label('Ket : ','Ket',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Ket','','id="Ket" class="form-control" placeholder="Enter Ket"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Jumlah : ','Jumlah',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Jumlah','','id="Jumlah" class="form-control" placeholder="Enter Jumlah"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Status : ','Status',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Status','','id="Status" class="form-control" placeholder="Enter Status"'); ?>
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


 