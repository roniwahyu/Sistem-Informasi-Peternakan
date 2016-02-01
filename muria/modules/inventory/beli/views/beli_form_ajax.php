 
<!-- <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 kelola" style="display:none"> -->
                <div class="control-group" id="fields">   
                  
                    </div>
                <!-- </div> -->
<!-- <div class="container"> -->
    <!-- <div class="row"> -->
        <div class="control-group" id="fields">
            <div class="controls"> 
                  <div id="form_input" class="controls">
                    
                    <form action="<?php echo domain().'inv/beli/submit_batch' ?>" method="POST" id="addform2" class="form" role="form">
                        <div class="row">
                            
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <input type="hidden" value='' id="id" name="id">
                                
                                <div class="form-group">
                                    <?php echo form_label('Faktur : ','Faktur',array('class'=>'control-label')); ?>
                                    <div class="controls">
                                    <?php echo form_input('Faktur',(!empty($newpo)?$newpo:''),'id="Faktur" class="form-control " readonly placeholder="Enter Faktur"'); ?>
                                    </div>
                                </div>
                            </div>   
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                   
                                <div class="form-group">
                                    <?php echo form_label('Tgl : ','Tgl',array('class'=>'control-label')); ?>
                                    <div class="controls">
                                    <?php echo form_input('Tgl',date('Y-m-d'),'id="Tgl" class="form-control" placeholder="Enter Tgl"'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="entry input-group col-xs-3">

                               
                            </div>
                            <div class="row entry">
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    
                                
                                    <div class="form-group">
                                        <?php echo form_label('Kode : ','Kode',array('class'=>'control-label')); ?>
                                      
                                    </div>
                                 </div>
                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                  
                                    <div class="form-group">
                                        <?php echo form_label('Qty : ','Qty',array('class'=>'control-label')); ?>
                                      
                                    </div>
                                 </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <?php echo form_label('Satuan : ','Satuan',array('class'=>'control-label')); ?>
                                    
                                    </div>
                                </div>
                        <div class="tambah">


                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    
                                
                                    <div class="form-group">
                                        <div class="controls">
                                        <?php echo form_input('Kode[]','','id="Kode" class="form-control" placeholder="Enter Kode"'); ?>
                                        </div>
                                    </div>
                                 </div>
                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                  
                                    <div class="form-group">
                                        <div class="controls">
                                        <?php echo form_input('Qty[]','','id="Qty" class="form-control" placeholder="Enter Qty"'); ?>
                                        </div>
                                    </div>
                                 </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <div class="controls">
                                        <?php echo form_input('Satuan[]','','id="Satuan" class="form-control" placeholder="Enter Satuan"'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                                     <span class="input-group-btn">
                                        <button class="btn btn-success add-item" type="button">
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <button name="submit" id="save2" type="submit" class="btn btn-md btn-success"><icon class="fa fa-floppy-o"></icon> Simpan</button>
                            <button id="save_edit" type="submit" class="btn btn-md btn-primary" style="display:none;"><icon class="fa fa-refresh"></icon> Perbaiki</button>
                            <a href="#" id="cancel_edit" class="btn btn-md btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal</a>
                        </div>
                    </div>
                        
                    </form>
                </div>
            <br>
            </div>
        </div>
    <!-- </div> -->
<!-- </div> -->

 