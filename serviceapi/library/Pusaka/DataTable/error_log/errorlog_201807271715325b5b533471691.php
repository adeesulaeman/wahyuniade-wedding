SELECT mhs.NamaMahasiswa AS NamaMahasiswa,pkm.JudulPKM AS JudulPKM,pkm.JenisPKM AS JenisPKM,pkm.TahunPKM AS TahunPKM FROM tbl_mahasiswa mhs
			LEFT JOIN data_pkm pkm ON mhs.NimMahasiswa=pkm.NimMahasiswa WHERE 1=1  AND (mhs.IdUser='123')    ORDER BY mhs.AddBy DESC LIMIT 0, 100