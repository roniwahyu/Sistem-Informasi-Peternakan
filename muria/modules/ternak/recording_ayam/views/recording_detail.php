<h3><?php echo $data['recording'] ?></h3>
<table class="table table-condensed table-bordered table-striped ">
	<tbody>
		<tr>
			<th style="width:20%">Faktur</th>
			<td style="width:25%"><?php echo $data['faktur'] ?> </td>
			<th style="width:20%">Mitra</th>
			<td style="width:35%"><?php echo $data['mitra']." (".$data['namamitra'].")" ?> </td>
		</tr>	
		<tr>
			<th>Tanggal</th><td><?php echo thedate($data['tanggal']) ?> </td>
			<th>Gudang</th><td><?php echo $data['gudang']." (".$data['namagudang'].")" ?> </td>
		</tr>	
		<tr>
			<th>Total</th><td class="text-right"><?php echo rp($data['total']) ?> </td>
			<th>Kandang</th><td><?php echo $data['kandang'] ?> </td>
		</tr>

	</tbody>
</table>

<table class="table table-condensed table-bordered">
	<thead>
		<tr>	
			<th >Kode</th>
			<th>Nama</th>
			<th>Jumlah</th>
			<th>Harga</th>
			<th>Subtotal</th>
		</tr>	
	</thead>

	<tbody>
		
		<?php 
		$num=count($detail);
		foreach ($detail as $key => $value) {?>
			<tr>
			<td><?php echo($value['Kode']) ?> </td>
			<td><?php echo($value['Nama']) ?> </td>
			<td><?php echo($value['jumlah_satuan'])." (".$value['satuan'].")" ?> </td>
			<td class="text-right"><?php echo rp($value['harga_satuan']) ?> </td>
			<td class="text-right"><?php echo rp($value['subtotal']) ?> </td>
			</tr>
		<?php } ?>
		
		
		<tr>
			<th class="text-right" colspan="4">Total</th><td class="text-right"><?php echo rp($data['total']) ?> </td>

		</tr>
	</tbody>
	<tfoot>
		<tr></tr>
	</tfoot>
</table>