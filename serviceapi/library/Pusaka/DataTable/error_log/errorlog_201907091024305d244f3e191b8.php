SELECT COUNT(*) AS COUNT FROM tbl_pendaftar a
			JOIN tbl_status_beasiswa b ON a.IdBeasiswa=b.IdBeasiswa
			JOIN tbl_detail_beasiswa c on b.IdDetailBeasiswa=c.IdDetailBeasiswa WHERE 1=1  AND (a.UserId='123' AND a.StatusPendaftar != 'Batal' AND a.StatusPendaftar != 'Kadaluarsa')   