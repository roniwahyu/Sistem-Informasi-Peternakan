 
<!-- <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 kelola" style="display:none"> -->
                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'beli/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                                
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('Faktur : ','Faktur',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Faktur','','id="Faktur" class="form-control" placeholder="Enter Faktur"'); ?>
                                </div>
                            </div>
                        <?php 
                        print_r($last_po);
                        ?>
                            <div class="form-group">
                                <?php echo form_label('Tgl : ','Tgl',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Tgl','','id="Tgl" class="form-control" placeholder="Enter Tgl"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Kode : ','Kode',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Kode','','id="Kode" class="form-control" placeholder="Enter Kode"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('NmBarang : ','NmBarang',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('NmBarang','','id="NmBarang" class="form-control" placeholder="Enter NmBarang"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Qty : ','Qty',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Qty','','id="Qty" class="form-control" placeholder="Enter Qty"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Satuan : ','Satuan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Satuan','','id="Satuan" class="form-control" placeholder="Enter Satuan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Harga : ','Harga',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Harga','','id="Harga" class="form-control" placeholder="Enter Harga"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Discount : ','Discount',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Discount','','id="Discount" class="form-control" placeholder="Enter Discount"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Discount2 : ','Discount2',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Discount2','','id="Discount2" class="form-control" placeholder="Enter Discount2"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Promo : ','Promo',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Promo','','id="Promo" class="form-control" placeholder="Enter Promo"'); ?>
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


 