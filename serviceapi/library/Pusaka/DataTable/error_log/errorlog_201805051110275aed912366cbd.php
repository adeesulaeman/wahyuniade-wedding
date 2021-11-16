SELECT a.IdBeasiswa AS IdBeasiswa,b.NamaTypePenerima AS NamaTypePenerima,c.NamaBeasiswa AS NamaBeasiswa,a.Quota AS Quota, CONVERT(VARCHAR(11), a.TimeFinish, 106) AS TimeStart AS TimeStart,a.TimeFinish AS TimeFinish,a.Periode AS Periode,a.Status AS Status FROM tbl_status_beasiswa a join tbl_type_penerima_beasiswa b on a.IdType=b.IdTypePenerima join tbl_detail_beasiswa c on a.IdDetailBeasiswa=c.IdDetailBeasiswa WHERE 1=1    ORDER BY a.AddDate ASC LIMIT 0, 5