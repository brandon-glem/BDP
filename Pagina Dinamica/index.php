<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Formulario de CV</title>
</head>

<body>
    <h1>FORMULARIO DE TRABAJO</h1>  

    <div class="grid-container">
        <form method="post">
        

            <label for="nombre">Nombre: </label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre"><br><br>
            <label for="apellido">Apellido: </label>
            <input type="text" id="apellido" name="apellido" placeholder="Apellido"><br><br>

            <label for="nacimiento">Fecha de Nacimiento: </label>
            <input type="date" id="nacimiento" name="nacimiento" placeholder="dd / mm / aa"><br><br>

            <label for="ocupacion">Ocupacion: </label>
            <input type="text" id="ocupacion" name="ocupacion"><br><br>

            <label for="correo">Correo Electronico: </label>
            <input type="email" id="correo" name="correo"><br><br>

            <label for="telefono">Numero de Telefono: </label>
            <input type="tel" id="telefono" name="telefono" placeholder="999 999 999" pattern="[0-9]{9}"><br><br>

            <label for="Nacionalidad">Nacionalidad: </label><br>
            <select id="Nacionalidad" name="Nacionalidad">
                <option value"es"> España</option>
                <option value"pe"> Perú</option>
                <option value"co"> Colombia</option>
                <option value"mx"> Mexico</option>
            </select><br><br>

            <label for="ingles">Nivel de Ingles: </label><br>
            <input type="radio" id="ingles" name="ingles" value="Basico">
            <label for="ingles">Basico</label><br>
            <input type="radio" id="ingles" name="ingles" value="Intermedio">
            <label for="ingles">Intermedio</label><br>
            <input type="radio" id="ingles" name="ingles" value="Avanzado">
            <label for="ingles">Avanzado</label><br>
            <input type="radio" id="ingles" name="ingles" value="Fluido">
            <label for="ingles">Fluido</label><br><br>

            <label for="aptitudes"> Aptitudes: </label><br>
            <input type="checkbox" name="aptitudes[]" value="Comunicación"> Comunicación<br>
            <input type="checkbox" name="aptitudes[]" value="Trabajo en equipo"> Trabajo en equipo<br>
            <input type="checkbox" name="aptitudes[]" value="Liderazgo"> Liderazgo<br>
            <input type="checkbox" name="aptitudes[]" value="Creatividad"> Creatividad<br><br>

            <label for="habilidades">Habilidades: </label><br>
            <input type="checkbox" name="habilidades[]" value="Programación"> Programación<br>
            <input type="checkbox" name="habilidades[]" value="Diseño gráfico"> Diseño gráfico<br>
            <input type="checkbox" name="habilidades[]" value="Gestión de proyectos"> Gestión de proyectos<br><br>

            <label for="perfil">Perfil: </label><br>
            <textarea name="perfil" rows="10" cols="30"></textarea>
            <br><br>

            <input type="submit" name="Enviar" >
        </form>
    </div>

    <?php
    include("formulario.php");
    ?>

</body>
</html>