     

                    <div id="form_input " class="po_form min-gutter">
                    <?php echo form_open(base_url().'purchase_order/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            <input type="hidden" value='<?php echo !empty($default['id'])?$default['id']:'' ?>' id="id" name="id"> 
                            <div class="form-group">
                            <?php echo form_label('#Faktur PO: ','faktur_po',array('class'=>'control-label')); ?>

                            <div class="input-group">

                              <input name="faktur_po" id="faktur_po" value="<?php echo !empty($nopo)?$nopo:'' ?>" type="text" class="form-control" placeholder="<?php echo !empty($nopo)?$nopo:'' ?>" readonly>
                              <span class="input-group-btn">
                                <a href="#" class="generate_po btn btn-info" type="button"><i class="fa fa-refresh"></i></a>

                              </span>
                            </div>
                            </div><!-- /input-group -->
                           <div class="form-group">
                                <?php echo form_label('Tanggal PO: ','tgl_po',array('class'=>'control-label')); ?>
                                    <div class="input-daterange input-group controls" id="datepicker">
                                       <?php if(!empty($default)): //print_r($default);?>
                                        <?php //rint_r($default); ?>
                                        <input id="tgl_po" value="<?php echo $default['tgl_po']; ?>" type="text" class="input-md form-control" name="tgl_po" required />
                                        <?php else: ?>
                                        <input id="tgl_po" value="<?php echo date('Y-m-d') ?>"type="text" class=" form-control" name="tgl_po" required />
                                        <?php endif; ?>
                                    <span class="input-group-btn">
                                    <a href="#" class="btn btn-default" type="button"><i class="fa fa-calendar"></i></a>
                                  </span>                                    
                                </div>    
                            </div>
                          
                          
                           
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
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
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
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

                                        <?php echo form_label('Stock Request # : ','id_stock_req',array('class'=>'control-label')); ?>
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
                                        <?php echo form_label('Keterangan : ','keterangan',array('class'=>'control-label')); ?>
                                        <div class="controls">
                                        <?php echo form_input('keterangan','','id="keterangan" class="form-control" placeholder="Enter keterangan"'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    <hr>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="panel panel-warning">
                                <div class="panel-heading panel-body">
                                    <div class="row entry">
                              
                                   
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                         <div class="tambah row">


                                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                
                                            
                                                <div class="form-group">
                                                    <?php echo form_label('Kode Barang : ','Kode',array('class'=>'control-label')); ?>
                                                    <div class="input-group">
                                                         <span class="input-group-btn">
                                                            <div class="btn-group">
                                                              <button class="btn btn-default btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fa fa-plus"></i>
                                                              </button>
                                                              <ul class="dropdown-menu" style="color:#999">
                                                                <li>
                                                                    <a class="add_barang" data-toggle="modal" href='#modal-barang' data-load-remote="<?php echo base_url('barang/barang_form/') ?>" data-remote-target="#modal-barang .modal-body"><i class="fa fa-plus"></i> Tambah Baru</a>
                                                                </li>
                                                                <li><a href="#"><i class="fa fa-wrench"></i> Set Harga Barang</a></li>
                                                                
                                                              </ul>
                                                            </div>

                                                        </span>
                                                        <div class="controls">
                                                        <?php //echo form_input('Kode[]','','id="Kode" class="form-control" placeholder="Enter Kode"'); ?>
                                                        <?php echo form_dropdown('Kode[]',$opt_barang,'','id="Kode" class="kdbarang input-lg form-control" placeholder="Enter Kode"'); ?>
                                                        </div>
                                                        <span class="input-group-btn">
                                                            <a href="#" class="refresh_barang btn btn-success btn-lg" type="button"><i class="fa fa-refresh"></i></a>

                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                                              
                                                <div class="form-group">
                                                <?php echo form_label('Jumlah: ','Qty',array('class'=>'control-label')); ?>

                                                    <div class="controls">
                                                    <?php echo form_input('Qty[]','','id="Qty" class="input-lg form-control" placeholder="Enter Qty"'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                <div class="form-group">
                                                <?php echo form_label('Satuan : ','Satuan',array('class'=>'control-label')); ?>
                                                <div class="input-group">
                                                         <span class="input-group-btn">
                                                            <div class="btn-group">
                                                              <button class="btn btn-default btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fa fa-plus"></i>
                                                              </button>
                                                              <ul class="dropdown-menu" style="color:#999">
                                                                <li>
                                                                    <a id="addsatuan" class="add_satuan" data-barang="" data-toggle="modal" href='#modal-satuan' data-load-satuan="" data-remote-target="#modal-satuan .modal-body"><i class="fa fa-plus"></i> Tambah Baru</a>
                                                                </li>
                                                                <li><a href="#"><i class="fa fa-wrench"></i> Set Harga Barang</a></li>
                                                                
                                                              </ul>
                                                            </div>

                                                        </span>
                                                    <div class="controls">
                                                    <?php echo form_dropdown('Satuan[]',$opt_satuan,'','id="Satuan" class="satuan input-lg form-control" placeholder="Enter Satuan"'); ?>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
                                                <?php echo form_label('&nbsp; ','',array('class'=>'control-label')); ?>

                                                <!-- <span class="input-group-btn"> -->
                                                    <button class="btn btn-info btn-block  btn-lg btn-add" type="button">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                <!-- </span> -->
                                            </div>
                                        </div>
                                    </div>

                                    </div>
                                </div>
                            </div>
                          
                            
                        <!-- </div> -->
                        <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> -->
                            <!-- <div class="row"> -->
                                <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> -->
                                    <!-- <div class="panel panel-info"> -->
                                        <!-- <div class="panel-body"> -->
                                           <table id="data" class="tabletemp table table-bordered table-striped" style="width:100%;font-size:13px">
                                            <thead>
                                                <tr class="text-center">
                                                               
                                                                <th style="width:5%">#</th>
                                                                <!-- <th>#PO</th> -->
                                                                <th style="width:10%" class="text-center">Kode Barang</th>
                                                                <th style="width:30%" class="text-center">Nama Barang</th>
                                                                <th style="width:10%" class="text-center">Jumlah</th>
                                                                <th style="width:10%" class="text-center">Satuan</th>
                                                                <th style="width:15%"  class="text-center" >Harga</th>
                                                                <th style="width:25%" class="text-center">Sub Total</th>
                                                                <th style="width:10%" >Aksi</th>

                                                            </tr>
                                            </thead>

                                            <tbody class="table-bordered">
                                                <tr>
                                                    <td colspan="8" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                                    
                                                </tr>
                                                
                                            </tbody>
                                            </table> 
                                            <table id="datax" class="tabledetail table table-bordered table-striped" style="width:100%;font-size:13px;display:none">
                                            <thead>
                                                <tr class="text-center">
                                                               
                                                                <th style="width:5%">#</th>
                                                                <!-- <th>#PO</th> -->
                                                                <th style="width:10%" class="text-center">Kode Barang</th>
                                                                <th style="width:30%" class="text-center">Nama Barang</th>
                                                                <th style="width:10%" class="text-center">Jumlah</th>
                                                                <th style="width:10%" class="text-center">Satuan</th>
                                                                <th style="width:15%"  class="text-center" >Harga</th>
                                                                <th style="width:25%" class="text-center">Sub Total</th>
                                                                <th style="width:10%" >Aksi</th>

                                                            </tr>
                                            </thead>

                                            <tbody class="table-bordered">
                                                <tr>
                                                    <td colspan="8" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                                    
                                                </tr>
                                                
                                            </tbody>
                                            </table>
                                        <!-- </div> -->
                                    <!-- </div> -->
                                    
                                <!-- </div> -->
                            <!-- </div> -->
                           
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                        <div class="form-group">
                                            <?php $status=array(
                                                'Baru'=>'Baru',
                                                'Terkirim'=>'Terkirim',
                                                'Proses'=>'Proses',
                                                'Selesai'=>'Selesai',
                                            ); ?>
                                            <?php echo form_label('Status : ','status',array('class'=>'control-label')); ?>
                                            <div class="controls">
                                            <?php echo form_dropdown('status',$status,'','id="status" class="form-control" placeholder="Enter status"'); ?>
                                            </div>
                                        </div>
                                        
                           
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                      <div class="form-group">
                                            <?php echo form_label('Cara Pembayaran : ','id_bayar',array('class'=>'control-label')); ?>
                                            <div class="controls">
                                            <?php echo form_dropdown('id_bayar',$opt_bayar,'','id="id_bayar" class="form-control" placeholder="Enter id_bayar"'); ?>
                                            </div>
                                        </div>
                           
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                             <!-- <div class="form-inline pull-right"> -->
                                            <div class="form-group">
                                                <?php echo form_label('Total: ','totalbayar',array('class'=>'control-label')); ?>
                                                <!-- <div class="controls"> -->
                                                <input class="totalbayar form-control text-right hidden" value="<?php echo !empty($default['totalbayar'])?$default['totalbayar']:'' ?>"  id="totalbayar" name="totalbayar" type="text" readonly />
                                                <input class="totalbayarx form-control input-lg text-right" value="<?php echo !empty($default['totalbayarx'])?$default['totalbayarx']:'' ?>" style="font-size:24px;" id="totalbayarx" name="totalbayarx" type="text" readonly />
                                                <!-- </div> -->
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