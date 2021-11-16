SELECT COUNT(*) AS COUNT FROM tbl_mahasiswa mhs
			LEFT JOIN data_baa baa ON mhs.NimMahasiswa=baa.NimMahasiswa
			LEFT JOIN data_pkm pkm ON mhs.NimMahasiswa=pkm.NimMahasiswa WHERE 1=1  AND (mhs.UserId='123')   