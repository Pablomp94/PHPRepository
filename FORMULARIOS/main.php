<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <style>
        *{
            font-size: 30px;
            
        }
        
        form{
            width: 60%;
        }
        
       
        
        div{
            margin:auto;
            width: 60%;
            justify-items: center;
        }
        
    </style>
    <body>

        <h1>INTRODUCE TUS DATOS</h1>

        <!--Si pones en el action PHP_SELF puedes recojer los datos en el mismo archivo-->
        <div>
        <form action="formulario.php" method="POST">
            Nombre <input type="text" name="name"></br>
            E-mail  <input type="text" name="email"></br>
            <input type="submit">
        </form>
        </div>

    </body>
</html>
