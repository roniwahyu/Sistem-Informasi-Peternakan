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
                                    <h4>Transaksi Pembelian No.</h4>
                                    <h4 class="text-navy">#<?php echo $data['faktur_pt'] ?></h4>
                                    <span>Kepada:</span>
                                    <address>
                                        <h3><?php echo $data['Nama']." (".$data['Kode'].")" ?></h3>
    
                                        <?php echo !empty($supplier['Alamat']) ? $supplier['Alamat']:''; ?><br>
                                        <?php echo !empty($supplier['Kota']) ? $supplier['Kota']:''; ?><br>
                                      <abbr title="Phone">Telp:</abbr><?php echo !empty($supplier['Telepon']) ? $supplier['Telepon']:''; ?>
                                        <abbr title="Phone">Faks:</abbr><?php echo !empty($supplier['Fax']) ? $supplier['Fax']:''; ?>
                                    </address>
                                    <p>
                                        <span><strong>Tanggal Transaksi</strong><br> <?php echo date('d F Y',strtotime($data['tgl_pt'])) ?></span><br>
                                        
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
                                            echo "<td>".rp($value['harga_satuan'])."</td>";
                                            echo "<td>".rp($value['subtotal'])."</td>";
                                            # code...
                                            
                                            echo "</tr>";
                                        }
                                         ?>

                                  
                                  
                                    </tbody>
                                </table>
                            </div><!-- /table-responsive -->

                            <table class="table invoice-total text-right">
                                <tbody>
                                <tr>
                                    <td style="width:50%"></td>
                                    <td><strong>Uang Muka :</strong></td>
                                    <td><?php echo rp($data['uangmuka']) ?></td>
                                    <td><strong>Total :</strong></td>
                                    <td><?php  echo rp($data['totalbayar']) ?></td>
                                </tr>
                                <tr>
                                    <?php if(!empty($data['uangmuka']) && (!empty($data['totalbayar']))):
                                        $sisa=$data['totalbayar']-$data['uangmuka'];
                                    else:
                                        $sisa=0;
                                    endif;
                                     ?>
                                    <td></td>
                                    <td><strong>Sisa (Hutang):</strong></td>
                                    <td><?php echo rp($sisa); ?></td>
                                    <td><strong>Biaya Kirim/Pickup :</strong></td>
                                    <td><?php echo rp($data['biayakirim']) ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><strong>PAJAK :</strong></td>
                                    <td><?php echo $data['ppn'] ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><strong>GRAND TOTAL :</strong></td>
                                    <td><?php echo rp($data['grandtotal']) ?></td>
                                </tr>
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