
<div class="login-box">
	<img src="style/img/logo.png" class="avatar" alt="Avatar Image">
	<h1>Iniciar Sesion</h1>
	<form method="post">
		<!-- USERNAME INPUT -->
		<label for="username">Usuario</label>
		<input type="text" placeholder="Ingrese Usuario" name="usuario" required="">
		<!-- PASSWORD INPUT -->
		<label for="password">Contraseña</label>
		<input type="password" placeholder="Ingrese Contraseña" name="contra" required="">
		<input type="submit" value="Ingresar">
		<a href="index.php?pag=olvidastecontra">Olvidaste tu usuario/contraseña?</a><br>
	</form>
	<?php 
	$ingreso= new ControladorFormularios();
	$ingreso->ctrIngreso();
	?>
</div>
<style type="text/css">
	body {
  margin: 0;
  padding: 0;
  background: url("style/img/Fondo.png") no-repeat center top;
  background-size: cover;
  font-family: sans-serif;
  height: 100vh;
}

.login-box {
  width: 320px;
  height: 420px;
  background: #000;
  color: #fff;
  top: 50%;
  left: 50%;
  position: absolute;
  transform: translate(-50%, -50%);
  box-sizing: border-box;
  padding: 70px 30px;
}

.login-box .avatar {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  position: absolute;
  top: -50px;
  left: calc(50% - 50px);
}

.login-box h1 {
  margin: 0;
  padding: 0 0 20px;
  text-align: center;
  font-size: 22px;
}

.login-box label {
  margin: 0;
  padding: 0;
  font-weight: bold;
  display: block;
}

.login-box input {
  width: 100%;
  margin-bottom: 20px;
}

.login-box input[type="text"], .login-box input[type="password"] {
  border: none;
  border-bottom: 1px solid #fff;
  background: transparent;
  outline: none;
  height: 40px;
  color: #fff;
  font-size: 16px;
}

.login-box input[type="submit"] {
  border: none;
  outline: none;
  height: 40px;
  background: #b80f22;
  color: #fff;
  font-size: 18px;
  border-radius: 20px;
}

.login-box input[type="submit"]:hover {
  cursor: pointer;
  background: #ffc107;
  color: #000;
}

.login-box a {
  text-decoration: none;
  font-size: 12px;
  line-height: 20px;
  color: darkgrey;
}

.login-box a:hover {
  color: #fff;
}

</style>

