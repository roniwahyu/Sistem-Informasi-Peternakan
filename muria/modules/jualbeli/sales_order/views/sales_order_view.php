<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-md-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Form Sales_order</h5>
                        
                    </div>
                    <div class="ibox-content">
                    <?php 
                    if(!empty($view)):
                        $this->load->view($view);
                    else:
                        $this->load->view('sales_order_table');
                    endif;?>

                    </div>
                </div>
                </div>
               
            </div>
          
            
</div>

