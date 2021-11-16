SELECT COUNT(*) AS COUNT FROM tbl_file_beasiswa_h a
			LEFT JOIN tbl_berkas_upload d on a.IdFileBeasiswaH=d.IdFileH WHERE 1=1  AND (a.IdFileH='undefined' AND d.IdUser='123')   