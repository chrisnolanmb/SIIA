SELECT 
    AVG(Calificacion) AS Promedio, COUNT(Calificacion) AS Conteo
FROM
    calificaciones C
        JOIN
    inscripcion I ON C.id_alumno = I.id_alumno
        JOIN
    profesor P ON C.id_profesor = P.num_empleado
        JOIN
    alta_materias M ON C.id_materia = M.id_materia
        JOIN
    mapa_curricular MP ON M.Clave = MP.Clave
        AND C.id_alumno = '1339846K'
        AND I.materia = C.id_materia
;
        