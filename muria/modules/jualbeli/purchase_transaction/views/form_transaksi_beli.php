 
            <div class="row">
                    <div id="form_input" style="margin-top:20px">
                    <?php echo form_open(base_url().'purchase_transaction/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <input type="hidden" value='<?php echo isset($default['id'])? $default['id'] : ''; ?>' id="id" name="id">
                            
                            <div class="form-group">
                                    <?php echo form_label('#Faktur Transaksi Beli : ','faktur_pt',array('class'=>'control-label')); ?>
                                    <div class="input-group">
                                        <div class="controls">
                                            <input id="faktur_pt" class="form-control" readonly value="<?php echo !empty($faktur_pt)?$faktur_pt:'' ?>" name="faktur_pt" placeholder=""> 
                                        </div>  
                                        <span class="input-group-btn">
                                            <a href="#" class="generate_pt btn btn-info" type="button"><i class="fa fa-refresh"></i></a>
                                        </span>
                                    </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Tanggal Transaksi Pembelian (PT): ','tgl_pt',array('class'=>'control-label')); ?>
                                    <div class="input-daterange input-group controls" id="datepicker">
                                       <?php if(!empty($default)): //print_r($default);?>
                                        <?php //rint_r($default); ?>
                                        <input id="tgl_pt" value="<?php echo $default['tgl_pt']; ?>" type="text" class="input-md form-control" name="tgl_pt" required />
                                        <?php else: ?>
                                        <input id="tgl_pt" value="<?php echo date('Y-m-d') ?>"type="text" class=" form-control" name="tgl_pt" required />
                                        <?php endif; ?>
                                    <span class="input-group-btn">
                                    <a href="#" class="btn btn-default" type="button"><i class="fa fa-calendar"></i></a>
                                  </span>                                    
                                </div>    
                            </div>
                            <div class="form-group">
                                <?php echo form_label('Tanggal Jatuh Tempo: ','tgl_jatuh_tempo',array('class'=>'control-label')); ?>
                                    <div class="input-daterange input-group controls" id="datepicker">
                                       <?php if(!empty($default)): //print_r($default);?>
                                        <?php //rint_r($default); ?>
                                        <input id="tgl_jatuh_tempo" value="<?php echo $default['tgl_jatuh_tempo']; ?>" type="text" class="input-md form-control" name="tgl_jatuh_tempo" required />
                                        <?php else: ?>
                                        <input id="tgl_jatuh_tempo" value="<?php echo date('Y-m-d') ?>"type="text" class=" form-control" name="tgl_jatuh_tempo" required />
                                        <?php endif; ?>
                                    <span class="input-group-btn">
                                    <a href="#" class="btn btn-default" type="button"><i class="fa fa-calendar"></i></a>
                                  </span>                                    
                                </div>    
                            </div>
                           
                            
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                             <div class="form-group">
                                <?php 
                                $jenis[1]='Langsung';
                                $jenis[2]='Dari Order Pembelian';
                                 ?>
                                <?php echo form_label('Jenis Transaksi: ','id_tipe_beli',array('class'=>'control-label')); ?>
                                <div class="controls">
                                    <?php $selected = isset($default['id_tipe_beli'])? $default['id_tipe_beli'] : '1';  ?>
                                <?php echo form_dropdown('id_tipe_beli',$jenis,$selected,'id="id_tipe_beli" class="form-control" placeholder="Enter id_tipe_beli"'); ?>
                                </div>
                            </div>
                        
                            
                        
                            <div class="form-group">
                                <?php echo form_label('Supplier: ','id_supplier',array('class'=>'control-label')); ?>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a class="add_supplier btn btn-default" data-form="supplier" data-toggle="modal" href='#modal-form' data-load-remote="<?php echo base_url('supplier/simple_forms/') ?>" data-remote-target="#modal-form .modal-body"><i class="fa fa-plus"></i></a>
                                    </span>
                                    <div class="controls">
                                        <?php $select_sp = isset($default['id_supplier'])? $default['id_supplier'] : '0';  ?>
                                    <?php echo form_dropdown('id_supplier',$opt_supplier,$select_sp,'id="id_supplier" class="form-control" placeholder="Enter id_supplier"'); ?>
                                    </div>
                                    
                                </div>
                            </div>
                            <?php if(!empty($default['id_tipe_beli'])):
                                    if($default['id_tipe_beli']==1):
                                        $display="display:none";
                                    else:
                                        $display="";
                                    endif; 
                                else:
                                    $display="display:none";
                                endif;
                             ?>
                            <div id="bypo" style="<?php echo $display; ?>">
                                <div class="form-group">
                                    <?php echo form_label('#Faktur PO: ','faktur_po',array('class'=>'control-label')); ?>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a href="<?php echo base_url('purchase_order') ?>"class=" btn btn-default" ><i class="fa fa-plus"></i></a>
                                        </span>
                                        <div class="controls">
                                            <?php echo form_input('id_po',set_value('id_po', isset($id_po) ? $id_po : ''),'id="id_po" class="form-control hidden" '); ?>
                                            <?php echo form_input('faktur_po',set_value('faktur_po', isset($faktur_po) ? $faktur_po : ''),'id="faktur_po" class="form-control" readonly placeholder="Masukkan #Faktur PO"'); ?>
                                        </div>
                                                
                                        <span class="input-group-btn">
                                            <a data-toggle="modal" href="#modal-id" class="loadpo btn btn-info" ><i class="fa fa-search"></i></a>
                                        </span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            
                          
                        
                            <div class="form-group">
                                <?php echo form_label('Referensi Beli : ','ref_beli',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('ref_beli',set_value('ref_beli', isset($default['ref_beli']) ? $default['ref_beli'] : ''),'id="ref_beli" class="form-control" placeholder="Enter ref_beli"'); ?>
                                </div>
                            </div>
                        
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
                            <div class="form-group">
                                <?php echo form_label('Keterangan : ','keterangan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('keterangan',set_value('keterangan', isset($default['keterangan']) ? $default['keterangan'] : ''),'id="keterangan" class="form-control" placeholder="Enter keterangan"'); ?>
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
                            <table id="data"class="table table-condensed table-striped table-bordered">
                                <thead>
                                    <tr>
                                     
                                        <th>#Faktur</th>
                                        <th>Kode</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Satuan</th>
                                        <th>Harga Satuan</th>
                                        <th>Subtotal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="9" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                 
                            </table>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            
                            <div class="form-group">
                                <?php echo form_label('Cara Pembayaran : ','id_bayar',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_dropdown('id_bayar',$opt_bayar,'','id="id_bayar" class="form-control" placeholder="Enter id_bayar"'); ?>
                                </div>
                            </div>
                        
                            
                        
                        
                            
                            <div class="form-group">
                                <?php echo form_label('status : ','status',array('class'=>'control-label')); ?>
                                <div class="controls">
                                    <?php $status=array(
                                                'Baru'=>'Baru',
                                                'Bayar'=>'Bayar',
                                                'Proses'=>'Proses',
                                                'Selesai'=>'Selesai',
                                            ); ?>
                                <?php echo form_dropdown('status',$status,'','id="status" class="form-control" placeholder="Enter status"'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            
                            <div class="form-group">
                                <?php echo form_label('Uang Muka : ','uangmuka',array('class'=>'control-label')); ?>
                                 <div class="input-group">
                                        <span class="input-group-btn"><span class="btn btn-info btn-lg">Rp.</span></span>
                                        <div class="controls">
                                        <?php echo form_input('uangmuka',set_value('uangmuka', isset($default['uangmuka']) ? $default['uangmuka'] : ''),'id="uangmuka" onkeyup="hitung()" style="font-size:24px" class="form-control input-lg text-right" placeholder="0"'); ?>
                                        </div> 
                                </div> 
                            </div>
                            <div class="form-group">
                                <?php echo form_label('Sisa : ','sisa',array('class'=>'control-label')); ?>
                                 <div class="input-group">
                                        <span class="input-group-btn"><span class="btn btn-default btn-lg">Rp.</span></span>
                                        <div class="controls">
                                            <?php if(isset($default['totalbayar']) && isset($default['uangmuka'])): 
                                                $sisa=$default['totalbayar']-$default['uangmuka'];
                                            else:
                                                $sisa=$default['totalbayar'];
                                            endif; ?>
                                        <?php echo form_input('sisa',$sisa,'id="sisa" onkeyup="hitung()" readonly style="font-size:24px" class="form-control input-lg text-right" placeholder="0"'); ?>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <!-- <div class="form-inline"> -->
                                <div class="form-group">
                                    <?php echo form_label('Total: ','totalbayar',array('class'=>'control-label ')); ?>
                                    <div class="input-group">
                                        <span class="input-group-btn"><span class="btn btn-success btn-lg">Rp.</span></span>
                                    <div class="controls">
                                    
                                    <?php echo form_input('totalbayar',set_value('totalbayar', isset($default['totalbayar']) ? $default['totalbayar'] : ''),'id="totalbayar" onkeyup="hitung()" onchange="hitung()" onmousedown="hitung()" class="form-control text-right hidden" placeholder="0"'); ?>
                                    <?php echo form_input('totalbayarx',set_value('totalbayar', isset($default['totalbayar']) ? ($default['totalbayar']) : ''),'id="totalbayarx" readonly style="font-size:24px" onkeyup="hitung()" onchange="hitung()" onmousedown="hitung()" class="form-control input-lg text-right" placeholder="0"'); ?>
                                    </div>
                                    </div>
                                </div>

                                <div class="form-group">

                                    <?php echo form_label('Biaya Kirim : ','biayakirim',array('class'=>'control-label')); ?>
                                    <div class="input-group">
                                        <span class="input-group-btn"><span class="btn btn-default btn-lg">Rp.</span></span>
                                        <div class="controls">
                                        <?php echo form_input('biayakirim',set_value('biayakirim', isset($default['biayakirim']) ? $default['biayakirim'] : ''),'id="biayakirim" style="font-size:24px" onkeyup="hitung()" onmousedown="hitung()" class="form-control input-lg text-right" placeholder="0"'); ?>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <?php echo form_label('PPn: ','ppn',array('class'=>'control-label')); ?>
                                    <div class="input-group">
                                        <span class="input-group-btn"><span class="btn btn-default btn-lg">%</span></span>

                                            <div class="controls">
                                            <?php echo form_input('ppn',set_value('ppn', isset($default['ppn']) ? $default['ppn'] : ''),'id="ppn" style="font-size:24px" class="form-control input-lg text-right"  onmousedown="hitung()" onkeyup="hitung()" placeholder="0"'); ?>
                                            </div>
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <?php echo form_label('Grand Total : ','grandtotal',array('class'=>'control-label')); ?>
                                    <div class="input-group">
                                        <span class="input-group-btn"><span class="btn btn-danger btn-lg">Rp.</span></span>
                                        <div class="controls">
                                        <?php echo form_input('grandtotal',set_value('grandtotal', isset($default['grandtotal']) ? $default['grandtotal'] : ''),'id="grandtotal" style="" class="form-control text-right hidden" placeholder="0"'); ?>
                                        <?php echo form_input('grandtotalx',set_value('grandtotal', isset($default['grandtotal']) ? ($default['grandtotal']) : ''),'id="grandtotalx" readonly style="font-size:24px" class="form-control input-lg input-warning text-right" onkeyup="hitung()" placeholder="0"'); ?>
                                        </div>
                                    </div>
                                </div>

                            <!-- </div> -->
                        
                            
                        </div>
                
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                          <?php if($this->session->userdata('new')==true && $this->session->userdata('edit')==false ): ?>
                            <button id="save" type="submit" class="btn btn-lg btn-success"><icon class="fa fa-floppy-o"></icon> Simpan</button>
                           <?php elseif($this->session->userdata('new')==false && $this->session->userdata('edit')==true): ?>
                            <button id="save_edit" type="submit" class="btn btn-lg btn-primary" style=""><icon class="fa fa-refresh"></icon> Perbaiki</button>
                        <?php endif; ?>
                                    


                            <a href="#" id="cancel_edit" class="btn btn-lg btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal</a>
                        </div>
                   
                    <?php echo form_close();?>
                    </div>

                </div>
            


 