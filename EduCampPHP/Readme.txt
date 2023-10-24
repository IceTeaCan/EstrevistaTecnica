      :::::::::  :::::::::::  ::::::::::  ::::    ::: :::     :::  ::::::::::  ::::    :::  :::::::::::  :::::::::   ::::::::       :::    :::   ::::::::   :::    :::     :::      :::::::::  :::::::::::   ::::::::  
    +:+    +:+     +:+      +:+         :+:+:+  +:+ +:+     +:+  +:+         :+:+:+  +:+      +:+      +:+    +:+  +:+    +:+      +:+    +:+  +:+         +:+    +:+  +:+   +:+   +:+    +:+    +:+      +:+    +:+  
   +#++:++#+      +#+      +#++:++#    +#+ +:+ +#+ +#+     +:+  +#++:++#    +#+ +:+ +#+      +#+      +#+    +:+  +#+    +:+      +#+    +:+  +#++:++#++  +#+    +:+  +#++:++#++: +#++:++#:     +#+      +#+    +:+   
  +#+    +#+     +#+      +#+         +#+  +#+#+#  +#+   +#+   +#+         +#+  +#+#+#      +#+      +#+    +#+  +#+    +#+      +#+    +#+          +#+ +#+    +#+  +#+     +#+ +#+    +#+    +#+      +#+    +#+    
 #+#    #+#     #+#      #+#         #+#   #+#+#   #+#+#+#    #+#          #+#   #+#+#      #+#      #+#    #+# #+#    #+#      #+#    #+#  #+#    #+#  #+#    #+#  #+#     #+# #+#    #+#    #+#      #+#    #+#     
#########  ###########  ##########  ###    ####     ###      ##########   ###    ####  ###########  #########   ########        ########    ########    ########   ###     ### ###    ### ###########  ########       




        /////////////////////////////////////////////////////
       ///						 ///
      ///    Proyecto CRUD Componentes El Orbe SA       ///
     /// Desarrollado por Jonathan Salazar Rodríguez   ///
    ///       Fecha de entrega: 24/10/2023 6p.m       ///
   ///	     Entrega: Josué Quesada Solís	     ///
  /// 		CC:Wendy Vargas Cabezas		    ///
 /// 						   ///
/////////////////////////////////////////////////////       ATENCIÓN: se cambia IdCurso (numérico) a tipo string para facilitar su uso y búsqueda en el programa




Antes de usar
Este programa fue desarrollado usando XAMPP,VSCode y SQL
Se aplicó un arquitectura de 3 capas Datos, negocio, presentación(FrontEnd) y uso de POO
Uso de PDO
XAMPP v3.3.0
PHP 8.2.4
SQL 2019
VS Code 1.83.1



 Requisitos de proyecto:

	- Crear base de datos con plantilla de estructura de tablas
		-Objetivo: Comunicar la base de datos a la capa de Datos en php
		-Valor agregado: Uso de stored procedures para la solicitud y trato de información simplificando los procesos de comunicación

	-Elaborar aplicación en php v7 u 8 CRUD para proceso de información
		-Objetivo:administrar la tabla de estudiantes.
		-Valor agregado: Arquitectura de 3 capas con manejo de sql injections y errores, Uso de PDO como formato de comunicación
				a base de datos para dar escalabilidad a la infraestructura tecnológica en la que se inplemente sin afectar mucho el formato programado.
			-Tarea:Formulario ver todos los estudiantes.
				-Datatable permite realizar búsquedas dentro del contenido con la barra search
			-Tarea:Formulario crear un nuevo registro.
			-Tarea:Formulario editar cualquiera de los estudiantes.
			-Tarea:Eliminar el estudiante de la base datos.

	-Objetivos valor agregado:
		-Tarea:Formulario manejo de cursos
		-Valor agregado: creación de curso y inscripción de estudiantes a cursos.

Requisitos extra:
	-Cuidar los manejo de errores y muestra de formulario 404 cuando sucede un error con mensajes personalizados para mejor comprención en algunos casos
	-Notificar al usuario de tareas realizadas con exito por medio de un formulario que orienta al usuario
	-Uso de boostrap para un diseño acorde a la necesidad y comprención de el usuario con mensajes de guía de uso 
	-Utilizar las mejores praxis en los formatos de php y sql buscando que el codigo sea agil, escalable y amigable tanto para programadores como usuarios finales


COMO USAR 
Descargue XAMPP https://www.apachefriends.org/es/download.html y realice la instalación https://www.youtube.com/watch?v=xXkKeojOb1A&t=40s
Descargue SQL server 2019 o superior https://www.microsoft.com/es-es/evalcenter/download-sql-server-2019 y realice la instalación https://www.youtube.com/watch?v=SqZQffksa0w
Descargue VSCode https://code.visualstudio.com/download y realice la instalación https://www.youtube.com/watch?v=orvcXUxNXOo

Una ves realizado esto con XAMPP podrá correr su servidor donde puede ejecutar el php en su navegador, es necesario una ves levantado el recurso de apache ingresar al navegador y escribir "localhost" en la barra de buscador
Debera descargar algunos otros elementos para la correcta configuracion de plugins conmo Xdebug para utilizarlo en VSCode y debuguear si asi lo necesita https://www.youtube.com/watch?v=TexkCrk6njc

Para ejecutar el proyecto se debe tener alojado en la carpeta "C:\xampp\htdocs" el proyecto a utilizar 
Una vez realizado estos pasos abra el XAMPP en su navegador usando el método explicado anteriormente y ejecute "http://localhost/EduCamp/EduCampPHP/FrontEnd/index.php" en su navegador o con solo entrar a la carpeta FrontEnd deberia abrir el index automaticamente


