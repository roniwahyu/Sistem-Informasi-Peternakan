 

                    <div id="form_input" class="row">
                    <?php echo form_open(base_url().'formulasi/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                          
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <div class="panel panel-default">
                                <div class="panel-heading panel-body">
                                   <h3>Informasi Formula</h3>
                              
                            
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
                                <?php echo form_label('Nama Formula : ','nama',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nama',set_value('nama', isset($default['nama']) ? $default['nama'] : ''),'id="nama" class="form-control" placeholder="Masukkan nama"'); ?>
                                </div>
                            </div>
                           <div class="form-group">
                                <?php echo form_label('Tanggal Formulasi: ','tanggal',array('class'=>'control-label')); ?>
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
                            <div class="form-group">
                                <?php echo form_label('Keterangan : ','keterangan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('keterangan',set_value('keterangan', isset($default['keterangan']) ? $default['keterangan'] : ''),'id="keterangan" class="form-control" placeholder="Masukkan keterangan"'); ?>
                                </div>
                            </div>
                              </div>
                            </div>
                           
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <div class="panel panel-default">
                                <div class="panel-heading panel-body">
                             
                            <h3>Formula Untuk:</h3>
                             <div class="form-group">
                                <?php echo form_label('Mitra : ','id_mitra',array('class'=>'control-label')); ?>
                                 <div class="input-group">
                                    <span class="input-group-btn">
                                            <a href="#" class="add_mitra btn btn-default" type="button"><i class="fa fa-plus"></i></a>
                                        </span>
                                <div class="controls">
                                <?php $mitra = isset($default['id_mitra'])? $default['id_mitra'] : '1';  ?>
                                <?php echo form_dropdown('id_mitra',$opt_mitra,$mitra,'id="id_mitra" class="form-control" placeholder="Enter id_mitra"'); ?>
                                                                </div>
                                    </div>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('Kandang : ','id_kandang',array('class'=>'control-label')); ?>
                                 <div class="input-group"><span class="input-group-btn">
                                            <a href="#" class="add_kandang btn btn-default" type="button"><i class="fa fa-plus"></i></a>
                                        </span>
                                <div class="controls">
                                <?php $kandang = isset($default['id_kandang'])? $default['id_kandang'] : '1';  ?>
                                <?php echo form_dropdown('id_kandang',$opt_kandang,$kandang,'id="id_kandang" class="form-control" placeholder="Enter id_kandang"'); ?>
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
                            </div>
                           
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

                            <div class="row">  
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                   <h3>Hasil Jadi</h3>       
                                </div>      
                                
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                
                                        <?php echo form_label('Perkiraan : ','jml_hasil_prediksi',array('class'=>'control-label')); ?>
                                        <div class="controls">
                                        <?php echo form_input('jml_hasil_prediksi',set_value('jml_hasil_prediksi', isset($default['jml_hasil_prediksi']) ? $default['jml_hasil_prediksi'] : ''),'id="jml_hasil_prediksi" class="form-control" placeholder="Masukkan jml_hasil_prediksi"'); ?>
                                        </div>
                                    </div>
                                </div>   
                               
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    
                                    <div class="form-group">
                                        <?php echo form_label('Nyata: ','jml_hasil_jadi',array('class'=>'control-label')); ?>
                                        <div class="controls">
                                        <?php echo form_input('jml_hasil_jadi',set_value('jml_hasil_jadi', isset($default['jml_hasil_jadi']) ? $default['jml_hasil_jadi'] : ''),'id="jml_hasil_jadi" class="form-control" placeholder="Masukkan jml_hasil_jadi"'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    
                                    <div class="form-group">
                                        <?php echo form_label('Satuan : ','satuan_jadi',array('class'=>'control-label')); ?>
                                        <div class="controls">
                                        <?php echo form_input('satuan_jadi',set_value('satuan_jadi', isset($default['satuan_jadi']) ? $default['satuan_jadi'] : ''),'id="satuan_jadi" class="form-control" placeholder="Masukkan satuan_jadi"'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <h3>Ayam</h3>
                             <div class="form-group">
                                <?php echo form_label('Layer : ','id_layer',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_layer',set_value('id_layer', isset($default['id_layer']) ? $default['id_layer'] : ''),'id="id_layer" class="form-control" placeholder="Masukkan id_layer"'); ?>
                                </div>
                            </div>
                             <div class="form-group">
                                <?php echo form_label('Umur Ayam: ','umur',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('umur',set_value('umur', isset($default['umur']) ? $default['umur'] : ''),'id="umur" class="form-control" placeholder="Masukkan umur"'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="panel panel-success">
                                      <div class="panel-heading panel-body">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                                
                                               <div class="form-group">
                                                    <?php echo form_label('Barang : ','id_barang',array('class'=>'control-label')); ?>
                                                    <div class="controls">
                                                    <?php echo form_input('id_barang',set_value('id_barang', isset($default['id_barang']) ? $default['id_barang'] : ''),'id="id_barang" class="form-control input-lg" placeholder="Masukkan id_barang"'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                                
                                                <div class="form-group">
                                                    <?php echo form_label('Jumlah : ','jumlah',array('class'=>'control-label')); ?>
                                                    <div class="controls">
                                                    <?php echo form_input('jumlah',set_value('jumlah', isset($default['jumlah']) ? $default['jumlah'] : ''),'id="jumlah" class="form-control input-lg" placeholder="Masukkan jumlah"'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                                
                                                <div class="form-group">
                                                    <?php echo form_label('Satuan : ','id_satuan',array('class'=>'control-label')); ?>
                                                    <div class="controls">
                                                    <?php echo form_input('id_satuan',set_value('id_satuan', isset($default['id_satuan']) ? $default['id_satuan'] : ''),'id="id_satuan" class="form-control input-lg" placeholder="Masukkan id_satuan"'); ?>
                                                    </div>
                                                </div>
                                            
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                                
                                                <div class="form-group">
                                                    <?php echo form_label('prosentase : ','prosentase',array('class'=>'control-label')); ?>
                                                    <div class="controls">
                                                    <?php echo form_input('prosentase',set_value('prosentase', isset($default['prosentase']) ? $default['prosentase'] : ''),'id="prosentase" class="form-control input-lg" placeholder="Masukkan prosentase"'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">
                                                <?php echo form_label('Tambah','',array('class'=>'control-label')); ?>

                                               <a href="#" class="btn-add btn btn-lg btn-block btn-info"><i class="fa fa-plus"></i></a>
                                            </div>
                                        </div>
                                      </div>
                                  </div>      
                        
                        </div>  
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <table id="tables" class="tableformula table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>ID</th>
                                                        <th>Barang</th>
                                                        <th>Jumlah</th>
                                                        <th>Satuan</th>
                                                        <th>%</th>
                                                        
                                                     
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="10 " class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>                        
                        </div>
                
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <button id="save" type="submit" class="btn btn-lg btn-success"><icon class="fa fa-floppy-o"></icon> Simpan</button>
                            <button id="save_edit" type="submit" class="btn btn-lg btn-primary" style="display:none;"><icon class="fa fa-refresh"></icon> Perbaiki</button>
                            <a href="#" id="cancel_edit" class="btn btn-lg btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal</a>
                        </div>
                   
                    <?php echo form_close();?>
                    </div>
            


 