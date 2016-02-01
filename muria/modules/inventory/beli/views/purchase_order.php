
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInRight">
                    <pre>
                     <?php 
                                        if(!empty($po)):
                                        
                                            print_r($po);
                                        
                                         ?>
                                     </pre>
                    <div class="ibox-content p-xl">
                            <div class="row">
                                <div class="col-sm-6">
                                  
                                </div>

                                <div class="col-sm-6 text-right">
                                    <h4>Order Pembelian/Purchase Order </h4>
                                    <h4 class="text-navy">#<?php echo !empty($po)?$po[0]['Faktur']:'0000000' ?></h4>
                                   
                                    <p>
                                        <span><strong>Tanggal Order:</strong> 
                                            <?php 

                                                $date=date_create($po[0]['Tgl']);
                                                $datef=date_format($date,"d F Y");
                                            echo !empty($po)?$datef:'00/00/0000' ?></span><br>
                                        <span><strong>Tanggal Kedaluarsa:</strong> March 24, 2014</span>
                                    </p>
                                </div>
                            </div>

                            <div class="table-responsive m-t">
                                <table class="table invoice-table">
                                    <thead>
                                    <tr>
                                        <th>Barang</th>
                                        <th>Jumlah</th>
                                        <th>Harga/Unit</th>
                                        <th>Pajak</th>
                                        <th>Jumlah Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $jsubtotal=0; 
                                    foreach($po as $key => $value ): 
                                        $barang=$value['NmBarang'];
                                        $qty=$value['Qty'];
                                        $harga=$value['harga'];
                                    ?>

                                    <tr>
                                        <td><div><strong><?php echo $value['NmBarang'] ?></strong></div>
                                            <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</small></td>
                                        <td><?php echo $qty ?></td>
                                        <td><?php echo $harga ?></td>
                                        <td>0</td>
                                        <td><?php $subtot=$qty*$harga;echo $subtot; ?></td>
                                    </tr>
                                    <?php  $jsubtotal=$jsubtotal+$subtot;?>
                                    <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div><!-- /table-responsive -->

                            <table class="table invoice-total">
                                <tbody>
                                <tr>
                                    <td><strong>Sub Total :</strong></td>
                                    <td><?php echo $jsubtotal; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>PAJAK :</strong></td>
                                    <td>$235.98</td>
                                </tr>
                                <tr>
                                    <td><strong>TOTAL :</strong></td>
                                    <td>$1261.98</td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="text-right">
                                <button class="btn btn-primary"><i class="fa fa-dollar"></i> Proses Pembayaran</button>
                            </div>

                            <div class="well m-t"><strong>Comments</strong>
                                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less
                            </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        