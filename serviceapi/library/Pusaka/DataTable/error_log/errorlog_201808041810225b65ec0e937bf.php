SELECT COUNT(*) AS COUNT FROM tbl_pendaftar a
			JOIN tbl_users b ON a.UserId=b.UserId
			LEFT JOIN tbl_siswa c ON c.UserId=b.UserId
			LEFT JOIN tbl_mahasiswa c ON c.IdUser=b.UserId
			LEFT JOIN tbl_status_beasiswa d ON d.IdBeasiswa=a.IdBeasiswa
			LEFT JOIN tbl_detail_beasiswa e ON e.IdDetailBeasiswa=d.IdDetailBeasiswa
			LEFT JOIN tbl_type_penerima_beasiswa f ON f.IdTypePenerima=d.IdType
			 WHERE 1=1   