SELECT mhs.NamaMahasiswa AS NamaMahasiswa,baa.IpkMahasiswa AS IpkMahasiswa FROM tbl_mahasiswa mhs
			LEFT JOIN data_baa baa ON mhs.NimMahasiswa=baa.NimMahasiswa WHERE 1=1  AND (mhs.IdUser='123')    ORDER BY mhs.AddBy DESC LIMIT 0, 100