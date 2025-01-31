<?php

/*
 *      ACCESO A DATOS EN PHP CON SQL
 * 
 * 
 *      ALMACENES DE DATOS 
 * 
 * 
 * Arquitecturas :
 *      
 *           Modelo en tres capas (Presentacion/Negocio/Datos)
 * 
 *           Patrones arquitectonicos  (Modelo MVC/Microservicios/Arquitectura orientada a servicios)
 * 
 * 
 * Persistencia de datos => Estructura de datos :
 * 
 *           Estructura de datos y sesion HTTP:
 *      
 *              Variables de sesion
 * 
 *              Estructuras de datos temporales
 * 
 *              Cache del servidor
 * 
 *              Cookies y el almacenamiento local
 * 
 *           
 *           Persistencia en archivos:
 *                  
 *               Archivos JSON/CSV/XML
 * 
 *               Permisos y concurrencia
 * 
 *  SISTEMAS GESTORES DE BASE DE DATOS
 * 
 *          Que nos ofrecen:
 *              
 *              Mayor estructuracion de datos
 * 
 *              Control de concurrencia 
 * 
 *              Integridad referencial
 * 
 *              Optimizacion de consultas
 * 
 *              Backup y recuperacion
 * 
 * 
 * 
 * 
 * APIS COMO ALMACEN DE DATOS
 *      
 * 
 *      APIs modernas proporcionan:             
 * 
 *          
 *          (Representational state transfer) 
 *          Interfaces RESTFUL => Tipo de arquitectura para diseñar servicios web.
 *          Cada peticion del cliente debe contener toda la informacion necesaria.
 * 
 *          Recursos se identifican mediante URLs unicas
 * 
 *          Beneficios => Velocidad/Estabilidad/Independencia de la plataforma
 * 
 *          (GET/POST/PUT/PATCH/DELETE)
 * 
 * 
 * 
 * CONCEPTO DE PERSISTENCIA
 * 
 *      Garantizar durabilidad informacion
 * 
 *      Permitir recuperacion de datos
 * 
 *      Mantener Integridad
 * 
 *      Facilitar acceso concurrente
 * 
 * 
 * Operaciones CRUD
 * 
 *      (Create/Read/Update/Delete)
 * 
 *      Operaciones fundamentales que se pueden realizar sobre los datos en una 
 *      base de datos.
 * 
 *      Create => Insertacion de nuevos registros en nuestra base de datos.
 *      ("INSERT INTO usuarios(nombre,email) VALUES ('JUAN','juan@gmail.com');")
 * 
 *      
 *      Read => Para consultar o recuperar datos existentes.
 *      ("SELECT * FROM usuarios;")
 *      ("SELECT nombre FROM usuarios WHERE id = 1;")     
 * 
 *      Update => 
 * 
 * 
 */


?>
