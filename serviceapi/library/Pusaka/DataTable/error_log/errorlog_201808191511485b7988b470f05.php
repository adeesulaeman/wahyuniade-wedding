SELECT a.StatusPendaftar AS StatusPendaftar,b.Username AS Username,IFNULL(c.NamaMahasiswa, d.NamaSiswa) AS Nama FROM tbl_pendaftar a
			JOIN tbl_users b ON a.UserId=b.UserId
			LEFT JOIN tbl_mahasiswa_baa c ON c.NimMahasiswa=b.Username
			LEFT JOIN tbl_siswa d ON d.UserId=b.UserId
			 WHERE 1=1  AND (a.IdBeasiswa='STSBSWA0002')    ORDER BY a.AddDate DESC LIMIT 0, 25