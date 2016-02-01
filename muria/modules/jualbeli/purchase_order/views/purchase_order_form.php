 <!-- Second tab content -->
 
<!-- <div class="tab-pane fade" id="outside"> -->
    <div class="btn-group" style="">
                <a href="<?php echo base_url('purchase_order/') ?>" class="btn btn-lg btn-success"><i class="fa fa-database"></i> Data Order Pembelian</a>

                <a class="btn btn-info btn-lg reset" href="#" ><i class="fa fa-refresh"></i> Reset Form</a>
            </div> 
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="icon-table"></i> Form Order Pembelian</h3>
            
        </div>
        <div class="panel-body">
            <div class="row clearfix">
                <?php $this->load->view('form_po_tanpa_bayar') ?>

                
            </div>
        </div>
    </div>
    <!-- /second tab content -->
<!-- </div> -->
