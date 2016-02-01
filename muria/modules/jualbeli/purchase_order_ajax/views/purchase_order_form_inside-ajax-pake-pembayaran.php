 

                    <div id="form_input " class="po_form min-gutter">
                    <?php echo form_open(base_url().'purchase_order/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <input type="hidden" value='' id="id" name="id"> 
                            <div class="form-group">
                            <?php echo form_label('#Faktur PO: ','faktur_po',array('class'=>'control-label')); ?>

                            <div class="input-group">

                              <input name="faktur_po" id="faktur_po" value="<?php echo $nopo ?>" type="text" class="form-control" placeholder="<?php echo $nopo ?>" readonly>
                              <span class="input-group-btn">
                                <a href="#" class="btn btn-info" type="button"><i class="fa fa-refresh"></i></a>

                              </span>
                            </div>
                            </div><!-- /input-group -->
                           <div class="form-group">
                                <?php echo form_label('Tanggal PO: ','tgl_po',array('class'=>'control-label')); ?>
                                    <div class="input-daterange input-group controls" id="datepicker">
                                       <?php if(!empty($default)): //print_r($default);?>

                                        <input id="tgl_po" value="<?php echo set_value($default['tgl_po'],date('Y-m-d')); ?>" type="text" class="input-md form-control" name="tgl_po" required />
                                        <?php else: ?>
                                        <input id="tgl_po" value="<?php echo date('Y-m-d') ?>"type="text" class=" form-control" name="tgl_po" required />
                                        <?php endif; ?>
                                    <span class="input-group-btn">
                                    <a href="#" class="btn btn-default" type="button"><i class="fa fa-calendar"></i></a>
                                  </span>                                    
                                </div>    
                            </div>
                          
                          
                           
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Tanggal Kirim PO: ','tgl_kirim_po',array('class'=>'control-label')); ?>
                                    <div class="input-daterange input-group controls" id="datepicker">
                                       <?php if(!empty($default)): //print_r($default);?>

                                        <input id="tgl_kirim_po" value="<?php echo set_value($default['tgl_kirim_po'],date('Y-m-d')); ?>" type="text" class="input-md form-control" name="tgl_kirim_po" required />
                                        <?php else: ?>
                                        <input id="tgl_kirim_po" value="<?php echo date('Y-m-d') ?>"type="text" class=" form-control" name="tgl_kirim_po" required />
                                        <?php endif; ?>
                                    <span class="input-group-btn">
                                    <a href="#" class="btn btn-default" type="button"><i class="fa fa-calendar"></i></a>
                                  </span>                                    
                                </div>    
                            </div>
                            <div class="form-group">

                                <?php echo form_label('Tanggal Kedaluarsa PO: ','tgl_kedaluarsa',array('class'=>'control-label')); ?>
                                    <div class="input-daterange input-group controls" id="datepicker">
                                       <?php if(!empty($default)): //print_r($default);?>

                                        <input id="tgl_kedaluarsa" value="<?php echo set_value($default['tgl_kedaluarsa'],date('Y-m-d')); ?>" type="text" class="input-md form-control" name="tgl_kedaluarsa" required />
                                        <?php else: ?>
                                        <input id="tgl_kedaluarsa" value="<?php echo date('Y-m-d') ?>"type="text" class=" form-control" name="tgl_kedaluarsa" required />
                                        <?php endif; ?>
                                    <span class="input-group-btn">
                                    <a href="#" class="btn btn-default" type="button"><i class="fa fa-calendar"></i></a>
                                  </span>                                    
                                </div>    
                            </div>
                          
                        
                           
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <?php echo form_label('Supplier : ','id_supplier',array('class'=>'control-label')); ?>
                                        <div class="controls">
                                        <?php echo form_dropdown('id_supplier',$opt_supplier,'','id="id_supplier" class="input-lg form-control" placeholder="Enter id_supplier"'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">

                                        <?php echo form_label('id_stock_req : ','id_stock_req',array('class'=>'control-label')); ?>
                                        <div class="input-group">
                                        <div class="controls">
                                        <?php echo form_input('id_stock_req','','id="id_stock_req" class="form-control" placeholder="Enter id_stock_req"'); ?>
                                        </div> 
                                        <span class="input-group-btn">
                                            <a class="btn btn-primary" type="button" data-toggle="modal" href='#modal-detail'><i class="fa fa-search"></i></a>
                                         </span>
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
                                <div class="panel-heading panel-body">
                                     <div class="row entry">
                              
                                   
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                         <div class="tambah row">


                                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                
                                            
                                                <div class="form-group">
                                                    <?php echo form_label('Kode Barang : ','Kode',array('class'=>'control-label')); ?>

                                                    <div class="controls">
                                                    <?php //echo form_input('Kode[]','','id="Kode" class="form-control" placeholder="Enter Kode"'); ?>
                                                    <?php echo form_dropdown('Kode[]',$opt_barang,'','id="Kode" class="kdbarang form-control" placeholder="Enter Kode"'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                              
                                                <div class="form-group">
                                                <?php echo form_label('Jumlah: ','Qty',array('class'=>'control-label')); ?>

                                                    <div class="controls">
                                                    <?php echo form_input('Qty[]','','id="Qty" class="form-control" placeholder="Enter Qty"'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                <div class="form-group">
                                                <?php echo form_label('Satuan : ','Satuan',array('class'=>'control-label')); ?>

                                                    <div class="controls">
                                                    <?php echo form_dropdown('Satuan[]',$opt_satuan,'','id="Satuan" class="satuan form-control" placeholder="Enter Satuan"'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-warning btn-block  btn-lg btn-add" type="button">
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
                                           <table id="datatables" class="tabletemp table table-bordered table-striped" style="width:100%;font-size:13px">
                                            <thead>
                                                <tr>
                                                               
                                                                <th>#</th>
                                                                <th>#PO</th>
                                                                <th>Kode Barang</th>
                                                                <th>Nama Barang</th>
                                                                <th>Jumlah</th>
                                                                <th>Satuan</th>
                                                                <th>Harga</th>
                                                                <th>Sub Total</th>
                                                                <th>Aksi</th>

                                                            </tr>
                                            </thead>

                                            <tbody class="table-bordered">
                                                <tr>
                                                    <td colspan="6" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                                    
                                                </tr>
                                                
                                            </tbody>
                                            </table>
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
                                            <?php echo form_dropdown('id_bayar',$opt_bayar,'','id="id_bayar" class="form-control" placeholder="Enter id_bayar"'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                         
                                        <div class="form-group ">
                                            <?php echo form_label('Uang Muka : ','uangmuka',array('class'=>'control-label')); ?>
                                            <div class="controls">
                                            <?php echo form_input('uangmuka','','id="uangmuka" class="input-lg text-right form-control" placeholder="Enter uangmuka"'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo form_label('Sisa : ','sisa',array('class'=>'control-label')); ?>
                                            <!-- <div class="controls"> -->
                                            <?php echo form_input('sisa','','id="sisa" class="input-lg text-right form-control" placeholder="Sisa"'); ?>
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
                                       
                                       <div class="form-inline bayar">
                          
                                    
                                            <div class="form-group pull-right">
                                                <?php echo form_label('totalbayar : ','totalbayar',array('class'=>'control-label')); ?>
                                                <!-- <div class="controls"> -->
                                                <?php echo form_input('totalbayar','','type="number" id="totalbayar" class="input-lg text-right form-control" placeholder="0"'); ?>
                                                <!-- </div> -->
                                            </div>
                                        
                                            
                                        
                                          
                                        
                                            <div class="form-group pull-right">
                                                <?php echo form_label('biaya_kirim : ','biaya_kirim',array('class'=>'control-label')); ?>
                                                <!-- <div class="controls"> -->
                                                <?php echo form_input('biaya_kirim','','id="biaya_kirim" class="input-lg text-right form-control" placeholder="0"'); ?>
                                                <!-- </div> -->
                                            </div>
                                            <div class="form-group pull-right">
                                                <?php echo form_label('grandtotal : ','grandtotal',array('class'=>'control-label')); ?>
                                                <!-- <div class="controls"> -->
                                                <?php echo form_input('grandtotal','','id="grandtotal" class="input-lg text-right form-control" placeholder="0"'); ?>
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
            




<div class="modal fade" id="modal-detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Detail</h4>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->