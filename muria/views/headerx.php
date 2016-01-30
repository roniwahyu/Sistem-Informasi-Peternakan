
<!-- <div class="container"> -->
 <div class="row border-bottom">
 	
		        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
			        <div class="navbar-header">
			        	
			            
			            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
			           
			         
			        </div>
			    
		            <ul class="nav navbar-top-links navbar-right">
		               <li> <a data-module="inv" href="<?php echo domain() ?>inv">Inventory</a> </li>
			        	<li> <a data-module="pos" href="<?php echo domain() ?>pos">Jual Beli</a> </li>
			        	<li> <a data-module="fin" href="<?php echo domain() ?>fin">Keuangan</a> </li>
			        	<li> <a data-module="acc" href="<?php echo domain() ?>acc">Akuntansi</a> </li>
			        	<li> <a data-module="acc" href="<?php echo domain() ?>pay">Kepegawaian</a> </li>
			        	<li> <a data-module="farm" href="<?php echo domain() ?>farm">Peternakan</a> </li>
		               

    <?php if ($this->ion_auth->logged_in()):?> 
        <?php //if($this->ion_auth->in_group(array(1))){?>
		                <li>
		                    <a href="<?php echo base_url('auth/logout') ?>">
		                        <i class="fa fa-sign-out"></i> Log out
		                    </a>
		                </li>
	<?php //} ?>
	<?php elseif(!$this->ion_auth->logged_in()): ?>
						<li>
		                    <a href="<?php echo base_url('auth/login') ?>">
		                        <i class="fa fa-sign-in"></i> Login
		                    </a>
		                </li>
	<?php endif; ?>
		                
		            </ul>

		        </nav>
	        </div>
	        <!-- </div> -->
