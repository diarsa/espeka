-- 
1  - 20  = 15 - 34
21 - 40  = 35 - 54
41 - 60  = 56 - 74
61 - 80  = 75 - 191 
81 - 100 = 192- 211
-- 

-- HIDE kunjungan wisatawan dari 1-20
UPDATE t_wisata_objek
SET status = CASE id_wisatawan
WHEN 15 THEN 'hide'
WHEN 16 THEN 'hide'
WHEN 17 THEN 'hide'
WHEN 18 THEN 'hide'
WHEN 19 THEN 'hide'
WHEN 20 THEN 'hide'
WHEN 21 THEN 'hide'
WHEN 22 THEN 'hide'
WHEN 23 THEN 'hide'
WHEN 24 THEN 'hide'
WHEN 25 THEN 'hide'
WHEN 26 THEN 'hide'
WHEN 27 THEN 'hide'
WHEN 28 THEN 'hide'
WHEN 29 THEN 'hide'
WHEN 30 THEN 'hide'
WHEN 31 THEN 'hide'
WHEN 32 THEN 'hide'
WHEN 33 THEN 'hide'
WHEN 34 THEN 'hide'
END 
WHERE id_wisatawan IN ( 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29,30, 31, 32, 33, 34)


-- SHOW kunjungan wisatawan dari 1-20
UPDATE t_wisata_objek
SET status = CASE id_wisatawan
WHEN 15 THEN 'show'
WHEN 16 THEN 'show'
WHEN 17 THEN 'show'
WHEN 18 THEN 'show'
WHEN 19 THEN 'show'
WHEN 20 THEN 'show'
WHEN 21 THEN 'show'
WHEN 22 THEN 'show'
WHEN 23 THEN 'show'
WHEN 24 THEN 'show'
WHEN 25 THEN 'show'
WHEN 26 THEN 'show'
WHEN 27 THEN 'show'
WHEN 28 THEN 'show'
WHEN 29 THEN 'show'
WHEN 30 THEN 'show'
WHEN 31 THEN 'show'
WHEN 32 THEN 'show'
WHEN 33 THEN 'show'
WHEN 34 THEN 'show'
END 
WHERE id_wisatawan IN ( 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29,30, 31, 32, 33, 34)










-- HIDE kunjungan wisatawan dari 21-40
UPDATE t_wisata_objek
SET status = CASE id_wisatawan
WHEN 35 THEN 'hide'
WHEN 36 THEN 'hide'
WHEN 37 THEN 'hide'
WHEN 38 THEN 'hide'
WHEN 39 THEN 'hide'
WHEN 40 THEN 'hide'
WHEN 41 THEN 'hide'
WHEN 42 THEN 'hide'
WHEN 43 THEN 'hide'
WHEN 44 THEN 'hide'
WHEN 45 THEN 'hide'
WHEN 46 THEN 'hide'
WHEN 47 THEN 'hide'
WHEN 48 THEN 'hide'
WHEN 49 THEN 'hide'
WHEN 50 THEN 'hide'
WHEN 51 THEN 'hide'
WHEN 52 THEN 'hide'
WHEN 53 THEN 'hide'
WHEN 54 THEN 'hide'
END 
WHERE id_wisatawan IN ( 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54)


-- SHOW kunjungan wisatawan dari 21-40
UPDATE t_wisata_objek
SET status = CASE id_wisatawan
WHEN 35 THEN 'show'
WHEN 36 THEN 'show'
WHEN 37 THEN 'show'
WHEN 38 THEN 'show'
WHEN 39 THEN 'show'
WHEN 40 THEN 'show'
WHEN 41 THEN 'show'
WHEN 42 THEN 'show'
WHEN 43 THEN 'show'
WHEN 44 THEN 'show'
WHEN 45 THEN 'show'
WHEN 46 THEN 'show'
WHEN 47 THEN 'show'
WHEN 48 THEN 'show'
WHEN 49 THEN 'show'
WHEN 50 THEN 'show'
WHEN 51 THEN 'show'
WHEN 52 THEN 'show'
WHEN 53 THEN 'show'
WHEN 54 THEN 'show'
END 
WHERE id_wisatawan IN ( 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54)










-- HIDE kunjungan wisatawan dari 41-60
UPDATE t_wisata_objek
SET status = CASE id_wisatawan
WHEN 55 THEN 'hide'
WHEN 56 THEN 'hide'
WHEN 57 THEN 'hide'
WHEN 58 THEN 'hide'
WHEN 59 THEN 'hide'
WHEN 60 THEN 'hide'
WHEN 61 THEN 'hide'
WHEN 62 THEN 'hide'
WHEN 63 THEN 'hide'
WHEN 64 THEN 'hide'
WHEN 65 THEN 'hide'
WHEN 66 THEN 'hide'
WHEN 67 THEN 'hide'
WHEN 68 THEN 'hide'
WHEN 69 THEN 'hide'
WHEN 70 THEN 'hide'
WHEN 71 THEN 'hide'
WHEN 72 THEN 'hide'
WHEN 73 THEN 'hide'
WHEN 74 THEN 'hide'
END 
WHERE id_wisatawan IN ( 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74)


