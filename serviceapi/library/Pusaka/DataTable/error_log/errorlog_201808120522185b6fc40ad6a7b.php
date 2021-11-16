SELECT a.IdPendaftar AS IdPendaftar,a.UserId AS UserId,a.StatusPendaftar AS StatusPendaftar,date(a.AddDatePendaftar) AS AddDatePendaftar,IFNULL(c.NamaSiswa, mhs.NamaMahasiswa) AS Nama,IFNULL(c.NomorInduk, mhs.NimMahasiswa) AS Nomor,e.NamaBeasiswa AS NamaBeasiswa,f.NamaTypePenerima AS NamaTypePenerima,d.Periode AS Periode FROM tbl_pendaftar a
			JOIN tbl_users b ON a.UserId=b.UserId
			LEFT JOIN tbl_siswa c ON c.UserId=b.UserId
			LEFT JOIN tbl_mahasiswa mhs ON mhs.IdUser=b.UserId
			LEFT JOIN tbl_status_beasiswa d ON d.IdBeasiswa=a.IdBeasiswa
			LEFT JOIN tbl_detail_beasiswa e ON e.IdDetailBeasiswa=d.IdDetailBeasiswa
			LEFT JOIN tbl_type_penerima_beasiswa f ON f.IdTypePenerima=d.IdType
			 WHERE 1=1  AND (a.StatusPendaftar='baru')    ORDER BY a.AddDatePendaftar DESC LIMIT 0, 5