SELECT a.IdPendaftar AS IdPendaftar,a.StatusPendaftar AS Status,b.TimeFinish AS TimeFinish,b.IdBeasiswa AS IdBeasiswa,c.NamaBeasiswa AS NamaBeasiswa FROM tbl_pendaftar a
			JOIN tbl_status_beasiswa b ON a.IdBeasiswa=b.IdBeasiswa
			JOIN tbl_detail_beasiswa c on b.IdDetailBeasiswa=c.IdDetailBeasiswa WHERE 1=1  AND (a.UserId='123')    ORDER BY a.AddDatePendaftar DESC LIMIT 0, 5