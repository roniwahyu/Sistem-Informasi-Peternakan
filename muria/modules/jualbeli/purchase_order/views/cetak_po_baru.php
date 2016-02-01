<!-- <div class="container">  -->
<div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="ibox-content p-xl">
                            <?php if(!empty($data))://print_r($data)?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <h5>Dari:</h5>
                                    <address>
                                        <strong>Muria PS</strong><br>
                                        Karangsono <br>
                                        Malang<br>
                                        <abbr title="Phone">Telp:</abbr> (0341) 601-4590
                                    </address>
                                </div>
                                
                                <div class="col-sm-6 text-right">
                                    <h4>Order Pembeliian No.</h4>
                                    <h4 class="text-navy"><?php echo $data['faktur_po'] ?></h4>
                                    <span>Kepada:</span>
                                    <address>
                                        <strong><?php echo $data['namasupplier']." (".$data['kdsupplier'].")" ?></strong><br>
                                        112 Street Avenu, 1080<br>
                                        Miami, CT 445611<br>
                                        <abbr title="Phone">P:</abbr> (120) 9000-4321
                                    </address>
                                    <p>
                                        <span><strong>Tanggal Order Pembelian</strong><br> <?php echo date('d F Y',strtotime($data['tgl_po'])) ?></span><br>
                                        
                                    </p>
                                </div>
                              
                            </div>

                            <div class="table-responsive m-t">
                                <table class="table invoice-table">
                                    <thead>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Satuan</th>
                                        <th>Harga Satuan</th>
                                        <th>Sub Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $jcount=count($detail);
                                        //print_r($detail);
                                        foreach ($detail as $key => $value) {
                                            echo "<tr>";
                                            echo "<td><div><strong>".$value['Nama']." (".$value['Kode'].")"."</strong></div></td>";
                                            echo "<td>".$value['jumlah']."</td>";
                                            echo "<td>".$value['satuan']."</td>";
                                            echo "<td>".rp($value['harga'])."</td>";
                                            echo "<td>".rp($value['subtotal'])."</td>";
                                            # code...
                                            
                                            echo "</tr>";
                                        }
                                         ?>

                                  
                                  
                                    </tbody>
                                </table>
                            </div><!-- /table-responsive -->

                            <table class="table invoice-total">
                                <tbody>
                                <tr>
                                    <td><strong>Total :</strong></td>
                                    <td><?php  echo rp($data['totalbayar']) ?></td>
                                </tr>
                                <!-- <tr>
                                    <td><strong>PAJAK :</strong></td>
                                    <td>$235.98</td>
                                </tr>
                                <tr>
                                    <td><strong>GRAND TOTAL :</strong></td>
                                    <td>$1261.98</td>
                                </tr> -->
                                </tbody>
                            </table>
                              <?php endif ?>
                            <div class="text-right">
                                <button class="btn btn-primary"> Proses Bayar <i class="fa fa-chevron-right"></i></button>
                            </div>

                            <div class="well m-t"><strong>Comments</strong>
                                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less
                            </div>
                        </div>
                </div>
            </div>
</div>
<!-- </div>