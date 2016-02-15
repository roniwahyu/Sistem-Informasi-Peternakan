 

                    <div id="form_input" class="row">
                    <?php echo form_open(base_url().'receive_item/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('Faktur : ','faktur',array('class'=>'control-label')); ?>
                                <div class="input-group">
 
                                <div class="controls">
                                <?php echo form_input('faktur',set_value('faktur', isset($default['faktur']) ? $default['faktur'] : ''),'id="faktur" class="form-control" readonly placeholder="faktur"'); ?>
                                </div><span class="input-group-btn">
                                            <a href="#" class="gen_faktur btn btn-info" type="button"><i class="fa fa-search"></i></a>
                                        </span>
                                    </div>
                            </div>
                        
                        
                            <div class="form-group">
                                <?php echo form_label('Faktur Referensi : ','faktur_reff',array('class'=>'control-label')); ?>
                                <div class="input-group">
 
                                <div class="controls">
                                <?php echo form_input('faktur_reff',set_value('faktur_reff', isset($default['faktur_reff']) ? $default['faktur_reff'] : ''),'id="faktur_reff" class="form-control" readonly placeholder="faktur_reff"'); ?>
                                </div><span class="input-group-btn">
                                            <a href="#" class="gen_faktur btn btn-info" type="button"><i class="fa fa-search"></i></a>
                                        </span>
                                    </div>
                            </div>
                             <div class="form-group">
                                <?php echo form_label('Tanggal: ','tanggal',array('class'=>'control-label')); ?>
                                    <div class="input-daterange input-group controls" id="datepicker">
                                       <?php if(!empty($default['tanggal'])): //print_r($default);?>
                                        <?php //rint_r($default); ?>
                                        <input id="tanggal" value="<?php echo $default['tanggal']; ?>" type="text" class="input-md form-control" name="tanggal" required />
                                        <?php else: ?>
                                        <input id="tanggal" value="<?php echo date('Y-m-d') ?>"type="text" class=" form-control" name="tanggal" required />
                                        <?php endif; ?>
                                    <span class="input-group-btn">
                                    <a href="#" class="btn btn-default" type="button"><i class="fa fa-calendar"></i></a>
                                  </span>                                    
                                </div>    
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Supplier : ','id_supplier',array('class'=>'control-label')); ?>
                                
                                <div class="controls">
                                <?php $customer = isset($default['id_supplier'])? $default['id_supplier'] : '1';  ?>
                                <?php echo form_dropdown('id_supplier',$opt_customer,$customer,'id="id_supplier" class="form-control select2" placeholder="Enter id_supplier"'); ?>
                                </div>
                                    
                            </div>
                            <div class="form-group">
                                <?php echo form_label('#DO Supplier: ','faktur_do',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('faktur_do',set_value('faktur_do', isset($default['faktur_do']) ? $default['faktur_do'] : ''),'id="faktur_do" class="form-control" placeholder="Masukkan faktur_do"'); ?>
                                </div>
                            </div>
                        
                         
                           
                            
                        
                            <div class="form-group">
                                <?php echo form_label('Tanggal Terima Barang: ','tanggal_terima',array('class'=>'control-label')); ?>
                                    <div class="input-daterange input-group controls" id="datepicker">
                                       <?php if(!empty($default['tanggal_terima'])): //print_r($default);?>
                                        <?php //rint_r($default); ?>
                                        <input id="tanggal_terima" value="<?php echo $default['tanggal_terima']; ?>" type="text" class="input-md form-control" name="tanggal_terima" required />
                                        <?php else: ?>
                                        <input id="tanggal_terima" value="<?php echo date('Y-m-d') ?>"type="text" class=" form-control" name="tanggal_terima" required />
                                        <?php endif; ?>
                                    <span class="input-group-btn">
                                    <a href="#" class="btn btn-default" type="button"><i class="fa fa-calendar"></i></a>
                                  </span>                                    
                                </div>    
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Mitra : ','id_mitra',array('class'=>'control-label')); ?>
                                 <div class="input-group"><span class="input-group-btn">
                                            <a href="#" class="add_mitra btn btn-default" type="button"><i class="fa fa-plus"></i></a>
                                        </span>
                                    <div class="controls">
                                    <?php $mitra = isset($default['id_mitra'])? $default['id_mitra'] : '1';  ?>
                                    <?php echo form_dropdown('id_mitra',$opt_mitra,$mitra,'id="id_mitra" class="form-control" placeholder="Enter id_mitra"'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('Gudang : ','id_gudang',array('class'=>'control-label')); ?>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a href="#" class="add_gudang btn btn-default" type="button"><i class="fa fa-plus"></i></a>
                                        </span> 
                                           
                                        <div class="controls">
                                        <?php $gudang = isset($default['id_gudang'])? $default['id_gudang'] : '1';  ?>
                                        <?php echo form_dropdown('id_gudang',$opt_gudang,$gudang,'id="id_gudang" class="form-control" placeholder="Enter id_gudang"'); ?>
                                        
                                        </div> 
                                </div>
                            </div>  
                             <div class="form-group">
                                <?php echo form_label('Kandang : ','id_kandang',array('class'=>'control-label')); ?>
                                    <div class="input-group">
                                        <span class="input-group-btn"><a href="#" class="add_kandang btn btn-default" type="button"><i class="fa fa-plus"></i></a></span>
                                            <div class="controls">
                                                <?php $kandang = isset($default['id_kandang'])? $default['id_kandang'] : '1';  ?>
                                                <?php echo form_dropdown('id_kandang',$opt_kandang,$kandang,'id="id_kandang" class="form-control" placeholder="Enter id_kandang"'); ?>
                                            </div>
                                    </div>
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            
                            <div class="form-group">
                                <?php echo form_label('kirim_via : ','kirim_via',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kirim_via',set_value('kirim_via', isset($default['kirim_via']) ? $default['kirim_via'] : ''),'id="kirim_via" class="form-control" placeholder="Masukkan kirim_via"'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('alamat_terima : ','alamat_terima',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_textarea('alamat_terima',set_value('alamat_terima', isset($default['alamat_terima']) ? $default['alamat_terima'] : ''),'id="alamat_terima" style="height:120px" class="form-control" placeholder="Masukkan alamat_terima"'); ?>
                                </div>
                            </div>
                           
                              
                           
                        
                        </div>
                    </div>
                    <!-- <div class="panel panel-default"> -->
                        <!-- <div class="panel-body"> -->
                       
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                        
                            <div class="form-group">
                                <?php echo form_label('NOPOL : ','nopol_pengirim',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nopol_pengirim',set_value('nopol_pengirim', isset($default['nopol_pengirim']) ? $default['nopol_pengirim'] : ''),'id="nopol_pengirim" class="form-control" placeholder="Masukkan nopol_pengirim"'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                            
                            <div class="form-group">
                                <?php echo form_label('Supir : ','nama_pengirim',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nama_pengirim',set_value('nama_pengirim', isset($default['nama_pengirim']) ? $default['nama_pengirim'] : ''),'id="nama_pengirim" class="form-control" placeholder="Masukkan nama_pengirim"'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            
                           
                            <div class="form-group">
                                <?php echo form_label('keterangan : ','keterangan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('keterangan',set_value('keterangan', isset($default['keterangan']) ? $default['keterangan'] : ''),'id="keterangan" class="form-control" placeholder="Masukkan keterangan"'); ?>
                                </div>
                            </div>
                          
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                             <div class="form-group">
                                <?php echo form_label('Persetujuan : ','is_approved',array('class'=>'control-label')); ?>
                                <div class="checkbox i-checks">
                                    <label for="is_approved" style="padding-left:0px;"> 
                                                        <?php 
                                                        $checkbox = array(
                                                            'name'        => 'is_approved',
                                                            'value'       => $default['is_approved'],
                                                            'checked'     => set_checkbox('is_approved', $default['is_approved'],0));
                                                            echo form_checkbox($checkbox);
                                                         ?>
                                                        <i></i> &nbsp; Setujui
                                                    </label>
                                </div>
                            </div>
                        </div>
                   
                        </div>
                    <!-- </div> -->
                    <!-- </div> -->
                    <div class="row">
                         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            
                        
                            <div class="panel_tambah panel panel-danger">
                                    <div class="panel-body panel-heading">
                                        <div class="tambah row">
                                            <div class="col-xs-12 col-sm-6 col-md-12 col-lg-3">
                                             
                                                <div class="form-group">
                                                    <?php echo form_label('Ayam: ','id_barang',array('class'=>'control-label')); ?>
                                                    <div class="controls">
                                                    <?php echo form_dropdown('id_barang',$opt_barang,'','id="id_barang" class="form-control input-lg" placeholder="Ayam"'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
                                                
                                                <div class="form-group">
                                                    <?php echo form_label('Jumlah: ','jumlah',array('class'=>'control-label')); ?>
                                                    <div class="controls">
                                                    <?php echo form_input('jumlah',set_value('jumlah', isset($default['jumlah']) ? $default['jumlah'] : ''),'id="jumlah" class="form-control input-lg text-right" placeholder="Jumlah"'); ?>
                                                    </div>
                                                </div>
                                            </div> 
                                           
                                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
                                                
                                                <div class="form-group">
                                                    <?php echo form_label('Satuan: ','id_satuan',array('class'=>'control-label')); ?>
                                                    <div class="controls">
                                                    <?php echo form_dropdown('id_satuan',$opt_satuan,'','id="id_satuan" class="form-control input-lg" placeholder="id_satuan"'); ?>
                                                    </div>
                                                </div>
                                          
                                            </div>
                                           <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                                
                                                <div class="form-group">
                                                    <?php echo form_label('Keterangan Barang: ','ket_detail',array('class'=>'control-label')); ?>
                                                    <div class="controls">
                                                    <?php echo form_input('ket_detail',set_value('ket_detail', isset($default['ket_detail']) ? $default['ket_detail'] : ''),'id="ket_detail" class="form-control input-lg text-right" placeholder="Jumlah"'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-1">
                                                <?php echo form_label('Tambah','',array('class'=>'control-label')); ?>

                                               <a href="#" class="btn-add-req btn btn-lg btn-block btn-primary"><i class="fa fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                             <table id="data" class="table-terima table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>faktur</th>
                                                        
                                                        <th>Nama Barang</th>
                                                        <th>Jumlah</th>
                                                        
                                                        <th>Satuan</th>
                                                       
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="8" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <a id="save" type="submit" class="btn btn-lg btn-success" href="#modal-notif" data-toggle="modal"><icon class="fa fa-floppy-o"></icon> Simpan</a>
                            <button id="save_edit" type="submit" class="btn btn-lg btn-primary" style="display:none;"><icon class="fa fa-refresh"></icon> Perbaiki</button>
                            <a href="#modal-notif" data-toggle="modal" id="cancel_edit" class="btn btn-lg btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal</a>
                        </div>
                   
                    <?php echo form_close();?>
                    </div>
            


 