SELECT a.StatusPendaftar AS StatusPendaftar,b.NamaSiswa AS Nama,b.NomorInduk AS Nomor,c.NimMahasiswa AS Nomor,c.NamaMahasiswa AS Nama,e.NamaBeasiswa AS NamaBeasiswa,f.NamaTypePenerima AS NamaTypePenerima,d.Periode AS Periode FROM tbl_pendaftar a
			JOIN tbl_users b ON a.UserId=b.UserId
			LEFT JOIN tbl_siswa c ON c.UserId=b.UserId
			LEFT JOIN tbl_mahasiswa c ON c.IdUser=b.UserId
			LEFT JOIN tbl_status_beasiswa d ON d.IdBeasiswa=a.IdBeasiswa
			LEFT JOIN tbl_detail_beasiswa e ON e.IdDetailBeasiswa=d.IdDetailBeasiswa
			LEFT JOIN tbl_type_penerima_beasiswa f ON f.IdTypePenerima=d.IdType
			 WHERE 1=1    ORDER BY a.Status DESC LIMIT 0, 5