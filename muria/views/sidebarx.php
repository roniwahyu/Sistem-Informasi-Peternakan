<nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" style="width:100px;" class="img-circle" src="<?php echo assets_url() ?>/images/pemkot.png" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                           <?php if ($this->ion_auth->logged_in()): ?>
                                 <?php $user = $this->ion_auth->user()->row(); ?>
                                    <?php if ( ! empty($user)): ?>
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                             </span> <span class="text-muted text-xs block"><?php echo $user->first_name." ".$user->last_name; ?><b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="profile.html">Profile</a></li>
                                <li><a href="contacts.html">Contacts</a></li>
                                <li><a href="mailbox.html">Mailbox</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url('auth/logout') ?>">Logout</a></li>
                            </ul>
                        <?php endif;endif; ?>
                        </div>
                        <div class="logo-element">
                            SIMKA
                        </div>
                    </li>
                    <li >
                        <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                             <li class="active"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
                            <!--<li ><a href="dashboard_2.html">Dashboard v.2</a></li>
                            <li ><a href="dashboard_3.html">Dashboard v.3</a></li>
                            <li ><a href="dashboard_4_1.html">Dashboard v.4</a></li> -->
                        </ul>
                    </li>
                    <?php if($this->ion_auth->in_group(1)): ?>

                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Super Administrator </span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Kelola User<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li><a href="<?php echo base_url('auth') ?>">Kelola User</a></li>
                                    <li><a href="<?php echo base_url('auth/register') ?>">Tambah User Baru</a></li>

                                </ul>
                            </li>
                            <li><a href="<?php echo base_url('groups') ?>">Kelola Groups</a></li>
                            <li>
                                <a href="#">Tulisan Blog<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Tambah Tulisan Blog Baru</a>
                                    </li>
                                    <li>
                                        <a href="#">Kelola Tulisan Blog</a>
                                    </li>

                                </ul>
                            </li>
                            <li><a href="#">Second Level Item</a></li>
                            <li>
                                <a href="#">Second Level Item</a></li>
                            <li>
                                <a href="#">Second Level Item</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Kelola Website </span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Halaman<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Tambah Halaman Baru</a>
                                    </li>
                                    <li>
                                        <a href="#">Kelola Halaman</a>
                                    </li>

                                </ul>
                            </li>
                            <li>
                                <a href="#">Tulisan Blog<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Tambah Tulisan Blog Baru</a>
                                    </li>
                                    <li>
                                        <a href="#">Kelola Tulisan Blog</a>
                                    </li>

                                </ul>
                            </li>
                            <li><a href="#">Second Level Item</a></li>
                            <li>
                                <a href="#">Second Level Item</a></li>
                            <li>
                                <a href="#">Second Level Item</a></li>
                        </ul>
                    </li>
                      <?php if($this->ion_auth->in_group(array(1,11))): ?>
                    <li class="">
                        <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Bagian Program</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            
                            <li>
                                <a href="#">Kelola DPA<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="   <?php echo base_url('dpa') ?>">Data DPA</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('excel/importxls/importdpa') ?>">Import DPA </a>
                                    </li>
                                </ul>
                            </li>
                            
                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php if($this->ion_auth->in_group(array(1,12))): ?>
                    <li class="">
                        <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Bagian Umum</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            
                            <li>
                                <a href="#">Kelola DPA<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="<?php echo base_url('dpa') ?>">Data DPA</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('excel/importxls/importdpa') ?>">Import DPA </a>
                                    </li>
                                </ul>
                            </li>
                            
                        </ul>
                    </li>
                    <?php endif; ?>
                        <?php if($this->ion_auth->in_group(array(1,10))): ?>
                        <li class="active">
                            <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Bagian Keuangan</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <!-- <li>
                                    <a href="#">Laporan Realisasasi APBD <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">--</a>
                                        </li>
                                        <li>
                                            <a href="#">---</a>
                                        </li>
                                        <li>
                                            <a href="#">---</a>
                                        </li>

                                    </ul>
                                </li> -->
                                <li>
                                    <a href="#">Kelola DPA<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="<?php echo base_url('dpa') ?>">Data DPA</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('excel/importxls/importdpa') ?>">Import DPA </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Kelola DPPA<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="<?php echo base_url('dppa') ?>">Data DPPA</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('excel/importxls/importdppa') ?>">Import DPPA </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('excel/importxls/importdppadetail') ?>">Import Penjabaran DPPA </a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="<?php echo base_url('realisasi') ?>">Data Realisasi APDB</a></li>
                                <li><a href="<?php echo base_url('realisasi/form') ?>">Form Realisasi APDB</a></li>
                                <li>
                                    <a href="#">Laporan Keuangan<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li><a href="<?php echo base_url('laporan/laporan_realisasi') ?>">Realisasi Anggaran</a></li>
                                        <li><a href="<?php echo base_url('laporan/terserap') ?>">Anggaran Terserap</a></li>
                                        <li><a href="<?php echo base_url('laporan/belum_terserap') ?>">Anggaran Belum Terserap</a></li>
                                        
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <?php endif; ?>

                    <?php if($this->ion_auth->in_group(array(1,13))): ?>
                    <li class="">
                        <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Bidang PPB</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            
                            <li>
                                <a href="#">Realisasi APBD<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="<?php echo base_url('realisasi') ?>">Data Realisasi APBD</a>
                                        <a href="<?php echo base_url('realisasi/form') ?>">Form Realisasi APBD</a>
                                    </li>
                                   
                                </ul>
                            </li>
                            
                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php if($this->ion_auth->in_group(array(1,14))): ?>

                    <li class="">
                        <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Bidang BM & SDM</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            
                            <li>
                                <a href="#">---<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="<?php echo base_url('dpa') ?>">---</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('excel/importxls/importdpa') ?>">---</a>
                                    </li>
                                </ul>
                            </li>
                            
                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php if($this->ion_auth->in_group(array(1,18))): ?>
                    <li class="">
                        <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">UPT PMK</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            
                            <li>
                                <a href="#">---<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="<?php echo base_url('dpa') ?>">---</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('excel/importxls/importdpa') ?>">---</a>
                                    </li>
                                </ul>
                            </li>
                            
                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php if($this->ion_auth->in_group(array(1,17))): ?>

                    <li class="">
                        <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">UPT UMBBP</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            
                            <li>
                                <a href="#">---<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="<?php echo base_url('dpa') ?>">---</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('excel/importxls/importdpa') ?>">---</a>
                                    </li>
                                </ul>
                            </li>
                            
                        </ul>
                    </li> 
                    <?php endif; ?>
                    <?php if($this->ion_auth->in_group(array(1,19))): ?>

                    <li class="">
                        <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">UPT RUSUNAWA</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            
                            <li>
                                <a href="#">---<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="<?php echo base_url('dpa') ?>">---</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('excel/importxls/importdpa') ?>">---</a>
                                    </li>
                                </ul>
                            </li>
                            
                        </ul>
                    </li>
                <?php endif; ?>
                </ul>

            </div>
        </nav>