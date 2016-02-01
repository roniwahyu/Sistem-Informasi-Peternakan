 
<!-- <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 kelola" style="display:none"> -->
                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'jenis_pembelian/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                                
                    <!-- <div class="row"> -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('jenis_beli : ','jenis_beli',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('jenis_beli','','id="jenis_beli" class="form-control" placeholder="Enter jenis_beli"'); ?>
                                </div>
                            </div>
                        
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
                            <button id="save" type="submit" data-dismiss="modal" class="btn btn-lg btn-success"><icon class="fa fa-floppy-o"></icon> Simpan</button>
                            <button id="save_edit" type="submit" class="btn btn-lg btn-primary" style="display:none;"><icon class="fa fa-refresh"></icon> Perbaiki</button>
                            <a href="#" id="cancel_edit" class="btn btn-lg btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal</a>
                        </div>
                    <!-- </div> -->
                    <?php echo form_close();?>
                    </div>
                <!-- </div> -->


 