SELECT IdMahasiswa AS IdMahasiswa,IdUser AS IdUser,NimMahasiswa AS NimMahasiswa,NamaMahasiswa AS NamaMahasiswa,JenisKelaminMahasiswa AS JenisKelaminMahasiswa,JurusanMahasiswa AS JurusanMahasiswa,TempatLahirMahasiswa AS TempatLahirMahasiswa,TanggalLahirMahasiswa AS TanggalLahirMahasiswa,AlamatMahasiswa AS AlamatMahasiswa,NoHpMahasiswa AS NoHpMahasiswa,EmailMahasiswa AS EmailMahasiswa,TahunMasukMahasiswa AS TahunMasukMahasiswa,TahunLulusMahasiswa AS TahunLulusMahasiswa,StatusMahasiswa AS StatusMahasiswa FROM tbl_mahasiswa WHERE 1=1  AND (StatusMahasiswa='ACTIVE')    ORDER BY NimMahasiswa ASC LIMIT 0, 5