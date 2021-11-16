SELECT a.IdFileBeasiswaH AS IdFileBeasiswaH,a.NamaFileH AS NamaFileH,a.TypeFileH AS TypeFileH,(select DISTINCT PathFile FROM tbl_berkas_upload WHERE IdFileH=a.IdFileBeasiswaH GROUP BY IdUser) AS PathFile,(select DISTINCT PathFile FROM tbl_berkas_upload WHERE IdUser='USR0002' AND IdFileH=a.IdFileBeasiswaH GROUP BY IdUser) AS CheckFile FROM tbl_file_beasiswa_h a
			JOIN tbl_detail_beasiswa b ON a.IdBeasiswa=b.IdDetailBeasiswa
			JOIN tbl_status_beasiswa c on b.IdDetailBeasiswa=c.IdDetailBeasiswa
			 WHERE 1=1  AND (c.IdBeasiswa='STSBSWA0005')    ORDER BY a.TypeFileH DESC LIMIT 0, 25