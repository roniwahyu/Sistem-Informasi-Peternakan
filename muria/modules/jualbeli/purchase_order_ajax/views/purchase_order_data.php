<div class="datatable-ajax-source">
        <hr>
        <h2 class="text-center">Tabel Data purchase_order</h2>
            <?php echo "<a data-toggle='modal' href='#modal-id' data-sub-module='".base_url('purchase_order')."' data-load-remote='".base_url('purchase_order/forms/')."' data-remote-target='#modal-id .modal-body' class='btn btn-primary'><i class='fa fa-plus'></i> Buka PO Baru</a>";?>

    <div class="modal fade" id="modal-id">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Detail purchase_order</h4>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
                                <table id="datatables" class="tablepo table table-bordered table-condensed table-striped" style="width:100%">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <!-- <th>#</th> -->
                                                        <th style="width:70px">#Faktur PO</th>
                                                        <th>Tanggal</th>
                                                        <!-- <th>Kode</th> -->
                                                        <th>Nama Supplier</th>
                                                        <!-- <th>Tanggal Kirim</th> -->
                                                        <th>Total</th>
                                                        <th>Status</th>
                                                        <th>Cara Bayar</th>
                                                        <th style="width:50px">Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="9" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>