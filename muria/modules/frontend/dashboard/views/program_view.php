<h3>Program Kerja</h3>
<table class="table table-bordered table-condensed table-striped" style="">
	<thead class="">
    	<tr>
			<th>ID</th>
			<th>Pengguna</th>
			<th>Rekening</th>
			<th>Uraian</th>
			<th>Anggaran</th>
		</tr>
    </thead>
		<tbody class="table-bordered">
			<?php foreach ($program as $k => $v) {
				echo '<tr>';
				echo '<td>'.$v['id_dppa'].'</td>';
				echo '<td>'.$v['nama_struktur'].'</td>';
				echo '<td>'.$v['kdrekening'].'</td>';
				echo '<td>'.$v['uraian'].'</td>';
				echo '<td>'.$v['anggaran'].'</td>';
				echo '</tr>';

				$data_event[]=$v['kdprogram'];
			} ?>
		</tbody>
	    
</table>
<h3>Kegiatan</h3>	
<table id="datatables" class="table table-bordered table-condensed table-striped" style="">
	<thead class="">
    	<tr>
			<th>ID</th>
			<th>Rekening</th>
			<th>Uraian</th>
			<th>Anggaran</th>
			<th>Tahun</th>
		</tr>
    </thead>
		<tbody class="table-bordered">
			<?php foreach ($data_event as $key => $value) {
				# code...
				$kegiatan=$this->dashdb->get_kegiatan_program($value);
				//print_r($kegiatan);
				$num=count($kegiatan);
				for ($i=0; $i <$num ; $i++) { 
					echo "<tr>";
					echo "<td>".$kegiatan[$i]['id_dppa']."</td>";
					echo "<td>".$kegiatan[$i]['kdrek_kegiatan']."</td>";
					echo "<td>".$kegiatan[$i]['uraian']."</td>";
					echo "<td>".$kegiatan[$i]['anggaran']."</td>";
					echo "<td>".$kegiatan[$i]['tahun']."</td>";
					echo "</tr>";
					$iddppa[]=$kegiatan[$i]['kdrek_kegiatan'];

				}
				
			} ?>		
		</tbody>
	    
</table>
<?php 
$this->session->set_userdata('rekeningnya',$iddppa);
?>