-- SHOW kunjungan wisatawan dari 41-60
UPDATE t_wisata_objek
SET status = CASE id_wisatawan
WHEN 55 THEN 'show'
WHEN 56 THEN 'show'
WHEN 57 THEN 'show'
WHEN 58 THEN 'show'
WHEN 59 THEN 'show'
WHEN 60 THEN 'show'
WHEN 61 THEN 'show'
WHEN 62 THEN 'show'
WHEN 63 THEN 'show'
WHEN 64 THEN 'show'
WHEN 65 THEN 'show'
WHEN 66 THEN 'show'
WHEN 67 THEN 'show'
WHEN 68 THEN 'show'
WHEN 69 THEN 'show'
WHEN 70 THEN 'show'
WHEN 71 THEN 'show'
WHEN 72 THEN 'show'
WHEN 73 THEN 'show'
WHEN 74 THEN 'show'
END 
WHERE id_wisatawan IN ( 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74)










-- HIDE kunjungan wisatawan dari 61-80
UPDATE t_wisata_objek
SET status = CASE id_wisatawan
WHEN 75 THEN 'hide'
WHEN 76 THEN 'hide'
WHEN 77 THEN 'hide'
WHEN 78 THEN 'hide'
WHEN 79 THEN 'hide'
WHEN 80 THEN 'hide'
WHEN 81 THEN 'hide'
WHEN 82 THEN 'hide'
WHEN 83 THEN 'hide'
WHEN 84 THEN 'hide'
WHEN 85 THEN 'hide'
WHEN 86 THEN 'hide'
WHEN 87 THEN 'hide'
WHEN 88 THEN 'hide'
WHEN 89 THEN 'hide'
WHEN 90 THEN 'hide'
WHEN 91 THEN 'hide'
WHEN 92 THEN 'hide'
WHEN 93 THEN 'hide'
WHEN 191 THEN 'hide'
END 
WHERE id_wisatawan IN ( 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 191)


-- SHOW kunjungan wisatawan dari 61-80
UPDATE t_wisata_objek
SET status = CASE id_wisatawan
WHEN 75 THEN 'show'
WHEN 76 THEN 'show'
WHEN 77 THEN 'show'
WHEN 78 THEN 'show'
WHEN 79 THEN 'show'
WHEN 80 THEN 'show'
WHEN 81 THEN 'show'
WHEN 82 THEN 'show'
WHEN 83 THEN 'show'
WHEN 84 THEN 'show'
WHEN 85 THEN 'show'
WHEN 86 THEN 'show'
WHEN 87 THEN 'show'
WHEN 88 THEN 'show'
WHEN 89 THEN 'show'
WHEN 90 THEN 'show'
WHEN 91 THEN 'show'
WHEN 92 THEN 'show'
WHEN 93 THEN 'show'
WHEN 191 THEN 'show'
END 
WHERE id_wisatawan IN ( 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 191)










-- HIDE kunjungan wisatawan dari 81-100
UPDATE t_wisata_objek
SET status = CASE id_wisatawan
WHEN 192 THEN 'hide'
WHEN 193 THEN 'hide'
WHEN 194 THEN 'hide'
WHEN 195 THEN 'hide'
WHEN 196 THEN 'hide'
WHEN 197 THEN 'hide'
WHEN 198 THEN 'hide'
WHEN 199 THEN 'hide'
WHEN 200 THEN 'hide'
WHEN 201 THEN 'hide'
WHEN 202 THEN 'hide'
WHEN 203 THEN 'hide'
WHEN 204 THEN 'hide'
WHEN 205 THEN 'hide'
WHEN 206 THEN 'hide'
WHEN 207 THEN 'hide'
WHEN 208 THEN 'hide'
WHEN 209 THEN 'hide'
WHEN 210 THEN 'hide'
WHEN 211 THEN 'hide'
END 
WHERE id_wisatawan IN ( 192, 193, 194, 195, 196, 197, 198, 199, 200, 201, 202, 203, 204, 205, 206, 207, 208, 209, 210, 211)


-- SHOW kunjungan wisatawan dari 81-100
UPDATE t_wisata_objek
SET status = CASE id_wisatawan
WHEN 192 THEN 'show'
WHEN 193 THEN 'show'
WHEN 194 THEN 'show'
WHEN 195 THEN 'show'
WHEN 196 THEN 'show'
WHEN 197 THEN 'show'
WHEN 198 THEN 'show'
WHEN 199 THEN 'show'
WHEN 200 THEN 'show'
WHEN 201 THEN 'show'
WHEN 202 THEN 'show'
WHEN 203 THEN 'show'
WHEN 204 THEN 'show'
WHEN 205 THEN 'show'
WHEN 206 THEN 'show'
WHEN 207 THEN 'show'
WHEN 208 THEN 'show'
WHEN 209 THEN 'show'
WHEN 210 THEN 'show'
WHEN 211 THEN 'show'
END 
WHERE id_wisatawan IN ( 192, 193, 194, 195, 196, 197, 198, 199, 200, 201, 202, 203, 204, 205, 206, 207, 208, 209, 210, 211)

