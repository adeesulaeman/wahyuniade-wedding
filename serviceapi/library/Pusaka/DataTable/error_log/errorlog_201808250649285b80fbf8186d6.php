SELECT COUNT(*) AS COUNT FROM tbl_file_beasiswa_h a
			JOIN tbl_detail_beasiswa b ON a.IdBeasiswa=b.IdDetailBeasiswa
			JOIN tbl_status_beasiswa c on b.IdDetailBeasiswa=c.IdDetailBeasiswa
			outer JOIN tbl_berkas_upload upload ON a.IdFileBeasiswaH=upload.IdFileH
			 WHERE 1=1  AND (c.IdBeasiswa='STSBSWA0005')   