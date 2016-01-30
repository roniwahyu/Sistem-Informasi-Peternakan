<div class="wrapper wrapper-content">
        <div class="row">
                    <div class="col-md-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right">Index</span>
                                <h5>Belanja Pegawai</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo !empty($pegawai)?"Rp".number_format($pegawai,2,",","."):'' ?></h1>
                                <small>Total Anggaran Belanja Pegawai</small>
                            </div>
                            <div class="ibox-content">
                                <span class="label label-info pull-right"><?php echo !empty($prosen_pegawai)?$prosen_pegawai."%":'' ?></span>

                                <h4>Realisasi Belanja Pegawai</h4>
                                <h1 class="no-margins"><?php echo !empty($real_pegawai)?"Rp".number_format($real_pegawai,2,",","."):'' ?></h1>
                                <small>Total Realisasi Anggaran Belanja Pegawai</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-info pull-right">Index</span>
                                <h5>Belanja Barang & Jasa</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo !empty($jasa)?"Rp".number_format($jasa,2,",","."):'' ?></h1>
                                <small>Total Anggaran Belanja Barang & Jasa</small>
                            </div>
                             <div class="ibox-content">
                                <span class="label label-info pull-right"><?php echo !empty($prosen_barangjasa)?$prosen_barangjasa."%":'' ?></span>

                                <h4>Realisasi Belanja Barang & Jasa</h4>
                                <h1 class="no-margins"><?php echo !empty($real_barangjasa)?"Rp".number_format($real_barangjasa,2,",","."):'' ?></h1>
                                <small>Total Realisasi Anggaran Belanja Barang & Jasa</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-primary pull-right">Index</span>
                                <h5>Anggaran Belanja Modal</h5>
                            </div>
                            <div class="ibox-content">
                                
                                <h1 class="no-margins"><?php echo !empty($modal)?"Rp".number_format($modal,2,",","."):'' ?></h1>
                                <small>Total Anggaran Belanja Modal</small>
                            </div>
                             <div class="ibox-content">
                                <span class="label label-info pull-right"><?php echo !empty($prosen_modal)?$prosen_modal."%":'' ?></span>

                                <h4>Realisasi Belanja Modal</h4>
                                <h1 class="no-margins"><?php echo !empty($real_modal)?"Rp".number_format($real_modal,2,",","."):'' ?></h1>
                                <small>Total Realisasi Anggaran Belanja Modal</small>
                            </div>
                        </div>
                    </div>
                    
        </div>
        
        <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Orders</h5>
                              
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="ibox float-e-margins">
                                            <div class="ibox-title">
                                                <h5>Bar Chart Example </h5>
                                                <div class="ibox-tools">
                                                    <a class="collapse-link">
                                                        <i class="fa fa-chevron-up"></i>
                                                    </a>
                                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                        <i class="fa fa-wrench"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-user">
                                                        <li><a href="#">Config option 1</a>
                                                        </li>
                                                        <li><a href="#">Config option 2</a>
                                                        </li>
                                                    </ul>
                                                    <a class="close-link">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="ibox-content">
                                                <div id="morris-bar-chart"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>

                            </div>
                        </div>
                    </div>
        </div>
                
<div class="footer">
            <div class="pull-right">
                Developed <strong>CV. Alya Pratama</strong>
            </div>
            <div>
                <strong>Copyright</strong> DPUPPB Kota Malang © 2015
            </div>
        </div>