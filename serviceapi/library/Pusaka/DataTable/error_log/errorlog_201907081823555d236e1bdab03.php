SELECT COUNT(*) AS COUNT FROM data_peserta_pkm data
			JOIN data_pkm pkm ON data.IdPkm=pkm.IdPkm WHERE 1=1  AND (data.NimMahasiswa='USR0002')   