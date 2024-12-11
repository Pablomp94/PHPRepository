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
            font-size: 24px;

        }

        h1{
            font-size: 40px;
        }

        form{
            width: 60%;
        }



        div{
            margin-left: 30%;
            align-content: center;
            width: 60%;
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

        button:hover{
            cursor: pointer;
        }

        
        .error{
            color: red;
            font-weight: bold;
        }
        

    </style>
    <body>
        
         <?php
       
        //Define variables and set to empty values
        $name = $email = $gender = $comment = $website = "";
        $nameErr = $emailErr = $genderErr = $commentErr = $websiteErr = "";
        
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            
            if(empty($_POST["name"])){
                $nameErr = "El nombre es obligatorio";
            }else{
                $name = test_input($_POST["name"]);
            }
            
            if(empty($_POST["email"])){
                $emailErr = "El email es obligatorio";
            }else{
                $name = test_input($_POST["email"]);
            }
            
            if(empty($_POST["gender"])){
                $genderErr = "El genero es obligatorio";
            }else{
                $name = test_input($_POST["gender"]);
            }
            
            
        }
        
        //Depuracion de datos
        function test_input($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        ?>
        
        
        

        <div>

            <h1>INTRODUCE TUS DATOS</h1>

            
            <span class="error"><?php echo $nameErr ?></span>
            
            <!--Si pones en el action PHP_SELF puedes recojer los datos en el mismo archivo-->

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" enctype="multipart/form-data">
                Name: <input type="text" name="name" value=<?php $name ?>></br>
                <span class="error"><?php echo $emailErr ?></span></br>
                Email: <input type="text" name="email"></br>
                Website: <input type="text" name="web"></br>
                Comment: <textarea type="text" name="comment" rows="5" cols="40"></textarea></br>
                <span class="error"><?php echo $genderErr ?></span></br>
                Gender: <input type="radio" name="gender" value="female">Female
                 <input type="radio" name="gender" value="female">Male
                 <input type="radio" name="gender" value="female">Other
                 </br>

                 Kilos: <select name="tomate" id="precios">
                <option value="0">0 Kg</option>
                <option value="1">1 Kg</option>
                <option value="2">2 Kg</option>
                <option value="3">3 Kg</option>
            </select> TOMATE 3$/KILO
                <button id="sub" type="submit" name="submit">Send</button>
            </form>
        </div>



       
    </body>
</html>
