<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-md-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Retur Pembelian</h5>
                        
                    </div>

                    <div class="ibox-content">   
                       
                        <?php if(!empty($view)):
                        $this->load->view($view);
                         endif;?>

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
                    <h4 class="modal-title">Detail Retur Pembelian</h4>
                </div>
                <div class="modal-body">
                     <table id="data" class="table_trx_beli table-bordered table-condensed table-striped" style="font-size:12px;width:100%">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>#Faktur</th>
                                                        <th>Tanggal</th>
                                                        <th>Pembelian</th>
                                                        <th>Supplier</th>
                                                        <th>Total</th>
                                                        <th>Grand Total</th>
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="19" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
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
