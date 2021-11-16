SELECT a.IdPengajuan AS IdPengajuan,a.PeriodePengajuan AS PeriodePengajuan,a.LinkSponsor AS LinkSponsor,a.Status AS Status,b.NamaBeasiswa AS NamaBeasiswa,c.NamaSponsorship AS NamaSponsorship,c.JenisSponsorship AS JenisSponsorship FROM tbl_pengajuan_sponsor a 
			JOIN tbl_detail_beasiswa b on a.IdBeasiswa=b.IdDetailBeasiswa
			JOIN tbl_users c ON c.UserId=a.IdUserSponsor
			JOIN tbl_sponsorship d ON c.UserId=d.IdUser
			 WHERE 1=1  AND (a.status='new')    ORDER BY a.AddDate DESC LIMIT 0, 25