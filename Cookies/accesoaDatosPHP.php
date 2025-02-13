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
 *      
 * 
 *    CRUD
 *      
 *      CREATE
 * 
 *      function crearUsuario($nombre, $email){
 * 
 *          $sql = "INSERT INTO usuarios nombre, email VALUES (?, ?)";
 *          
 *      }
 *      
 * 
 *      READ
 * 
 *      function obtenerUsuario($id){
 *          
 *          $sql = "SELECT * FROM usuarios WHERE id = ?";
 *  
 *      }
 * 
 * 
 *      UPDATE
 * 
 *      function actualizarUsuario($email, $id){
 * 
 *          $sql = "UPDATE usuarios SET email = ? WHERE id = ?";
 * 
 *      }
 * 
 * 
 *      DELETE
 * 
 *      function eliminarUsuario($id){
 * 
 *          $sql = "DELETE FROM usuarios WHERE id = ?";
 * 
 *      }
 * 
 * 
 * 
 * 7.2 Almacenes de datos
 * 
 *      Ventajas de los sistemas gestores de base de datos (SGBD)
 *          -Beneficios Arquitectonicos
 *              -Separacion entre logica de aplicacion y datos
 *              -Escalabilidad 
 *              -Alta disponibilidad y tolerancia al fallos
 *              -Gestion centralizada de datos
 *           
 *                       
 *          -Ventajas en gestion de datos
 *              -Integridad referencial
 *              -Respaldo y recuperacion
 *              -Consistencia
 * 
 *          -Beneficios operacionales
 *              -Consultas complejas optimizadas
 *              -Monitorizacion y auditoria
 *              
 * 
 * 
 * 
 *      Fundamentos BBDD -> Diseño de BBDD
 * 
 *          -Diseño conceptual 
 *              -Modelo entidad relacion
 *              -Identificacion atributos
 *              -Cardinalidad de relacio     
 *              -Normalizacion de datos
 * 
 *          
 *          -Diseño logico
 *              -Definicion de tablas y relaciones
 *              -Especificacion de claves primarias y foraneas
 *             
 * 
 *          -Diseño fisico 
 *              -Seleccion de tipo de datos
 *              -Definicion de indices 
 *              -Estrategias de almacenamiento
 *              -etc...
 * 
 * 
 *         
 *      Lenguaje DDL (Data Definition Languaje)
 * 
 *          -Create table tabla ( id INT PRIMARY, Campo1 VARCHAR(50), 
 *          Campo2 DATE, FOREIGN KEY (campo_ref) REFERENCES otra_tabla(id));
 *          
 *         
 *      BP 
 *          -Usar siempre consultas separadas
 *          -Credenciales -> Fuera del codigo fuente
 *          -Implementar manejo de errores
 *          
 *          -Cerrar conexiones fuando no se necesiten
 *          -Reutilizar conexiones 
 *          -Monitorear el uso de recursos
 * 
 * 
 * 
 */


?>
