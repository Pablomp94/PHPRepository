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
        
        h1{
            font-size: 50px;
        }
        
        form{
            width: 60%;
        }
        
       
        
        div{
            margin-left: 20%;
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
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
            Archivo: <input type="file" name="archivo"></br>
            <button id="sub" type="submit" name="submit">SUBMIT</button>
        </form>
        </div>
        
        <?php
             
        if(isset($_FILES["archivo"])){{
            
        }
            
        }
             
             
             
        ?>
    </body>
</html>
