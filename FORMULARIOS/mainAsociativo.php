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
            font-size: 40px;
            
        }
        
        form{
            width: 60%;
        }
        
       
        
        div{
            margin-left: 30%;
            align-content: center;
            width: 80%;
        }
        
        #sub{
            margin-left: 30%;
            background-color: lightblue; 
        }
        
        #sub:hover{
            background-color: lightcoral;
            cursor: pointer;
        }
        
        input{
            margin-bottom:10%;
        }
        
    </style>
    <body>

        <div>
        
        <h1>INTRODUCE TUS DATOS</h1>

        <!--Si pones en el action PHP_SELF puedes recojer los datos en el mismo archivo-->
        
        <form action="formularioAsociativo.php" method="POST">
            Nombre <input type="text" name="name"></br>
            E-mail  <input type="text" name="email"></br>
            <input id="sub" type="submit">
        </form>
        </div>

    </body>
</html>
