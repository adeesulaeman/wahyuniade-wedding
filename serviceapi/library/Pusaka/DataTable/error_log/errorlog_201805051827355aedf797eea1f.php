SELECT IdBeasiswa AS IdBeasiswa,IdType AS IdType,Description AS Description,Quota AS Quota,Periode AS Periode,Status AS Status FROM tbl_jenis_beasiswa WHERE 1=1  AND (IdType='Alumni')    ORDER BY IdBeasiswa ASC LIMIT 0, 5