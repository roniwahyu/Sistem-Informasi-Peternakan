 <div class="row">
                    <h2 class="text-center" style="margin:20px 0px 30px;">Form Retur Pembelian</h2>
                    <div id="form_input" >
                    <?php echo form_open(base_url().'purchase_return/submit',array('id'=>'retur_form','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('Faktur Transaksi Retur : ','faktur_pr',array('class'=>'control-label')); ?>
                                <div class="input-group">

                                    <div class="controls">

                                    <?php echo form_input('faktur_pr',set_value('faktur_pr', isset($faktur_pr) ? $faktur_pr : ''),'id="faktur_pr" class="form-control" readonly placeholder="Masukkan faktur_pr"'); ?>
                                    </div>
                                    <span class="input-group-btn">
                                            <a href="#" class="gen_pr btn btn-info" type="button"><i class="fa fa-refresh"></i></a>
                                        </span>
                                    </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Tanggal Retur Pembelian (PR): ','tgl_pr',array('class'=>'control-label')); ?>
                                    <div class="input-daterange input-group controls" id="datepicker">
                                        <?php //echo $default['tgl_pr']; ?>
                                        <?php echo form_input('tgl_pr',set_value('tgl_pr', isset($default['tgl_pr']) ? $default['tgl_pr'] : date('Y-m-d')),'id="tgl_pr" class="input-md text-center form-control" placeholder="Masukkan tgl_pr"'); ?>

                                       
                                    <span class="input-group-btn">
                                    <a href="#" class="btn btn-default" type="button"><i class="fa fa-calendar"></i></a>
                                  </span>                                    
                                </div>    
                            </div>
                            
                              
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            
                            <div class="form-group">
                                <?php echo form_label('Jenis Retur: ','tipe_retur',array('class'=>'control-label')); ?>
                                <div class="controls">
                                    <?php $tipe_retur=array(
                                        '0'=>'-- Pilih Tipe Retur --',
                                        '1'=>'Berdasarkan Supplier',
                                        '2'=>'Dari Transaksi Pembelian',
                                    ); ?>

                                    <?php $selected = isset($default['tipe_retur'])? $default['tipe_retur'] : '1';  ?>

                                <?php echo form_dropdown('tipe_retur',$tipe_retur,set_value('tipe_retur', isset($default['tipe_retur']) ? $default['tipe_retur'] : ''),'id="tipe_retur" class="form-control" placeholder="Masukkan tipe_retur"'); ?>
                                </div>
                            </div>
                           <div class="form-group form_pt" style="display:none">
                                <?php echo form_label('Faktur Transaksi Beli : ','id_pt',array('class'=>'control-label')); ?>
                                <div class="input-group">

                                    <div class="controls">
                                    <?php echo form_input('id_pt',set_value('id_pt', isset($default['id_pt']) ? $default['id_pt'] : ''),'id="id_pt" class="form-control hidden" placeholder="Masukkan Faktur Transaksi" readonly'); ?>
                                    <?php //echo $faktur_pt; ?>
                                    <?php echo form_input('id_ptx',set_value('id_ptx', isset($faktur_pt) ? $faktur_pt : ''),'id="id_ptx" class="form-control" placeholder="Masukkan Faktur Transaksi" disabled'); ?>
                                    </div>
                                    <span class="input-group-btn">
                                        <a href="#modal-id" data-toggle="modal" class="load_pt btn btn-primary" ><i class="fa fa-search"></i></a>
                                    </span>
                                </div>
                            </div>
                        
                            
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <?php echo form_label('Supplier : ','id_supplier',array('class'=>'control-label')); ?>
                                <div class="input-group"> 
                                    <span class="input-group-btn">
                                            <a href="#" class="add_supplier btn btn-default" type="button"><i class="fa fa-plus"></i></a>
                                        </span>

                                    <div class="controls">
                                    <?php echo form_dropdown('id_supplier',$opt_supplier,set_value('id_supplier', isset($default['id_supplier']) ? $default['id_supplier'] : ''),'id="id_supplier" class="form-control" placeholder="Masukkan id_supplier"'); ?>
                                    </div>

                                    </div>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('Keterangan Retur : ','keterangan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('keterangan',set_value('keterangan', isset($default['keterangan']) ? $default['keterangan'] : ''),'id="keterangan" class="form-control" placeholder="Masukkan keterangan"'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="panel_tambah panel panel-danger">
                                <div class="panel-body panel-heading">
                                    <div class="tambah row">
                                            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                                                <!-- Large button group -->
                                                

                                            
                                                <div class="form-group">
                                                    <?php echo form_label('Barang : ','Kode',array('class'=>'control-label')); ?>
                                                    <div class="input-group">
                                                        <span class="input-group-btn">
                                                            <div class="btn-group">
                                                              <button class="btn btn-default btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fa fa-plus"></i></span>
                                                              </button>
                                                              <ul class="dropdown-menu" style="color:#999">
                                                                <li>
                                                                    <a class="add_barang" data-toggle="modal" href='#modal-barang' data-load-remote="<?php echo base_url('barang/barang_form/') ?>" data-remote-target="#modal-barang .modal-body"><i class="fa fa-plus"></i> Tambah Baru</a>
                                                                </li>
                                                                <li>
                                                                    <a id="addsatuan" class="add_satuan" data-toggle="modal" href='#modal-satuan' data-load-satuan="" data-id="" data-remote-target="#modal-satuan .modal-body"><i class="fa fa-wrench"></i> Set Satuan Barang</a>
                                                                </li>
                                                                <li><a class="setup_harga" href="#modal-harga" data-id="" data-toggle="modal" data-load-harga="" data-remote-target="#modal-harga .modal-body" ><i class="fa fa-wrench"></i> Set Harga Barang</a></li>
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
                                            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
                                                <div class="form-group">
                                                <?php echo form_label('Satuan : ','Satuan',array('class'=>'control-label')); ?>
                                                 
                                                        
                                                            
                                                        <div class="controls">
                                                        <?php echo form_dropdown('Satuan[]',$opt_satuan,'','id="Satuan" class="satuan input-lg form-control" placeholder="Enter Satuan"'); ?>
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
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                           <!--  <div class="panel panel-default">
                                <div class="panel-body"> -->
                                   
                             
                                    <table id="data" class="tableretur table-condensed table-striped table-bordered" style="width:100%">
                                        <thead class="">
                                            <tr>
                                                           
                                                            <th style="width:10%"class="text-center">#Faktur</th>
                                                            <th style="width:20%"class="text-center">Barang</th>
                                                            <th style="width:5%"class="text-center">Satuan</th>
                                                            <th style="width:10%"class="text-center">Harga/Satuan</th>
                                                            <th style="width:10%"class="text-center">Jumlah</th>
                                                            <th style="width:10%"class="text-center">Subtotal</th>
                                                            <th style="width:20%"class="text-center">Keterangan Retur</th>
                                                            <th style="width:5%"class="text-center">Aksi</th>

                                                        </tr>
                                        </thead>

                                        <tbody class="table-bordered">
                                            <tr>
                                                <td colspan="8" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                                
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                             <!--    </div>
                            </div> -->
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            
                            <div class="form-group">
                                <?php echo form_label('totalretur : ','totalretur',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('totalretur',set_value('totalretur', isset($default['totalretur']) ? $default['totalretur'] : ''),'id="totalretur" class="form-control input-lg text-right hidden" readonly style="font-size:24px;" placeholder="Masukkan totalretur"'); ?>
                                <?php echo form_input('totalreturx',set_value('totalreturx', isset($default['totalretur']) ? rp($default['totalretur']) : ''),'id="totalreturx" class="form-control input-lg text-right" style="font-size:24px;" placeholder="Masukkan totalreturx" disabled'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('bayar : ','bayar',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('bayar',set_value('bayar', isset($default['bayar']) ? $default['bayar'] : ''),'id="bayar" class="form-control input-lg text-right hidden" style="font-size:24px;" readonly placeholder="Masukkan bayar"'); ?>
                                <?php echo form_input('bayarx',set_value('bayarx', isset($default['bayar']) ? rp($default['bayar']) : ''),'id="bayarx" class="form-control input-lg text-right" style="font-size:24px;" placeholder="Masukkan bayarx" disabled'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('biayakirim : ','biayakirim',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('biayakirim',set_value('biayakirim', isset($default['biayakirim']) ? $default['biayakirim'] : ''),'id="biayakirim" class="form-control input-lg text-right hidden" readonly style="font-size:24px;" placeholder="Masukkan biayakirim"'); ?>
                                <?php echo form_input('biayakirimx',set_value('biayakirimx', isset($default['biayakirim']) ? rp($default['biayakirim']) : ''),'id="biayakirimx" class="form-control input-lg text-right" style="font-size:24px;" placeholder="Masukkan biayakirimx" disabled'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('grandtotal : ','grandtotal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('grandtotal',set_value('grandtotal', isset($default['grandtotal']) ? $default['grandtotal'] : ''),'id="grandtotal" class="form-control input-lg text-right hidden" readonly style="font-size:24px;" placeholder="Masukkan grandtotal"'); ?>
                                <?php echo form_input('grandtotalx',set_value('grandtotalx', isset($default['grandtotal']) ? rp($default['grandtotal']) : ''),'id="grandtotalx" class="form-control input-lg text-right" style="font-size:24px;" placeholder="Masukkan grandtotalx" disabled'); ?>
                                </div>
                            </div>
                        
                          
                        
                        </div>
                
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <?php 
                            $act=$this->session->userdata('action');

                            if($act['baru']==1): ?>
                            <button id="save_retur" type="submit" class="btn btn-lg btn-success"><icon class="fa fa-floppy-o"></icon> Simpan</button>
                            <?php elseif($act['edit']==1): ?>
                            <button id="save_edit" type="submit" class="btn btn-lg btn-primary" style=""><icon class="fa fa-refresh"></icon> Perbaiki</button>
                            <?php endif; ?>
                        </div>
                   
                    <?php echo form_close();?>
                    </div>

                    </div>
            


 