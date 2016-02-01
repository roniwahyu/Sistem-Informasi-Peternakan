SELECT
	`a`.`id_detail` AS `id_detail`,
	`a`.`id_recording_ayam` AS `id_recording_ayam`,
	`a`.`faktur_recording` AS `faktur`,
	`b`.`Kode` AS `Kode`,
	`b`.`Nama` AS `Nama`,
	`a`.`jumlah_satuan` AS `jumlah_satuan`,
	`a`.`id_satuan` AS `id_satuan`,

IF (
	(`a`.`id_satuan` = 1),
	`c`.`Satuan1`,

IF (
	(`a`.`id_satuan` = 2),
	`c`.`Satuan2`,
	`c`.`Satuan3`
)
) AS `satuan`,

IF (
	(`a`.`id_satuan` = 1),
	`d`.`hb1`,

IF (
	(`a`.`id_satuan` = 2),
	`d`.`hb2`,
	`d`.`hb3`
)
) AS `harga_satuan`,
 (

	IF (
		(`a`.`id_satuan` = 1),
		`d`.`hb1`,

	IF (
		(`a`.`id_satuan` = 2),
		`d`.`hb2`,
		`d`.`hb3`
	)
	) * `a`.`jumlah_satuan`
) AS `subtotal`,
 `a`.`keterangan` AS `keterangan`
FROM
	(
		(
			(
				(
					`recording_ayam_detail` `a`
					JOIN `barang_satuan` `c` ON (
						(
							`a`.`id_barang` = `c`.`id_barang`
						)
					)
				)
				JOIN `barang` `b` ON ((`a`.`id_barang` = `b`.`id`))
			)
			JOIN `barang_harga` `d` ON ((`b`.`id` = `d`.`id_barang`))
		)
		LEFT JOIN `recording_ayam` `x` ON (
			(
				(`x`.`id` = `a`.`id_recording_ayam`)
				OR (`x`.`faktur` = `a`.`faktur_recording`)
			)
		)
	)