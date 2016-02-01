 

                    <div id="form_input" class="row">
                    <?php echo form_open(base_url().'assembly_pakan/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> -->
                        
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                            <input type="hidden" value='' id="id" name="id">
                            
                             <div class="form-group">
                                <?php echo form_label('Faktur : ','faktur',array('class'=>'control-label')); ?>
                                <div class="input-group">
 
                                <div class="controls">
                                <?php echo form_input('faktur',set_value('faktur', isset($default['faktur']) ? $default['faktur'] : ''),'id="faktur" class="form-control" readonly placeholder="faktur"'); ?>
                                </div><span class="input-group-btn">
                                            <a href="#" class="gen_faktur btn btn-info" type="button"><i class="fa fa-refresh"></i></a>
                                        </span>
                                    </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Tanggal Recording: ','tanggal',array('class'=>'control-label')); ?>
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
                        
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                               <div class="form-group">
                                <?php echo form_label('Formulasi: ','id_formulasi',array('class'=>'control-label')); ?>
                                 <div class="input-group">
                                   <span class="input-group-btn">
                                            <a href="#" class="add_gudang btn btn-default" type="button"><i class="fa fa-plus"></i></a>
                                        </span> 
                                   
                                <div class="controls">
                                <?php $formulasi = isset($default['id_formulasi'])? $default['id_formulasi'] : '1';  ?>
                                <?php echo form_dropdown('id_formulasi',$opt_formulasi,$formulasi,'id="id_formulasi" class="form-control select2" placeholder="Enter id_formulasi"'); ?>
                                
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
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                                   <div class="form-group">
                                        <?php echo form_label('Faktur Referensi: ','faktur_reff',array('class'=>'control-label')); ?>
                                        <div class="input-group">
         
                                        <div class="controls">
                                        <?php echo form_input('faktur_reff',set_value('faktur_reff', isset($default['faktur_reff']) ? $default['faktur_reff'] : ''),'id="faktur_reff" class="form-control" readonly placeholder="faktur_reff"'); ?>
                                        </div><span class="input-group-btn">
                                                    <a href="#" class="add_faktur_reff btn btn-info" type="button"><i class="fa fa-refresh"></i></a>
                                                </span>
                                            </div>
                                    </div>  
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                   <div class="controls">
                                                
                                                <div class="checkbox i-checks">
                                                    <label for="is_jrnl" style="padding-left:0px;"> 
                                                        <?php echo form_checkbox('is_jrnl',$default['is_jrnl'],set_checkbox('is_jrnl',$default['is_jrnl'] ,$default['is_jrnl']),'id="is_jrnl" disabled="" style="margin-left:20px" class="form-control"'); ?> 
                                                        <i></i> &nbsp; Jurnal 
                                                    </label>
                                                </div>
                                                <div class="checkbox i-checks">
                                                    <label for="is_trx" style="padding-left:0px;"> 
                                                        <?php echo form_checkbox('is_trx',$default['is_trx'],set_checkbox('is_trx', $default['is_trx'] ,$default['is_trx']),'id="is_trx" disabled="" style="margin-left:20px" class="form-control"'); ?> 
                                                        <i></i> &nbsp; Transaksi 
                                                    </label>
                                                </div>
                                            </div>        
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                
                                                <div class="form-group">
                                                    <?php echo form_label('Keterangan: ','keterangan',array('class'=>'control-label')); ?>
                                                    <div class="controls">
                                                    <?php echo form_input('keterangan',set_value('keterangan', isset($default['keterangan']) ? $default['keterangan'] : ''),'id="keterangan" class="form-control" placeholder="keterangan"'); ?>
                                                    </div>
                                                </div>
                                          
                                            </div>
                            </div>
                        </div>
                        
                            
                        
                        
                          
                        <!-- </div> -->
                      
                         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            
                        
                            <div class="panel_tambah panel panel-danger">
                                    <div class="panel-body panel-heading">
                                        <h3>Pencampuran Stok/Feeds Assembly</h3>
                                        <div class="tambah row">
                                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                                 <div class="form-group">
                                                    <?php echo form_label('Golongan Barang: ','jenis',array('class'=>'control-label')); ?>
                                                    <div class="controls">
                                                        <?php 
                                                            $jenis=array(
                                                                '02'=>'Pakan',
                                                                '03'=>'Vaksin',
                                                                '15'=>'Obat'
                                                                )

                                                         ?>
                                                    <?php echo form_dropdown('jenis',$jenis,'','id="jenis" class="form-control input-lg" placeholder="Ayam"'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                             
                                                <div class="form-group">
                                                    <?php echo form_label('Pakan/Vaksin/Obat: ','id_barang',array('class'=>'control-label')); ?>
                                                    <div class="controls">
                                                    <?php echo form_dropdown('id_barang',$opt_pakan,'','id="id_barang" class="form-control input-lg" placeholder="Ayam"'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                                
                                                <div class="form-group">
                                                    <?php echo form_label('Jumlah: ','jumlah_satuan',array('class'=>'control-label')); ?>
                                                    <div class="controls">
                                                    <?php echo form_input('jumlah_satuan',set_value('jumlah_satuan', isset($default['jumlah_satuan']) ? $default['jumlah_satuan'] : ''),'id="jumlah_satuan" class="form-control input-lg text-right" placeholder="Jumlah"'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                                
                                                <div class="form-group">
                                                    <?php echo form_label('Satuan: ','id_satuan',array('class'=>'control-label')); ?>
                                                    <div class="controls">
                                                    <?php echo form_dropdown('id_satuan',$opt_satuan,'','id="id_satuan" class="form-control input-lg" placeholder="id_satuan"'); ?>
                                                    </div>
                                                </div>
                                          
                                            </div>
                                          
                                            <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">
                                                <?php echo form_label('Tambah','',array('class'=>'control-label')); ?>

                                               <a href="#" class="btn-add-assy btn btn-lg btn-block btn-primary"><i class="fa fa-plus"></i></a>
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
                                                        <th>Pakan</th>
                                                       
                                                        <th>Jumlah</th>
                                                        <th>Satuan</th>
                                                        <th>Harga</th>
                                                        <th>Subtotal</th>
                                                   
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
                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="panel panel-primary ">
                                <div class="panel-heading">
                                    <h3>Hasil Pakan Jadi</h3>
                                </div>
                                <div class="panel-body row barangjadi">
                                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                                        <div class="form-group">
                                            <?php echo form_label('Barang Jadi: ','id_barang_jadi',array('class'=>'control-label')); ?>
                                            <div class="controls">
                                            <?php echo form_dropdown('id_barang_jadi',$opt_jadi,set_value('id_barang_jadi', isset($default['id_barang_jadi']) ? $default['id_barang_jadi'] : ''),'id="id_barang_jadi" class="form-control" placeholder="Masukkan id_barang_jadi"'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
                                        <div class="form-group">
                                            <?php echo form_label('Satuan: ','id_satuan_jadi',array('class'=>'control-label')); ?>
                                            <div class="controls">
                                            <?php echo form_dropdown('id_satuan_jadi',$opt_satuan,set_value('id_satuan_jadi', isset($default['id_satuan_jadi']) ? $default['id_satuan_jadi'] : ''),'id="id_satuan_jadi" class="form-control" placeholder="Masukkan id_satuan_jadi"'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
                                        <div class="form-group">
                                            <?php echo form_label('Jumlah : ','jumlah',array('class'=>'control-label')); ?>
                                            <div class="controls">
                                            <?php echo form_input('jumlah',set_value('jumlah', isset($default['jumlah']) ? $default['jumlah'] : ''),'id="jumlah" class="form-control text-right" placeholder="Masukkan jumlah"'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                                        <div class="form-group">
                                            <?php echo form_label('Harga : ','harga',array('class'=>'control-label text-right')); ?>
                                            <div class="controls">
                                            <?php echo form_input('harga',set_value('harga', isset($default['harga']) ? $default['harga'] : ''),'id="harga" class="form-control text-right" placeholder="Masukkan harga"'); ?>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                                        <div class="form-group">
                                            <?php echo form_label('Total: ','total_jadi',array('class'=>'control-label')); ?>
                                            <div class="controls">
                                            <?php echo form_input('total_jadi',set_value('total_jadi', isset($default['total_jadi']) ? $default['total_jadi'] : ''),'id="total_jadi" class="form-control text-right hidden" readonly placeholder="0"'); ?>
                                            <?php echo form_input('total_jadix',set_value('total_jadix', isset($default['total_jadix']) ? $default['total_jadix'] : ''),'id="total_jadix" class="form-control text-right" readonly placeholder="0"'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">
                                                <?php echo form_label('Tambah','',array('class'=>'control-label')); ?>

                                               <a href="#" class="btn-add-brgjadi btn btn-block btn-primary"><i class="fa fa-plus"></i></a>
                                            </div>
                                
                                    <!-- <div class="form-group">
                                        <?php echo form_label('akun_hpp : ','akun_hpp',array('class'=>'control-label')); ?>
                                        <div class="controls">
                                        <?php echo form_input('akun_hpp',set_value('akun_hpp', isset($default['akun_hpp']) ? $default['akun_hpp'] : ''),'id="akun_hpp" class="form-control" placeholder="Masukkan akun_hpp"'); ?>
                                        </div>
                                    </div>
                                
                                    <div class="form-group">
                                        <?php echo form_label('akun_perkiraan : ','akun_perkiraan',array('class'=>'control-label')); ?>
                                        <div class="controls">
                                        <?php echo form_input('akun_perkiraan',set_value('akun_perkiraan', isset($default['akun_perkiraan']) ? $default['akun_perkiraan'] : ''),'id="akun_perkiraan" class="form-control" placeholder="Masukkan akun_perkiraan"'); ?>
                                        </div>
                                    </div>
                                    -->
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            
                        </div>

                         <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            
                            <div class="form-group">
                                <?php echo form_label('total : ','total',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('total',set_value('total', isset($default['total']) ? $default['total'] : ''),'id="total" class="form-control hidden" readonly  placeholder="Rp"'); ?>
                                <?php echo form_input('totalx',set_value('totalx', isset($default['totalx']) ? $default['totalx'] : ''),'id="totalx" class="form-control text-right " readonly style="font-size:20px;" placeholder="Rp"'); ?>
                                </div>
                            </div>
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
            


 