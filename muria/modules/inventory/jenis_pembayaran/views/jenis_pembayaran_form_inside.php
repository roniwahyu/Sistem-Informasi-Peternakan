 
<!-- <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 kelola" style="display:none"> -->
                <hr>
                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'jenis_pembayaran/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                                
                    <!-- <div class="row"> -->
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('jenis_pembayaran : ','jenis_pembayaran',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('jenis_pembayaran','','id="jenis_pembayaran" class="form-control" placeholder="Enter jenis_pembayaran"'); ?>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                            <div class="form-group">
                                <?php echo form_label('keterangan : ','keterangan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('keterangan','','id="keterangan" class="form-control" placeholder="Enter keterangan"'); ?>
                                </div>
                            </div>
                        
                          
                        
                        </div>
                    <!-- </div> -->
                    <!-- <div class="row"> -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <button id="save" type="submit" class="btn btn-md btn-success"><icon class="fa fa-floppy-o"></icon> Simpan</button>
                            <button id="save_edit" type="submit" class="btn btn-md btn-primary" style="display:none;"><icon class="fa fa-refresh"></icon> Perbaiki</button>
                            <a href="#" id="cancel_edit" class="btn btn-md btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal</a>
                        </div>
                    <!-- </div> -->
                    <?php echo form_close();?>
                    </div>
                <!-- </div> -->


 