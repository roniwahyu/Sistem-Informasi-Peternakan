 

                    <div id="form_input " class="po_form min-gutter">
                    <?php echo form_open(base_url().'purchase_order/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('No. Faktur : ','faktur_po',array('class'=>'control-label')); ?>
                                <div class="controls">
                                    <input id="faktur_po" name="faktur_po" value="<?php echo $nopo ?>" class="form-control" placeholder="<?php echo $nopo ?>" >
                                <?php //echo form_input('faktur_po',set_default($nopo,''),'id="faktur_po" class="form-control" placeholder="'.$nopo.'"');// echo $nopo;?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Tanggal: ','tgl_po',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tgl_po','','id="tgl_po" class="form-control" placeholder="Enter tgl_po"'); ?>
                                </div>
                            </div>
                          
                           
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Tanggal Kirim : ','tgl_kirim_po',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tgl_kirim_po','','id="tgl_kirim_po" class="form-control" placeholder="Enter tgl_kirim_po"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Tanggal Kedaluarsa : ','tgl_kedaluarsa_po',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tgl_kedaluarsa_po','','id="tgl_kedaluarsa_po" class="form-control" placeholder="Enter tgl_kedaluarsa_po"'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <?php echo form_label('Supplier : ','id_supplier',array('class'=>'control-label')); ?>
                                        <div class="controls">
                                        <?php echo form_dropdown('id_supplier',$opt_supplier,'','id="id_supplier" class="form-control" placeholder="Enter id_supplier"'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <?php echo form_label('id_stock_req : ','id_stock_req',array('class'=>'control-label')); ?>
                                        <div class="controls">
                                        <?php echo form_input('id_stock_req','','id="id_stock_req" class="form-control" placeholder="Enter id_stock_req"'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                     <div class="form-group">
                                        <?php echo form_label('keterangan : ','keterangan',array('class'=>'control-label')); ?>
                                        <div class="controls">
                                        <?php echo form_input('keterangan','','id="keterangan" class="form-control" placeholder="Enter keterangan"'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    <hr>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="panel panel-danger">
                                <div class="panel-body">
                                     <div class="row entry">
                              
                                   
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                         <div class="tambah row">


                                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                
                                            
                                                <div class="form-group">
                                                    <?php echo form_label('Kode : ','Kode',array('class'=>'control-label')); ?>

                                                    <div class="controls">
                                                    <?php echo form_input('Kode[]','','id="Kode" class="form-control" placeholder="Enter Kode"'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                              
                                                <div class="form-group">
                                                <?php echo form_label('Qty : ','Qty',array('class'=>'control-label')); ?>

                                                    <div class="controls">
                                                    <?php echo form_input('Qty[]','','id="Qty" class="form-control" placeholder="Enter Qty"'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                <div class="form-group">
                                                <?php echo form_label('Satuan : ','Satuan',array('class'=>'control-label')); ?>

                                                    <div class="controls">
                                                    <?php echo form_input('Satuan[]','','id="Satuan" class="form-control" placeholder="Enter Satuan"'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-danger  btn-lg btn-add" type="button">
                                                        <span class="fa fa-plus"></span>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                </div>
                            </div>
                          
                            
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <!-- <div class="row"> -->
                                <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> -->
                                    <div class="panel panel-info">
                                        <div class="panel-body">
                                           <?php echo !empty($detail_po)?$detail_po:'' ?>
                                        </div>
                                    </div>
                                    
                                <!-- </div> -->
                            <!-- </div> -->
                        </dir>
                        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                            
                            <div class="row">
                            <div class="panel panel-default">
                                <div class="panel-heading panel-body ">
                                   
                                    
                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <?php echo form_label('Status : ','status',array('class'=>'control-label')); ?>
                                            <div class="controls">
                                            <?php echo form_input('status','','id="status" class="form-control" placeholder="Enter status"'); ?>
                                            </div>
                                        </div>
                                          <div class="form-group">
                                            <?php echo form_label('Cara Pembayaran : ','id_bayar',array('class'=>'control-label')); ?>
                                            <div class="controls">
                                            <?php echo form_input('id_bayar','','id="id_bayar" class="form-control" placeholder="Enter id_bayar"'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                         
                                        <div class="form-group ">
                                            <?php echo form_label('Uang Muka : ','uangmuka',array('class'=>'control-label')); ?>
                                            <div class="controls">
                                            <?php echo form_input('uangmuka','','id="uangmuka" class="form-control" placeholder="Enter uangmuka"'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo form_label('Sisa : ','sisa',array('class'=>'control-label')); ?>
                                            <!-- <div class="controls"> -->
                                            <?php echo form_input('sisa','','id="sisa" class="form-control" placeholder="Sisa"'); ?>
                                            <!-- </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div></div>
                        </div>

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                            <!-- <div class="row"> -->
                                <div class="panel panel-warning">
                                    <div class="panel-heading panel-body">
                                       
                                       <div class="form-inline ">
                          
                                    
                                            <div class="form-group pull-right">
                                                <?php echo form_label('totalbayar : ','totalbayar',array('class'=>'control-label')); ?>
                                                <!-- <div class="controls"> -->
                                                <?php echo form_input('totalbayar','','id="totalbayar" class="form-control" placeholder="Enter totalbayar"'); ?>
                                                <!-- </div> -->
                                            </div>
                                        
                                            
                                        
                                          
                                        
                                            <div class="form-group pull-right">
                                                <?php echo form_label('biaya_kirim : ','biaya_kirim',array('class'=>'control-label')); ?>
                                                <!-- <div class="controls"> -->
                                                <?php echo form_input('biaya_kirim','','id="biaya_kirim" class="form-control" placeholder="Enter biaya_kirim"'); ?>
                                                <!-- </div> -->
                                            </div>
                                            <div class="form-group pull-right">
                                                <?php echo form_label('grandtotal : ','grandtotal',array('class'=>'control-label')); ?>
                                                <!-- <div class="controls"> -->
                                                <?php echo form_input('grandtotal','','id="grandtotal" class="form-control" placeholder="Enter grandtotal"'); ?>
                                                <!-- </div> -->
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            
                            <!-- </div> -->
                        
                        
                        </div>
                
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <button id="save" type="submit" class="btn btn-lg btn-success"><icon class="fa fa-floppy-o"></icon> Simpan</button>
                            <button id="save_edit" type="submit" class="btn btn-lg btn-primary" style="display:none;"><icon class="fa fa-refresh"></icon> Perbaiki</button>
                            <a href="#" id="cancel_edit" class="btn btn-lg btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal</a>
                        </div>
                   
                    <?php echo form_close();?>
                    </div>
            


 