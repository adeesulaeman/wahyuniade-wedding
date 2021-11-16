SELECT b.NamaBeasiswa AS NamaBeasiswa,a.IdBeasiswa AS IdBeasiswa,a.Periode AS Periode,DATE(a.EditDate) AS EditDate FROM tbl_pendaftar a 
			JOIN tbl_users b ON a.UserId=b.UserId
			LEFT JOIN tbl_mahasiswa_baa c ON c.NimMahasiswa=b.Username
			LEFT JOIN tbl_siswa d ON d.UserId=b.UserId
			 WHERE 1=1  AND (a.IdBeasiswa='Berjalan')    ORDER BY a.EditDate DESC LIMIT 0, 100