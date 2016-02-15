 

                    <div id="form_input" class="row">
                    <?php echo form_open(base_url().'sales_order/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <?php echo form_hidden('id',set_value('id', isset($default['id']) ? $default['id'] : ''),'id="id" class="form-control" placeholder="Masukkan id"'); ?>
                          
                            <div class="form-group">
                                <?php echo form_label('faktur : ','faktur',array('class'=>'control-label')); ?>
                                <div class="input-group">

                                <div class="controls">
                                <?php echo form_input('faktur',set_value('faktur', isset($default['faktur']) ? $default['faktur'] : ''),'id="faktur" class="form-control" readonly placeholder="Masukkan faktur"'); ?>
                                </div> <span class="input-group-btn">
                                           <href="#" class="gen_new_kk btn btn-info" type="button"><i class="fa fa-refresh"></i></a>
                                        </span>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Tanggal: ','tgl',array('class'=>'control-label'));?>
                                    <div class="input-daterange input-group controls" id="datepicker">
                                       <?php if(!empty($default['tgl'])): //print_r($default);?>
                                        <?php //rint_r($default); ?>
                                        <input id="tgl" value="<?php echo $default['tgl']; ?>" type="text" class="input-md form-control text-center" name="tgl" required />
                                        <?php else: ?>
                                        <input id="tgl" value="<?php echo date('Y-m-d') ?>"type="text" class=" form-control text-center" name="tgl" required />
                                        <?php endif; ?>
                                    <span class="input-group-btn">
                                    <a href="#" class="btn btn-default" type="button"><i class="fa fa-calendar"></i></a>
                                  </span>                                    
                                </div>    
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                             <div class="form-group">
                                <?php echo form_label('Tanggal Terima: ','tgl_terima',array('class'=>'control-label')); ?>
                                    <div class="input-daterange input-group controls" id="datepicker">
                                       <?php if(!empty($default['tgl_terima'])): //print_r($default);?>
                                        <?php //rint_r($default); ?>
                                        <input id="tgl_terima" value="<?php echo $default['tgl_terima']; ?>" type="text" class="input-md form-control text-center" name="tgl_terima" required />
                                        <?php else: ?>
                                        <input id="tgl_terima" value="<?php echo date('Y-m-d') ?>"type="text" class=" form-control text-center" name="tgl_terima" required />
                                        <?php endif; ?>
                                    <span class="input-group-btn">
                                    <a href="#" class="btn btn-default" type="button"><i class="fa fa-calendar"></i></a>
                                  </span>                                    
                                </div>    
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Tanggal Kedaluarsa SO : ','tgl_kedaluarsa',array('class'=>'control-label')); ?>
                                    <div class="input-daterange input-group controls" id="datepicker">
                                       <?php if(!empty($default['tgl_kedaluarsa'])): //print_r($default);?>
                                        <?php //rint_r($default); ?>
                                        <input id="tgl_kedaluarsa" value="<?php echo $default['tgl_kedaluarsa']; ?>" type="text" class="input-md form-control text-center" name="tgl_kedaluarsa" required />
                                        <?php else: ?>
                                        <input id="tgl_kedaluarsa" value="<?php echo date('Y-m-d') ?>"type="text" class=" form-control text-center" name="tgl_kedaluarsa" required />
                                        <?php endif; ?>
                                    <span class="input-group-btn">
                                    <a href="#" class="btn btn-default" type="button"><i class="fa fa-calendar"></i></a>
                                  </span>                                    
                                </div>    
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                
                            
                            <div class="form-group">
                                <?php echo form_label('Customer: ','id_customer',array('class'=>'control-label')); ?>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a href="#" class="add_customer btn btn-default" type="button"><i class="fa fa-plus"></i></a>
                                    </span>
                            
                                    <div class="controls">
                                        <?php $customer = isset($default['id_customer'])? $default['id_customer'] : '0';  ?>

                                    <?php echo form_dropdown('id_customer',$opt_customer,$customer,'id="id_customer" class="form-control select2"  data-placeholder="Choose a Country..." placeholder="Masukkan id_customer"'); ?>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Salesman: ','id_sales',array('class'=>'control-label')); ?>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a href="#" class="add_customer btn btn-default" type="button"><i class="fa fa-plus"></i></a>
                                    </span>
                            
                                    <div class="controls">
                                        <?php $sales = isset($default['id_sales'])? $default['id_sales'] : '0';  ?>

                                    <?php echo form_dropdown('id_sales',$opt_sales,$sales,'id="id_sales" class="form-control "  data-placeholder="Choose a Country..." placeholder="Masukkan id_sales"'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            
                            <div class="form-group">
                                <?php echo form_label('keterangan : ','keterangan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('keterangan',set_value('keterangan', isset($default['keterangan']) ? $default['keterangan'] : ''),'id="keterangan" class="form-control" placeholder="Masukkan keterangan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('ref : ','ref',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('ref',set_value('ref', isset($default['ref']) ? $default['ref'] : ''),'id="ref" class="form-control" placeholder="Masukkan ref"'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            
                        
                            <div class="panel_tambah panel panel-danger">
                                    <div class="panel-body panel-heading">
                                        <div class="tambah row">
                                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                                 <div class="form-group">
                                                    <?php echo form_label('Golongan Barang: ','jenis',array('class'=>'control-label')); ?>
                                                    <div class="controls">
                                                        <?php 
                                                            $jenis=array(
                                                                '02'=>'Pakan',
                                                                '03'=>'Vaksin',
                                                                '15'=>'Obat',
                                                                )

                                                         ?>
                                                    <?php echo form_dropdown('jenis',$opt_jenis,'','id="jenis" class="form-control input-lg" placeholder="Ayam"'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-12 col-lg-3">
                                             
                                                <div class="form-group">
                                                    <?php echo form_label('Barang: ','id_barang',array('class'=>'control-label')); ?>
                                                    <div class="controls">
                                                    <?php echo form_dropdown('id_barang',$opt_barang,'','id="id_barang" class="form-control input-lg" placeholder="Ayam"'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-1">
                                                
                                                <div class="form-group">
                                                    <?php echo form_label('Jumlah: ','jumlah_satuan',array('class'=>'control-label')); ?>
                                                    <div class="controls">
                                                    <?php echo form_input('jumlah_satuan',set_value('jumlah_satuan', isset($default['jumlah_satuan']) ? $default['jumlah_satuan'] : ''),'id="jumlah_satuan" class="form-control input-lg text-right" placeholder="0"'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
                                                
                                                <div class="form-group">
                                                    <?php echo form_label('Harga Jual: ','harga_jual',array('class'=>'control-label')); ?>
                                                    <div class="controls">
                                                    <?php echo form_input('harga_jual',set_value('harga_jual', isset($default['harga_jual']) ? $default['harga_jual'] : ''),'id="harga_jual" class="form-control input-lg text-right" placeholder="0"'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                                
                                                <div class="form-group">
                                                    <?php echo form_label('Satuan: ','id_satuan',array('class'=>'control-label')); ?>
                                                    <div class="controls">
                                                    <?php echo form_dropdown('id_satuan',$opt_satuan,'','id="id_satuan" class="form-control input-lg" placeholder="id_satuan"'); ?>
                                                    </div>
                                                </div>
                                          
                                            </div>
                                          
                                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-1">
                                                <?php echo form_label('Tambah','',array('class'=>'control-label')); ?>

                                               <a href="#" class="btn-add-so btn btn-lg btn-block btn-primary"><i class="fa fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <table id="data" class="table-detail table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                    
                                                 
                                                        <th>Faktur</th>
                                                        <th>Barang</th>
                                                        <th>Jumlah</th>
                                                        <th>Satuan</th>
                                                        <th>Harga Satuan</th>
                                                        <th>Sub Total</th>
                                                 
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="7" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            
                        </div>
                       <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            
                            <div class="form-group">
                                <?php echo form_label('Uang Muka : ','uangmuka',array('class'=>'control-label')); ?>
                                 <div class="input-group">
                                        <span class="input-group-btn"><span class="btn btn-info btn-lg">Rp.</span></span>
                                        <div class="controls">
                                        <?php echo form_input('uangmuka',set_value('uangmuka', isset($default['uangmuka']) ? $default['uangmuka'] : ''),'id="uangmuka" onkeyup="hitung()" style="" class="form-control text-right hidden" readonly placeholder="0"'); ?>
                                        <?php echo form_input('uangmukax',set_value('uangmukax', isset($default['uangmukax']) ? $default['uangmukax'] : ''),'id="uangmukax" onkeyup="hitung()" style="font-size:24px" class="form-control input-lg text-right" placeholder="0"'); ?>
                                        </div> 
                                </div> 
                            </div>
                            <div class="form-group">
                                <?php echo form_label('Sisa Piutang: ','sisa',array('class'=>'control-label')); ?>
                                 <div class="input-group">
                                        <span class="input-group-btn"><span class="btn btn-default btn-lg">Rp.</span></span>
                                        <div class="controls">
                                            <?php if(isset($default['total']) && isset($default['uangmuka'])): 
                                                $sisa=$default['total']-$default['uangmuka'];
                                            else:
                                                $sisa=$default['total'];
                                            endif; ?>
                                        <?php echo form_input('sisa',$sisa,'id="sisa" onkeyup="hitung()" readonly style="font-size:24px" class="form-control text-right hidden" placeholder="0"'); ?>
                                        <?php echo form_input('sisax',$sisa,'id="sisax" onkeyup="hitung()" readonly style="font-size:24px" class="form-control input-lg text-right" placeholder="0"'); ?>
                                        </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <!-- <div class="form-inline"> -->
                                <div class="form-group">
                                    <?php echo form_label('Total: ','total',array('class'=>'control-label ')); ?>
                                    <div class="input-group">
                                        <span class="input-group-btn"><span class="btn btn-success btn-lg">Rp.</span></span>
                                    <div class="controls">
                                    
                                    <?php echo form_input('total',set_value('total', isset($default['total']) ? $default['total'] : ''),'id="total" onkeyup="hitung()" onchange="hitung()" onmousedown="hitung()" class="form-control text-right hidden" readonly placeholder="0"'); ?>
                                    <?php echo form_input('totalx',set_value('totalx', isset($default['totalx']) ? ($default['totalx']) : ''),'id="totalx" readonly style="font-size:24px" onkeyup="hitung()" onchange="hitung()" onmousedown="hitung()" class="form-control input-lg text-right" placeholder="0"'); ?>
                                    </div>
                                    </div>
                                </div>

                                <div class="form-group">

                                    <?php echo form_label('Biaya Kirim : ','biayakirim',array('class'=>'control-label')); ?>
                                    <div class="input-group">
                                        <span class="input-group-btn"><span class="btn btn-default btn-lg">Rp.</span></span>
                                        <div class="controls">
                                        <?php echo form_input('biayakirim',set_value('biayakirim', isset($default['biayakirim']) ? $default['biayakirim'] : ''),'id="biayakirim" style="" onkeyup="hitung()" onmousedown="hitung()" class="form-control text-right hidden" readonly placeholder="0"'); ?>
                                        <?php echo form_input('biayakirimx',set_value('biayakirimx', isset($default['biayakirimx']) ? $default['biayakirimx'] : ''),'id="biayakirimx" style="font-size:24px" onkeyup="hitung()" onmousedown="hitung()" class="form-control input-lg text-right" placeholder="0"'); ?>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <?php echo form_label('PPn: ','ppn',array('class'=>'control-label')); ?>
                                    <div class="input-group">
                                        

                                            <div class="controls">
                                            <?php echo form_input('ppn',set_value('ppn', isset($default['ppn']) ? $default['ppn'] : ''),'id="ppn" style="font-size:24px" class="form-control input-lg text-right"  onmousedown="hitung()" onkeyup="hitung()" placeholder="0"'); ?>
                                            </div><span class="input-group-btn"><span class="btn btn-default btn-lg">%</span></span>
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
                                <button data-toggle="modal" href="#modal-notif" id="save" type="submit" class="btn btn-lg btn-success"><icon class="fa fa-floppy-o"></icon> Simpan</button>
                                <a href="#" id="cancel" data-faktur="<?php echo $default['faktur'] ?>"class="btn btn-lg btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal Tambah</a>
                            <?php elseif($this->session->userdata('new')==false && $this->session->userdata('edit')==true): ?>
                                <button id="save_edit" type="submit" class="btn btn-lg btn-primary" style="display:none;"><icon class="fa fa-refresh"></icon> Perbaiki</button>
                            <a href="#" id="cancel_edit" data-faktur="<?php echo $default['faktur'] ?>"class="btn btn-lg btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal</a>
                            <?php endif; ?>
                        </div>
                   
                    <?php echo form_close();?>
                    </div>
            


 