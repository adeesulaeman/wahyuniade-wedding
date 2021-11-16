SELECT a.IdFileBeasiswaH AS IdFileBeasiswaH,a.NamaFileH AS NamaFileH,a.TypeFileH AS TypeFileH,upload.IdFileH AS upload.IdFileH,(select DISTINCT PathFile FROM tbl_berkas_upload WHERE IdUser='USR0002' AND IdFileH='a.IdFileBeasiswaH' GROUP BY IdUser) AS CheckFile FROM tbl_file_beasiswa_h a
			JOIN tbl_detail_beasiswa b ON a.IdBeasiswa=b.IdDetailBeasiswa
			JOIN tbl_status_beasiswa c on b.IdDetailBeasiswa=c.IdDetailBeasiswa
			LEFT JOIN tbl_berkas_upload upload ON a.IdFileBeasiswaH=upload.IdFileH
			 WHERE 1=1  AND (c.IdBeasiswa='STSBSWA0005')    ORDER BY a.IdBeasiswa ASC LIMIT 0, 25