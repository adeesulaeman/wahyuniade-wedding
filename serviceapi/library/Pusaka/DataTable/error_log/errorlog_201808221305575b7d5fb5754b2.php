SELECT pkm.JudulPKM AS JudulPKM,pkm.JenisPKM AS JenisPKM,pkm.TahunPKM AS TahunPKM FROM data_peserta_pkm data
			JOIN data_pkm pkm ON data.IdPkm=pkm.IdPkm WHERE 1=1  AND (data.NimMahasiswa='201483018')    ORDER BY data.AddBy DESC LIMIT 0, 100