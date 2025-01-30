<?php

/*
 *      SEGURIDAD Y FILTRADO DE DATOS
 * 
 * Prevencion de ataques:
 *      Al validar y limpiar datos evitamos inyecciones SQL, XSS
 * 
 * Integridad de datos:
 *      Se aseguran que los datos almacenados sean correctos y consistentes
 * 
 * Mejora del rendimiento:
 *      Datos limpios y validos pueden optimizar el rendimiento de las aplicaciones 
 * 
 * 
 * 
 * HERRAMIENTAS DE PHP PARA LA VALIDACION Y LIMPIEZA
 * 
 *      preg_match(); => Para expresiones regulares => Permite definir patrones de busqueda
 *                       y validacion complejos. (correos electronicos/nº telefonos/formato de fechas/etc).
 * 
 *      htmlentities y htmlspecialchars => Convierte los caracteres especiales en entidades html.
 *                                         evitando ejecucion de codigo malicioso.
 * 
 *      filter_var => Amplia gama de filtros para validar diferentes tipos de codigo.
 *      
 *      
 *      
 */

    $email = "paco@terra.es";
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL) ){
        echo "El correo electronico no es valido";
    }else{
        echo "El correo electronico es valido";
    }

    
/*
 *      ALMACENAMIENTO SEGURO DE CONTRASEÑAS
 * 
 * Almacenar contraseñas en texto plano => PELIGROSO (Contraseñas expuestas)
 * 
 * COMO ALMACENAR PASSWORDS DE FORMA SEGURA
 * 
 *      HASHING => password_hash() => Convertir texto plano a aleatoriedad de caracteres
 * 
 *      SALTING => Agregar una cadena aleatoria a la contraseña antes de encriptar 
 *                 para aumentar la seguridad
 * 
 *      
 *      AUTENTICACION CON TERCEROS
 * 
 * (GOOGLE, META, ETC) => Apis 
 * 
 * Mayor seguridad / Mejor experiencia de usuario / Facilita la implementacion
 * 
 * 
 */
    
    

?>