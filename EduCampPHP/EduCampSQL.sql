
--CREACION--
create database EduCamp
use EduCamp

------------------------------------------------------TABLAS--
create table Cursos 
(
	IdCurso varchar(12) primary key not null,
	NombreCurso varchar(100)not null
)


create table Estudiantes 
(
	IdEstudiante int primary key not null,
	NombreEstudiante varchar(45)not null,
	ApellidoEstudiante_1 varchar(30),
	ApellidoEstudiante_2 varchar(30),
	CorreoEstudiante varchar(100)not null,
	FechaCreacion datetime not null,	-- No se encuentra uso de este dato aparte de auditabilidad, se deja por requisito de proyecto
	Estado bit not null
)

CREATE TABLE Inscripcion				--Matricula de curso estudiante, relacion Curso<-->Estudiante
(
    IdInscripcion int identity(1,1) primary key,
    EstudianteID int foreign key references Estudiantes(IdEstudiante),
    CursoID varchar(12) foreign key references Cursos(IdCurso)
)


---------------------------------------------------------------------------INSERCIONES--
insert into Cursos values('MT-01','Matemáticas')
insert into Cursos values('ES-01','Estudios Sociales')
insert into Cursos values('E-01','Español')
insert into Cursos values('C-01','Ciencias')

select * from Cursos

insert into Estudiantes values(301840326,'Carlos','Segura','Vega','carlossegura@gmail.com',GETDATE(),1)
insert into Estudiantes values(301840327,'Marco','Oviedo','Delgado','marcoviedo@gmail.com',GETDATE(),1)
insert into Estudiantes values(301840328,'Bryan','Montes','Valle','byanmontes@gmail.com',GETDATE(),1)
insert into Estudiantes values(301840329,'Jose','Montero','Salazar','josemontero@gmail.com',GETDATE(),1)
insert into Estudiantes values(301840330,'Maria','Vasques','Vega','mariavasques@gmail.com',GETDATE(),1)
insert into Estudiantes values(301840331,'Teresa','Zapata','Vargas','teresazapata@gmail.com',GETDATE(),1)

insert into Inscripcion values(301840326,'MT-01')
insert into Inscripcion values(301840327,'E-01')
insert into Inscripcion values(301840328,'ES-01')
insert into Inscripcion values(301840329,'MT-01')
insert into Inscripcion values(301840330,'ES-01')
insert into Inscripcion values(301840331,'E-01')
insert into Inscripcion values(301840332,'C-01')
insert into Inscripcion values(301840332,'E-01')



-----------------------------------------------------------------------------------SOLICITUDES PRUEBA--
select * from Estudiantes
select * from Cursos
select * from Inscripcion

select e.IdEstudiante,e.NombreEstudiante,e.ApellidoEstudiante_1,e.ApellidoEstudiante_2,e.CorreoEstudiante,e.FechaCreacion,e.Estado from Inscripcion,Estudiantes as e where IdEstudiante = EstudianteID
select c.NombreCurso from Cursos as c,Estudiantes, Inscripcion as i where EstudianteID = 301840332 and c.IdCurso = i.CursoID and IdEstudiante = EstudianteID


----------------------------------------------------------------------------------STORED PROCEDURES CURSOS--
go
create procedure InsertarCurso -- Inserción curso / requisito de proyecto
    @IdCurso varchar(50),
	@NombreCurso varchar(100)
as
begin
    insert into Cursos(IdCurso,NombreCurso)
    values (@IdCurso,@NombreCurso)
end

go
create procedure InsertarCursoAlumno -- Inserción curso / requisito de proyecto
    @IdCurso varchar(50),
	@IdEstudiante int
as
begin
    insert into Inscripcion(CursoID,EstudianteID)
    values (@IdCurso,@IdEstudiante)
end


-----------------------------------------------------------------------------------STORED PROCEDURES ESTUDIANTE--
go
create procedure ConsultarAlumno -- Consultar lista de alumnos cuando acaba de empezar el programa, no se considera de relevancia para el usuario la fecha de creación ni su estado por lo que no se muestra para mantener legibilidad

as
begin -- Esta 
    Select E.IdEstudiante, E.NombreEstudiante, E.ApellidoEstudiante_1, E.ApellidoEstudiante_2, E.CorreoEstudiante, C.NombreCurso,C.IdCurso from Estudiantes E left join Inscripcion I on E.IdEstudiante = I.EstudianteID left join Cursos C on I.CursoID = C.IdCurso where E.estado = 1;
