SELECT mhs.NamaMahasiswa AS NamaMahasiswa,baa.Semester AS Semester,baa.IpkSemesterMahasiswa AS IpkSemesterMahasiswa FROM tbl_mahasiswa mhs
			LEFT JOIN data_baa baa ON mhs.NimMahasiswa=baa.NimMahasiswa WHERE 1=1  AND (mhs.IdUser='USR0017')    ORDER BY mhs.AddBy DESC LIMIT 0, 100