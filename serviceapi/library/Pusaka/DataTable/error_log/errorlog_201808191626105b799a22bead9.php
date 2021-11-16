SELECT a.StatusPendaftar AS Status,IFNULL(d.AsalSekolah,'') AS Instansi,IFNULL(d.NamaSiswa,c.NamaMahasiswa) AS Nama FROM tbl_pendaftar a 
			JOIN tbl_users b ON a.UserId=b.UserId
			LEFT JOIN tbl_mahasiswa_baa c ON c.NimMahasiswa=b.Username
			LEFT JOIN tbl_siswa d ON d.UserId=b.UserId
			 WHERE 1=1  AND (a.IdBeasiswa='')    ORDER BY a.EditDate DESC LIMIT 0, 100