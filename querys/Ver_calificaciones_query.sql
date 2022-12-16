SELECT 
    Nombre_materia AS Asignatura,
    Nombre AS profesor,
    Periodo,
    Calificacion
FROM
    calificaciones C
        JOIN
    inscripcion I ON C.alumno_id = I.id_alumno
        JOIN
    profesor P ON C.id_profesor = P.num_empleado
        JOIN
    alta_materias M ON C.id_materia = M.id_materia
        JOIN
    mapa_curricular MP ON M.Clave = MP.Clave
        AND C.alumno_id = '1339846K'
        AND I.materia = C.id_materia
        AND I.Ciclo = '23/23'
;