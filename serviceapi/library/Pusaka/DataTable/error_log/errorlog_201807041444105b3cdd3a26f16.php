SELECT a.IdFileBeasiswaH AS IdFileBeasiswaH,a.NamaFileH AS NamaFileH,a.TypeFileH AS TypeFileH,d.NamaFile AS NamaFileUpload,d.CatatanFile AS CatatanFileUpload FROM tbl_file_beasiswa_h a
			LEFT JOIN tbl_berkas_upload d on a.IdFileBeasiswaH=d.IdFileH WHERE 1=1  AND (a.IdFileH='undefined' AND d.IdUser='123')    ORDER BY a.IdBeasiswa ASC LIMIT 0, 100