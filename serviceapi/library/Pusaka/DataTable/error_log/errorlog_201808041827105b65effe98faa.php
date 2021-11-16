SELECT a.StatusPendaftar AS StatusPendaftar,c.NamaSiswa AS NamaSiswa,c.NomorInduk AS Nis,mhs.NimMahasiswa AS Nim,mhs.NamaMahasiswa AS NamaMhs,e.NamaBeasiswa AS NamaBeasiswa,f.NamaTypePenerima AS NamaTypePenerima,d.Periode AS Periode FROM tbl_pendaftar a
			JOIN tbl_users b ON a.UserId=b.UserId
			LEFT JOIN tbl_siswa c ON c.UserId=b.UserId
			OUTER JOIN tbl_mahasiswa mhs ON mhs.IdUser=b.UserId
			LEFT JOIN tbl_status_beasiswa d ON d.IdBeasiswa=a.IdBeasiswa
			LEFT JOIN tbl_detail_beasiswa e ON e.IdDetailBeasiswa=d.IdDetailBeasiswa
			LEFT JOIN tbl_type_penerima_beasiswa f ON f.IdTypePenerima=d.IdType
			 WHERE 1=1    ORDER BY a.AddDatePendaftar DESC LIMIT 0, 25