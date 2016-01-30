<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-md-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Form Bank</h5>
                        
                    </div>
                    <div class="ibox-content">
                      <?php if(!empty($view)):
                        $this->load->view($view);
                        else:
                            $this->load->view('bank_table');
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
                    <h4 class="modal-title">Detail bank</h4>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


<div class="modal fade" id="modal-bank">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Rekening Bank</h4>
            </div>
            <div class="modal-body">
                <table id="data" class="table_rek_bank table table-bordered table-condensed table-striped" style="width:100%">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>Kode</th>
                                                        <th>Rekening</th>
                                                        <th>Keterangan</th>
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="4" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
            </div>
            <div class="modal-footer">
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
                <h3 class="panel-title">Bank </h3>
                      </div>
                <div class="panel-body">
                   <div class="alert alert-success">
                       <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> -->
                       <strong>Berhasil</strong> Bank Berhasil disimpan ...
                   </div>
                   <div class="text-center">                   
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                   </div>
                </div>
            </div>
           
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->