end

go

create procedure InsertarAlumno -- Inserción estudiante / requisito de proyecto
    @IdEstudiante int,
	@NombreEstudiante varchar(45),
	@ApellidoEstudiante_1 varchar(30),
	@ApellidoEstudiante_2 varchar(30),
	@CorreoEstudiante varchar(100)
as
begin
    insert into Estudiantes (IdEstudiante,NombreEstudiante,ApellidoEstudiante_1,ApellidoEstudiante_2,CorreoEstudiante,FechaCreacion,Estado)
    values (@IdEstudiante,@NombreEstudiante,@ApellidoEstudiante_1,@ApellidoEstudiante_2,@CorreoEstudiante,GETDATE(),1) --Obtenemos la fecha actual y seteamos el alumno como activo
end


go
create procedure ActualizarAlumno -- Actualizar estudiante / requisito de proyecto
    @IdEstudiante int,
	@NombreEstudiante varchar(45),
	@ApellidoEstudiante_1 varchar(30),
	@ApellidoEstudiante_2 varchar(30),
	@CorreoEstudiante varchar(100)
as
begin
    update Estudiantes
		set NombreEstudiante = @NombreEstudiante,
			ApellidoEstudiante_1= @ApellidoEstudiante_1,
			ApellidoEstudiante_2=@ApellidoEstudiante_2,
			CorreoEstudiante = @CorreoEstudiante
		where IdEstudiante = @IdEstudiante
end

go
create procedure EliminarAlumno -- Eliminar estudiante / requisito de proyecto (Eliminado lógico)
    @IdEstudiante int
as
begin
    update Estudiantes
	set Estado=0
    where IdEstudiante = @IdEstudiante
end






-----------------------------------------------------------------------------ESCALABILIDAD

--create table Profesores --ligados a los cursos para mostrar solo los cursos de cada profesor
--(
--	IdProfesor int primary key not null,
--	NombreProfesor varchar(30)not null,
--	CorreoProfesor varchar(100)not null,
--	PasswrdProfesor varchar(16)not null,
--	Estado bit not null
--)
--create table Auditabilidad -- espacio de guardado de actividad realizada, analizar uso de triggers
--(
--    IdTransaccion int identity(1,1) primary key not null,
--    IdEntidadMod int foreign key references Profesores(IdProfesor),
--	ProcesoEjecutado varchar(20),
--    FechaMod date 
--)
--create table Administrador -- se revisa la posibilidad que se pueda hacer una pagina administrador
--(
--	IdAdmin int identity (1,1)primary key,
--	CorreoAdmin varchar(100),
--	PassAdmin varchar(16)
--
--)


--stored procedures Profesores--
--go
--create procedure InsertarProfesor -- crear profesor / tareas posiblemente definidas para uso admin
--    @NombreProfesor varchar(30),
--    @CorreoProfesor varchar(100),
--	@PasswrdProfesor varchar(16),
--	@IdProfesor int,
--    @Estado int
--as
--begin
--    insert into Profesores (NombreProfesor, CorreoProfesor, PasswrdProfesor, Estado)
--    values (@NombreProfesor, @CorreoProfesor, @PasswrdProfesor, @Estado)

--	select @IdProfesor=IdProfesor from Profesores where NombreProfesor=@NombreProfesor and CorreoProfesor = @CorreoProfesor

--	insert into Auditabilidad(IdEntidadMod,ProcesoEjecutado,FechaMod)
--	values(@IdProfesor,'Insercion de valores',GETDATE())
--end

--go
--create procedure ActualizarProfesor -- Actualizar profesor / tareas posiblemente definidas para uso admin
--    @IdProfesor int,
--    @NombreProfesor varchar(30),
--    @CorreoProfesor varchar(100)
--as
--begin
--    update Profesores
--    set NombreProfesor = @NombreProfesor,
--        CorreoProfesor = @CorreoProfesor
--    where IdProfesor = @IdProfesor
--end

--go
--create procedure EliminarProfesor -- crear profesor / tareas posiblemente definidas para uso admin
--    @Estado int,
--	@IdProfesor int
--as
--begin
--    Update Profesores
--	set Estado=@Estado
--    where IdProfesor = @IdProfesor
--end