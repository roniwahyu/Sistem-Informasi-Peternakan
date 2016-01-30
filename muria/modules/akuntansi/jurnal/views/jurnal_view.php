<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-md-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Form Jurnal</h5>
                        
                    </div>
                    <div class="ibox-content">
                    <?php 
                        if(!empty($view)):
                            $this->load->view($view);
                        else:
                         $this->load->view('jurnal_table');
                        endif; 
                    ?>


                    </div>
                </div>
                </div>
               
            </div>
          
            
</div>
 <div class="modal fade" id="modal-id">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Detail jurnal</h4>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

<div class="modal fade" id="modal-bukti">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Bukti</h4>
            </div>
            <div class="modal-body row">
                <?php echo form_open(base_url('jurnal/submit/'),array('id'=>'loadbukti_form','role'=>'form','class'=>'form')); ?>
                <?php $selected = isset($default['id_supplier'])? $default['id_supplier'] : '0';  ?>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                                <?php echo form_label('akun_kas : ','akun_kas',array('class'=>'control-label')); ?>
                                <div class="input-group">

                                    <div class="controls">
                                        <?php echo form_dropdown('filter_bukti',$opt_bukti,set_select('filter_bukti', isset($default['filter_bukti']) ? $default['filter_bukti'] : '0'),'id="filter_bukti" class="form-control" '); ?>
                                    </div>
                                    <span class="input-group-btn">
                                        <a href="#" class="bukti btn btn-info" type="button"><i class="fa fa-filter"></i> Filter Bukti</a>
                                    </span>
                                </div>
                            </div>       
                                     
                            <table id="data" class="table-bukti table table-bordered table-condensed table-striped" style="width:100%;font-size:12px">
                                        <thead class="">
                                        <tr>
                                                       
                                                        <th>Bukti</th>
                                                        <th>Keterangan</th>
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="3" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                <?php echo form_close(); ?>
                </div>
                
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="modal-detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="modal-akun">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Daftar Akun/Rekening</h4>
            </div>
            <div class="modal-body">
                 <table id="data" class="tbl_rek table table-bordered table-striped" style="font-size:12px">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>Kode</th>
                                                        <th>Keterangan</th>
                                                        <th>cJenis</th>
                                                        <th>cGlobal</th>
                                                        <th>cKelompok</th>
                                                        <th>cJenisAcc</th>
                                                        <th>cType</th>
                                                        <th>cGroup</th>
                                                    
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="18" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="modal-notif">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="panel panel-success">
                <div class="panel-heading">
                <h3 class="panel-title">Jurnal </h3>
                      </div>
                <div class="panel-body">
                   <div class="alert alert-success">
                       <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> -->
                       <strong>Berhasil!</strong>Jurnal Berhasil disimpan ...
                   </div>
                   <div class="text-center">                   
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                   </div>
                </div>
            </div>
           
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->