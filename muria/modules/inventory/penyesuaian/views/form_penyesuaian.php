 

                    <div id="form_input" class="row">
                    <?php echo form_open(base_url().'penyesuaian/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
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
                                <?php echo form_label('Tanggal Mutasi: ','tanggal',array('class'=>'control-label')); ?>
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
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
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
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                   
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
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    
                                    <div class="form-group">
                                        <?php echo form_label('Akun Rekening : ','akun',array('class'=>'control-label')); ?>
                                        <div class="input-group">
         
                                        <div class="controls">
                                        <?php echo form_input('akun',set_value('akun', isset($default['akun']) ? $default['akun'] : ''),'id="akun" class="form-control" readonly placeholder="akun"'); ?>
                                        </div><span class="input-group-btn">
                                                    <a href="#" class="gen_faktur btn btn-info" type="button"><i class="fa fa-search"></i></a>
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
                                        <?php echo form_input('keterangan',set_value('keterangan', isset($default['keterangan']) ? $default['keterangan'] : ''),'id="keterangan" class="form-control" placeholder="Masukkan keterangan"'); ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        
                            
                        </div>
                        </div>
                        <div class="row">
                             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                
                            
                                <div class="panel_tambah panel panel-danger">
                                        <div class="panel-body panel-heading">
                                            <div class="tambah row">
                                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                                 
                                                    <div class="form-group">
                                                        <?php echo form_label('Barang: ','id_barang',array('class'=>'control-label')); ?>
                                                        <div class="controls">
                                                        <?php echo form_dropdown('id_barang',$opt_barang,'','id="id_barang" class="form-control input-lg select2" placeholder="Ayam"'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                                    
                                                    <div class="form-group">
                                                        <?php echo form_label('Jumlah Saat Ini: ','jumlah',array('class'=>'control-label')); ?>
                                                        <div class="controls">
                                                        <?php echo form_input('jumlah',set_value('jumlah', isset($default['jumlah']) ? $default['jumlah'] : ''),'id="jumlah" class="form-control input-lg text-right" placeholder="Jumlah"'); ?>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                                    
                                                    <div class="form-group">
                                                        <?php echo form_label('Jumlah Baru: ','jumlah_baru',array('class'=>'control-label')); ?>
                                                        <div class="controls">
                                                        <?php echo form_input('jumlah_baru',set_value('jumlah_baru', isset($default['jumlah_baru']) ? $default['jumlah_baru'] : ''),'id="jumlah_baru" class="form-control input-lg text-right" placeholder="Jumlah"'); ?>
                                                        </div>
                                                    </div>
                                                </div> 

                                                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                                    
                                                    <div class="form-group">
                                                        <?php echo form_label('Satuan: ','id_satuan',array('class'=>'control-label')); ?>
                                                        <div class="controls">
                                                        <?php echo form_dropdown('id_satuan',$opt_satuan,'','id="id_satuan" class="form-control input-lg" placeholder="id_satuan"'); ?>
                                                        </div>
                                                    </div>
                                              
                                                </div>
                                              <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                                    
                                                    <div class="form-group">
                                                        <?php echo form_label('Keterangan: ','ket_detail',array('class'=>'control-label')); ?>
                                                        <div class="controls">
                                                        <?php echo form_input('ket_detail',set_value('ket_detail', isset($default['ket_detail']) ? $default['ket_detail'] : ''),'id="ket_detail" class="form-control input-lg " placeholder="Keterangan"'); ?>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">
                                                    <?php echo form_label('Tambah','',array('class'=>'control-label')); ?>

                                                   <a href="#" class="btn-add-fix btn btn-lg btn-block btn-primary"><i class="fa fa-plus"></i></a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                             <table id="data" class="table-penyesuaian table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>Faktur</th>
                                                        <th>Barang</th>
                                                        <th>Jumlah Lama</th>
                                                        <th>Jumlah Baru</th>
                                                        <th>Satuan</th>
                                                        <th>Keterangan</th>
                                                     
                                                      
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
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                            
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                            
                           
                        
                        
                        </div>
                
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <button id="save" type="submit" class="btn btn-lg btn-success"><icon class="fa fa-floppy-o"></icon> Simpan</button>
                            <button id="save_edit" type="submit" class="btn btn-lg btn-primary" style="display:none;"><icon class="fa fa-refresh"></icon> Perbaiki</button>
                            <a href="#" id="cancel_edit" class="btn btn-lg btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal</a>
                        </div>
                   
                    <?php echo form_close();?>
                    </div>
            


 