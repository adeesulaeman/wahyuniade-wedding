SELECT a.IdFileBeasiswaH AS IdFileBeasiswaH,a.NamaFileH AS NamaFileH,a.TypeFileH AS TypeFileH,d.NamaFile AS NamaFileUpload,d.CatatanFile AS CatatanFileUpload,IF(d.NamaFile IS NULL ? 1 : 0 AS status FROM tbl_file_beasiswa_h a
			JOIN tbl_detail_beasiswa b ON a.IdBeasiswa=b.IdDetailBeasiswa
			JOIN tbl_status_beasiswa c on b.IdDetailBeasiswa=c.IdDetailBeasiswa
			LEFT JOIN tbl_berkas_upload d on a.IdFileBeasiswaH=d.IdFileH WHERE 1=1  AND (c.IdBeasiswa='STSBSWA0001')    ORDER BY a.IdBeasiswa ASC LIMIT 0, 25