<?php
include("con_db.php");

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$nombre = $apellido=$fecha_de_nacimiento=$ocupacion=$correo=$telefono=$nacionalidad=$ingles=$aptitudes=$habilidades=$perfil="";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		if (empty($_POST['nombre']) &&
			empty($_POST['apellido']) &&
			empty($_POST['nacimiento']) &&
			empty($_POST['ocupacion']) &&
			empty($_POST['correo']) &&
			empty($_POST['telefono'])&&
			empty($_POST['ingles'])&&
			empty($_POST['aptitudes']) &&
			empty($_POST['habilidades']) &&
			empty($_POST['perfil']) &&
			isset($_POST['Enviar'])){

			?>
			<h2 class="bad">Por favor complete el formulario.</h2>
			<?php
	
		} else {
			$nombre = test_input($_POST['nombre']);
			$apellido = test_input($_POST['apellido']);
			$fecha_de_nacimiento= $_POST['nacimiento'];
			$ocupacion = test_input($_POST['ocupacion']);
			$correo = test_input($_POST['correo']);
			$telefono = test_input($_POST['telefono']);
			$nacionalidad = test_input($_POST['Nacionalidad']);
			$ingles = $_POST['ingles'];
			$perfil = test_input($_POST['perfil']);

			$aptitudes = isset($_POST['aptitudes']) ? implode(",", $_POST['aptitudes']) : "";
			$habilidades = isset($_POST['habilidades']) ? implode(",", $_POST['habilidades']) : "";


			$consulta = "INSERT INTO `datoscv`(nombre, apellido, nacimiento, 
					ocupacion, correo, telefono, nacionalidad, ingles, aptitudes, 
					habilidades, perfil) VALUES ('$nombre','$apellido','$fecha_de_nacimiento','$ocupacion',
					'$correo','$telefono','$nacionalidad','$ingles','$aptitudes','$habilidades','$perfil')";
			$resultado = mysqli_query($conex,$consulta);

			if($resultado){
				?>
				<h2 class="ok">Se ha enviado tu CV.</h2>
				<?php
				$nombre=$apellido=$fecha_de_nacimiento=$ocupacion=$correo=$telefono=$nacionalidad=$ingles=$aptitudes=$habilidades=$perfil="";
			} else {
				?>
				<h2 class="bad">Ha ocurrido un error.</h2>
				<?php
			}	
		}
		exit();
}
$conex->close();
?>