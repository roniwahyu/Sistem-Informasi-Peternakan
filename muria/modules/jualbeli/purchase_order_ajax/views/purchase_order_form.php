 <!-- Second tab content -->
 
<div class="tab-pane fade active fade in" id="outside">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="icon-table"></i> Form purchase_order</h3>
            
        </div>


        <div class="panel-body"> 
            <div class="btn-group pull-right">
                <a href="#inside" data-toggle="tab" class="btn btn-success"><i class="icon-checkbox-partial"></i> Daftar Purchase_order</a>
                <a class="btn btn-info reset" href="#" >Reset Form</a>
            </div> 
        <hr>
            <div class="row clearfix">
                <?php //$this->load->view('purchase_order_form_inside-ajax') ?>
                <?php $this->load->view('form_po_ajax_tanpa_bayar') ?>

                
            </div>
        </div>
    </div>
    <!-- /second tab content -->
</div>
