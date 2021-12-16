<?php 
require_once "conexion.php";
class ModeloFormularios{

	#Seleccion de registro
	static public function mdlSeleccionarRegistros($tabla, $item, $valor){
		if($item==null && $valor==null){
			$stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla");
			$stmt->execute();
			return $stmt->fetch();
		}else{
			$stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetch();
		}

		$stmt->close();
		$stmt=null;
	}
	
	#REGISTRO CLIENTE
	static public function mdlRegistroCliente($tabla, $datos){
		$stmt=Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, apellido, dni, cuit, domicilio, localidad, telefono, mail, actividadlaboral, persona, observacion, id_asesor, user, pass, archivo1, archivo2, archivo3, archivo4) VALUES (:nombre, :apellido, :dni, :cuit, :domicilio, :localidad, :telefono, :mail, :actividadlaboral, :persona, :observacion, :id_asesor, :user, :pass, :archivo1, :archivo2, :archivo3, :archivo4)");
		$stmt->bindParam(":nombre",$datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido",$datos["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":dni",$datos["dni"], PDO::PARAM_STR);
		$stmt->bindParam(":cuit",$datos["cuit"], PDO::PARAM_STR);
		$stmt->bindParam(":domicilio",$datos["domicilio"], PDO::PARAM_STR);
		$stmt->bindParam(":localidad",$datos["localidad"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono",$datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":mail",$datos["mail"], PDO::PARAM_STR);
		$stmt->bindParam(":actividadlaboral",$datos["actividadlaboral"], PDO::PARAM_STR);
		$stmt->bindParam(":persona",$datos["persona"], PDO::PARAM_STR);
		$stmt->bindParam(":observacion",$datos["observacion"], PDO::PARAM_STR);
		$stmt->bindParam(":id_asesor",$datos["id_asesor"], PDO::PARAM_INT);
		$stmt->bindParam(":user",$datos["user"], PDO::PARAM_STR);
		$stmt->bindParam(":pass",$datos["pass"], PDO::PARAM_STR);
		$stmt->bindParam(":archivo1",$datos["archivo1"], PDO::PARAM_STR);
		$stmt->bindParam(":archivo2",$datos["archivo2"], PDO::PARAM_STR);
		$stmt->bindParam(":archivo3",$datos["archivo3"], PDO::PARAM_STR);
		$stmt->bindParam(":archivo4",$datos["archivo4"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt->close();
		$stmt=null;
	}
	#Seleccion de registro ALL
	static public function mdlSeleccionarRegistrosaFetchall($tabla, $item, $valor){
		if($item==null && $valor==null){
			$stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla");
			$stmt->execute();
			return $stmt->fetchAll();
		}else{
			$stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetchAll();
		}

		$stmt->close();
		$stmt=null;
	}
	#Seleccion de registro ALL doble
	static public function mdlSeleccionarRegistrosaFetchallDoble($tabla, $item, $valor, $item2, $valor2){
		if($item==null && $valor==null){
			$stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla");
			$stmt->execute();
			return $stmt->fetchAll();
		}else{
			$stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item and $item2 = :$item2 ORDER BY id DESC");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt->bindParam(":".$item2, $valor2, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetchAll();
		}

		$stmt->close();
		$stmt=null;
	}
	
	#ELIMINAR CLIENTE
	static public function mdlEliminarCliente($tabla, $valor){
		$stmt=Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=:id");
		$stmt->bindParam(":id", $valor, PDO::PARAM_INT);
		if($stmt->execute()){
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt->close();
		$stmt=null;
	}


	#ACTUALIZAR CLIENTE
		static public function mdlActualizarCliente($tabla, $datos){
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, apellido=:apellido, dni=:dni, cuit=:cuit, domicilio=:domicilio, localidad=:localidad, telefono=:telefono, mail=:mail, actividadlaboral=:actividadlaboral, persona=:persona, observacion=:observacion WHERE id=:id");
		$stmt->bindParam(":id",$datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre",$datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido",$datos["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":dni",$datos["dni"], PDO::PARAM_STR);
		$stmt->bindParam(":cuit",$datos["cuit"], PDO::PARAM_STR);
		$stmt->bindParam(":domicilio",$datos["domicilio"], PDO::PARAM_STR);
		$stmt->bindParam(":localidad",$datos["localidad"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono",$datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":mail",$datos["mail"], PDO::PARAM_STR);
		$stmt->bindParam(":actividadlaboral",$datos["actividadlaboral"], PDO::PARAM_STR);
		$stmt->bindParam(":persona",$datos["persona"], PDO::PARAM_STR);
		$stmt->bindParam(":observacion",$datos["observacion"], PDO::PARAM_STR);
		if($stmt->execute()){
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt->close();
		$stmt=null;
	}

	#REGISTRO OPERACION
	static public function mdlRegistroOperacion($tabla, $datos){
		$stmt=Conexion::conectar()->prepare("INSERT INTO $tabla(titulo, descripcion, fecha, id_cliente, id_unegocio, id_asesor, comision, dtransaccion, porcomision, id_servicio, estado) VALUES (:titulo, :descripcion, :fecha, :id_cliente, :id_unegocio, :id_asesor, :comision, :dtransaccion, :porcomision, :id_servicio, :estado)");
		$stmt->bindParam(":titulo",$datos["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion",$datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha",$datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":id_cliente",$datos["id_cliente"], PDO::PARAM_INT);
		$stmt->bindParam(":id_unegocio",$datos["id_unegocio"], PDO::PARAM_INT);
		$stmt->bindParam(":id_asesor",$datos["id_asesor"], PDO::PARAM_INT);
		$stmt->bindParam(":comision",$datos["comision"], PDO::PARAM_INT);
		$stmt->bindParam(":dtransaccion",$datos["dtransaccion"], PDO::PARAM_INT);
        $stmt->bindParam(":porcomision",$datos["porcomision"], PDO::PARAM_INT);
        $stmt->bindParam(":id_servicio",$datos["id_servicio"], PDO::PARAM_INT);
        $stmt->bindParam(":estado",$datos["estado"], PDO::PARAM_INT);
		if($stmt->execute()){
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt->close();
		$stmt=null;
	}

	#REGISTRO ASESOR
	static public function mdlRegistroAsesor($tabla, $datos){
		$stmt=Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, apellido, dni, cuit, domicilio, localidad, telefono, correo, puestolaboral, id_u_negocio) VALUES (:nombre, :apellido, :dni, :cuit, :domicilio, :localidad, :telefono, :correo, :puestolaboral, :id_u_negocio)");
		$stmt->bindParam(":nombre",$datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido",$datos["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":dni",$datos["dni"], PDO::PARAM_INT);
		$stmt->bindParam(":cuit",$datos["cuit"], PDO::PARAM_INT);
		$stmt->bindParam(":domicilio",$datos["domicilio"], PDO::PARAM_STR);
		$stmt->bindParam(":localidad",$datos["localidad"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono",$datos["telefono"], PDO::PARAM_INT);
		$stmt->bindParam(":correo",$datos["correo"], PDO::PARAM_STR);
		$stmt->bindParam(":id_u_negocio",$datos["id_u_negocio"], PDO::PARAM_STR);
		$stmt->bindParam(":puestolaboral",$datos["puestolaboral"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt->close();
		$stmt=null;
	}

	#REGISTRO USUARIO
	static public function mdlRegistroUsuario($tabla, $datos){
		$stmt=Conexion::conectar()->prepare("INSERT INTO $tabla(usuarios, contrasena, privilegio, id_asesor, privturismo, privadministrativo) VALUES (:usuarios, :contrasena, :privilegio, :id_asesor, :privturismo, :privadministrativo)");
		$stmt->bindParam(":usuarios",$datos["usuarios"], PDO::PARAM_STR);
		$stmt->bindParam(":contrasena",$datos["contrasena"], PDO::PARAM_STR);
		$stmt->bindParam(":privilegio",$datos["privilegio"], PDO::PARAM_INT);
		$stmt->bindParam(":id_asesor",$datos["id_asesor"], PDO::PARAM_INT);
		$stmt->bindParam(":privturismo",$datos["privturismo"], PDO::PARAM_INT);
		$stmt->bindParam(":privadministrativo",$datos["privadministrativo"], PDO::PARAM_INT);

		if($stmt->execute()){
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt->close();
		$stmt=null;
	}


	#REGISTRO UNIDAD DE NEGOCIO
	static public function mdlRegistroUnegocio($tabla, $datos){
		$stmt=Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, descripcion) VALUES (:nombre, :descripcion)");
		$stmt->bindParam(":nombre",$datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion",$datos["descripcion"], PDO::PARAM_STR);
		if($stmt->execute()){
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt->close();
		$stmt=null;
	}

	#REGISTRO SERVICIO
	static public function mdlRegistroServicio($tabla, $datos){
		$stmt=Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, descripcion, precio, id_unidadnegocio) VALUES (:nombre, :descripcion, :precio, :id_unidadnegocio)");
		$stmt->bindParam(":nombre",$datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion",$datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":precio",$datos["precio"], PDO::PARAM_INT);
		$stmt->bindParam(":id_unidadnegocio",$datos["id_unidadnegocio"], PDO::PARAM_INT);
		if($stmt->execute()){
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt->close();
		$stmt=null;
	}


	#Seleccion de registro ESTADISITICAS SERVICIOS
	static public function mdlSeleccionarClienteEstadisticas($tabla, $item, $valor){
		$stmt=Conexion::conectar()->prepare("SELECT id ,nombre, id_servicio,  COUNT(id_servicio) AS id_servicio FROM $tabla GROUP BY id_servicio ORDER BY id_servicio DESC ");
		$stmt->execute();
		return $stmt->fetchAll();

		$stmt->close();
		$stmt=null;
	}

	#Seleccion de registro ESTADISITICAS operaciones
	static public function mdlSeleccionarOperacionesEstadisticas($tabla, $item, $valor){
		$stmt=Conexion::conectar()->prepare("SELECT id, id_unegocio,  COUNT(id_unegocio) AS id_unegocio FROM $tabla GROUP BY id_unegocio ORDER BY id_unegocio DESC ");
		$stmt->execute();
		return $stmt->fetchAll();

		$stmt->close();
		$stmt=null;
	}


	#REGISTRO SERVICIO CLIENTE
	static public function mdlRegistroServicioCliente($tabla, $datos){
		$stmt=Conexion::conectar()->prepare("INSERT INTO $tabla(id_unegocio, id_cliente) VALUES ( :id_unegocio, :id_cliente)");
		$stmt->bindParam(":id_unegocio",$datos["id_unegocio"], PDO::PARAM_INT);
		$stmt->bindParam(":id_cliente",$datos["id_cliente"], PDO::PARAM_INT);
		if($stmt->execute()){
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt->close();
		$stmt=null;
	}
	
	#ACTUALIZAR ASESOR
		static public function mdlActualizarAsesor($tabla, $datos){
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, apellido=:apellido, dni=:dni, cuit=:cuit, domicilio=:domicilio, localidad=:localidad, telefono=:telefono, correo=:correo, notas=:notas, id_u_negocio=:id_u_negocio, puestolaboral=:puestolaboral WHERE id=:id");
		$stmt->bindParam(":id",$datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre",$datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido",$datos["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":dni",$datos["dni"], PDO::PARAM_STR);
		$stmt->bindParam(":cuit",$datos["cuit"], PDO::PARAM_STR);
		$stmt->bindParam(":domicilio",$datos["domicilio"], PDO::PARAM_STR);
		$stmt->bindParam(":localidad",$datos["localidad"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono",$datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":correo",$datos["correo"], PDO::PARAM_STR);
		$stmt->bindParam(":notas",$datos["notas"], PDO::PARAM_STR);
		$stmt->bindParam(":id_u_negocio",$datos["id_u_negocio"], PDO::PARAM_INT);
		$stmt->bindParam(":puestolaboral",$datos["puestolaboral"], PDO::PARAM_STR);
		if($stmt->execute()){
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt->close();
		$stmt=null;
	}
	
	#REGISTRO RRHH
	static public function mdlRegistroRRhh($tabla, $datos){
		$stmt=Conexion::conectar()->prepare("INSERT INTO $tabla(id_asesor, titulo, fecha, observacion, archivo) VALUES (:id_asesor, :titulo, :fecha, :observacion, :archivo)");
		$stmt->bindParam(":id_asesor",$datos["id_asesor"], PDO::PARAM_INT);
		$stmt->bindParam(":titulo",$datos["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha",$datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":observacion",$datos["observacion"], PDO::PARAM_STR);
		$stmt->bindParam(":archivo",$datos["archivo"], PDO::PARAM_STR);
		if($stmt->execute()){
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt->close();
		$stmt=null;
	}
	
	
	
	#trakeo tareas
		static public function mdlTrackeoTareas($tabla, $datos){
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET estado=:estado WHERE id=:id");
		$stmt->bindParam(":id",$datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":estado",$datos["estado"], PDO::PARAM_INT);
		if($stmt->execute()){
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt->close();
		$stmt=null;
	}
	
	#REGISTRO prospecto
	static public function mdlRegistroProspecto($tabla, $datos){
		$stmt=Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, apellido, localidad, telefono, mail, actividadlaboral, persona, observacion, id_asesor) VALUES (:nombre, :apellido, :localidad, :telefono, :mail, :actividadlaboral, :persona, :observacion, :id_asesor)");
		$stmt->bindParam(":nombre",$datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido",$datos["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":localidad",$datos["localidad"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono",$datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":mail",$datos["mail"], PDO::PARAM_STR);
		$stmt->bindParam(":actividadlaboral",$datos["actividadlaboral"], PDO::PARAM_STR);
		$stmt->bindParam(":persona",$datos["persona"], PDO::PARAM_STR);
		$stmt->bindParam(":observacion",$datos["observacion"], PDO::PARAM_STR);
		$stmt->bindParam(":id_asesor",$datos["id_asesor"], PDO::PARAM_INT);
		if($stmt->execute()){
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt->close();
		$stmt=null;
	}
	
	#ACTUALIZAR prospecto
		static public function mdlActualizarProspecto($tabla, $datos){
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, apellido=:apellido, localidad=:localidad, telefono=:telefono, mail=:mail, actividadlaboral=:actividadlaboral, persona=:persona, observacion=:observacion WHERE id=:id");
		$stmt->bindParam(":id",$datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre",$datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido",$datos["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":localidad",$datos["localidad"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono",$datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":mail",$datos["mail"], PDO::PARAM_STR);
		$stmt->bindParam(":actividadlaboral",$datos["actividadlaboral"], PDO::PARAM_STR);
		$stmt->bindParam(":persona",$datos["persona"], PDO::PARAM_STR);
		$stmt->bindParam(":observacion",$datos["observacion"], PDO::PARAM_STR);
		if($stmt->execute()){
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt->close();
		$stmt=null;
	}
	
	
	#REGISTRO evento prospecto
	static public function mdlRegistroEnvio($tabla, $datos){
		$stmt=Conexion::conectar()->prepare("INSERT INTO $tabla(id_asesor, evento, color_evento, fecha_inicio, fecha_fin, observacion, hora) VALUES (:id_asesor, :evento, :color_evento, :fecha_inicio, :fecha_fin, :observacion, :hora)");
		$stmt->bindParam(":id_asesor",$datos["id_asesor"], PDO::PARAM_INT);
		$stmt->bindParam(":evento",$datos["evento"], PDO::PARAM_STR);
		$stmt->bindParam(":color_evento",$datos["color_evento"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_inicio",$datos["fecha_inicio"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_fin",$datos["fecha_fin"], PDO::PARAM_STR);
		$stmt->bindParam(":observacion",$datos["observacion"], PDO::PARAM_STR);
		$stmt->bindParam(":hora",$datos["hora"], PDO::PARAM_STR);
		if($stmt->execute()){
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt->close();
		$stmt=null;
	}
	
	
	#Seleccion de registro ALL notificaciones
	static public function mdlSeleccionarRegistrosNotificaciones($tabla, $item, $valor){
		if($item==null && $valor==null){
			$stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla");
			$stmt->execute();
			return $stmt->fetchAll();
		}else{
			$stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item and estado = 0");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetchAll();
		}

		$stmt->close();
		$stmt=null;
	}
	
	#ACTUALIZAR notificaciones
		static public function mdlActualizarNotificaciones($tabla, $datos){
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET estado=:estado WHERE id=:id");
		$stmt->bindParam(":id",$datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":estado",$datos["estado"], PDO::PARAM_INT);
		if($stmt->execute()){
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt->close();
		$stmt=null;
	}
	
		#REGISTRO notificaciones
	static public function mdlRegistroNotificacion($tabla, $datos){
		$stmt=Conexion::conectar()->prepare("INSERT INTO $tabla(id_asesor, mensaje) VALUES (:id_asesor, :mensaje)");
		$stmt->bindParam(":id_asesor",$datos["id_asesor"], PDO::PARAM_INT);
		$stmt->bindParam(":mensaje",$datos["mensaje"], PDO::PARAM_STR);
		if($stmt->execute()){
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt->close();
		$stmt=null;
	}
	
	#Seleccion de filtro doble
	static public function mdlSeleccionarRegistrosFiltroDoble($tabla, $item, $valor, $item2, $valor2){
		if($item==null && $valor==null){
			$stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla");
			$stmt->execute();
			return $stmt->fetchAll();
		}else{
			$stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item and $item2 = :$item2 ORDER BY id DESC");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt->bindParam(":".$item2, $valor2, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetchAll();
		}

		$stmt->close();
		$stmt=null;
	}

	#REGISTRO gastos
	static public function mdlRegistroGastos($tabla, $datos){
		$stmt=Conexion::conectar()->prepare("INSERT INTO $tabla(titulo, descripcion, precio, forma_de_pago, id_asesor, u_negocioGastadora, estado, observacioncompra, documento) VALUES (:titulo, :descripcion, :precio, :forma_de_pago, :id_asesor, :u_negocioGastadora, :estado, :observacioncompra, :documento)");
		$stmt->bindParam(":titulo",$datos["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion",$datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":precio",$datos["precio"], PDO::PARAM_INT);
		$stmt->bindParam(":forma_de_pago",$datos["forma_de_pago"], PDO::PARAM_STR);
		$stmt->bindParam(":observacioncompra",$datos["observacioncompra"], PDO::PARAM_STR);
		$stmt->bindParam(":documento",$datos["documento"], PDO::PARAM_STR);
		$stmt->bindParam(":id_asesor",$datos["id_asesor"], PDO::PARAM_INT);
		$stmt->bindParam(":u_negocioGastadora",$datos["u_negocioGastadora"], PDO::PARAM_INT);
		$stmt->bindParam(":estado",$datos["estado"], PDO::PARAM_INT);
		if($stmt->execute()){
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt->close();
		$stmt=null;
	}


	#trakeo gastos
		static public function mdlTrackeoGastos($tabla, $datos, $item, $valor){
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET estado=:estado, observacion=:observacion, $item=:$item WHERE id=:id");
		$stmt->bindParam(":id",$datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":estado",$datos["estado"], PDO::PARAM_INT);
		$stmt->bindParam(":observacion",$datos["observacion"], PDO::PARAM_STR);
		$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
		if($stmt->execute()){
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt->close();
		$stmt=null;
	}
	#trakeo gastos final con archivo ultimo
		static public function mdlTrackeoGastosarchivo($tabla, $datos, $item, $valor){
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET documento2=:documento2, estado=:estado, observacion=:observacion, $item=:$item WHERE id=:id");
		$stmt->bindParam(":id",$datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":estado",$datos["estado"], PDO::PARAM_INT);
		$stmt->bindParam(":observacion",$datos["observacion"], PDO::PARAM_STR);
		$stmt->bindParam(":documento2",$datos["documento2"], PDO::PARAM_STR);
		$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
		if($stmt->execute()){
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt->close();
		$stmt=null;
	}

	#trakeo gastos
		static public function mdlTrackeoGastos2($tabla, $datos, $item, $valor, $item2, $valor2){
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET estado=:estado, observacion=:observacion, $item=:$item, $item2=:$item2 WHERE id=:id");
		$stmt->bindParam(":id",$datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":estado",$datos["estado"], PDO::PARAM_INT);
		$stmt->bindParam(":observacion",$datos["observacion"], PDO::PARAM_STR);
		$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt->bindParam(":".$item2, $valor2, PDO::PARAM_STR);
		if($stmt->execute()){
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt->close();
		$stmt=null;
	}
	
	#REGISTRO cc gastos
	static public function mdlRegistroccGasto($tabla, $datos){
		$stmt=Conexion::conectar()->prepare("INSERT INTO $tabla(titulo, fechaDdinero, gasto, id_u_negocio) VALUES (:titulo, :fechaDdinero, :gasto, :id_u_negocio)");
		$stmt->bindParam(":titulo",$datos["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaDdinero",$datos["fechaDdinero"], PDO::PARAM_STR);
		$stmt->bindParam(":gasto",$datos["gasto"], PDO::PARAM_INT);
		$stmt->bindParam(":id_u_negocio",$datos["id_u_negocio"], PDO::PARAM_INT);
		if($stmt->execute()){
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt->close();
		$stmt=null;
	}
	
	#REGISTRO info extra cliente
	static public function mdlRegistroInfoEcliente($tabla, $datos){
		$stmt=Conexion::conectar()->prepare("INSERT INTO $tabla(id_cliente, vehiculo, propiedad, hijos, viaja, casado, campo, empresa) VALUES (:id_cliente, :vehiculo, :propiedad, :hijos, :viaja, :casado, :campo, :empresa)");
		$stmt->bindParam(":id_cliente",$datos["id_cliente"], PDO::PARAM_INT);
		$stmt->bindParam(":vehiculo",$datos["vehiculo"], PDO::PARAM_INT);
		$stmt->bindParam(":propiedad",$datos["propiedad"], PDO::PARAM_INT);
		$stmt->bindParam(":hijos",$datos["hijos"], PDO::PARAM_INT);
		$stmt->bindParam(":viaja",$datos["viaja"], PDO::PARAM_INT);
		$stmt->bindParam(":casado",$datos["casado"], PDO::PARAM_INT);
		$stmt->bindParam(":campo",$datos["campo"], PDO::PARAM_INT);
		$stmt->bindParam(":empresa",$datos["empresa"], PDO::PARAM_INT);
		if($stmt->execute()){
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt->close();
		$stmt=null;
	}
    
    
    
    #ACTUALIZAR INFO CLIENTE
		static public function mdlActualizarInfoCliente($tabla, $datos){
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET id_cliente=:id_cliente, vehiculo=:vehiculo, propiedad=:propiedad, hijos=:hijos, viaja=:viaja, casado=:casado, campo=:campo, empresa=:empresa WHERE id=:id");
		$stmt->bindParam(":id_cliente",$datos["id_cliente"], PDO::PARAM_INT);
		$stmt->bindParam(":vehiculo",$datos["vehiculo"], PDO::PARAM_INT);
		$stmt->bindParam(":propiedad",$datos["propiedad"], PDO::PARAM_INT);
		$stmt->bindParam(":hijos",$datos["hijos"], PDO::PARAM_INT);
		$stmt->bindParam(":viaja",$datos["viaja"], PDO::PARAM_INT);
		$stmt->bindParam(":casado",$datos["casado"], PDO::PARAM_INT);
		$stmt->bindParam(":campo",$datos["campo"], PDO::PARAM_INT);
		$stmt->bindParam(":empresa",$datos["empresa"], PDO::PARAM_INT);
		$stmt->bindParam(":id",$datos["id"], PDO::PARAM_INT);
		if($stmt->execute()){
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt->close();
		$stmt=null;
	}
	
	
	#REGISTRO backoffice turismo
	static public function mdlRegistroBackofficeturismo($tabla, $datos){
		$stmt=Conexion::conectar()->prepare("INSERT INTO $tabla(id_cliente, referencia, formadepago, operador, montofinal, cuota, senaproveedor, totalproveedor, fechaviaje, fechacompra, propuesta, destino, mtefectivo, mttransferencia, mtchecke, mttcredito, mtdbancario, mtfoperador, mtfagencia, datosacompanante) VALUES (:id_cliente, :referencia, :formadepago, :operador, :montofinal, :cuota, :senaproveedor, :totalproveedor, :fechaviaje, :fechacompra, :propuesta, :destino, :mtefectivo, :mttransferencia, :mtchecke, :mttcredito, :mtdbancario, :mtfoperador, :mtfagencia,:datosacompanante)");
		$stmt->bindParam(":id_cliente",$datos["id_cliente"], PDO::PARAM_INT);
		$stmt->bindParam(":referencia",$datos["referencia"], PDO::PARAM_INT);
		$stmt->bindParam(":formadepago",$datos["formadepago"], PDO::PARAM_STR);
		$stmt->bindParam(":operador",$datos["operador"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaviaje",$datos["fechaviaje"], PDO::PARAM_STR);
		$stmt->bindParam(":montofinal",$datos["montofinal"], PDO::PARAM_INT);
		$stmt->bindParam(":cuota",$datos["cuota"], PDO::PARAM_INT);
		$stmt->bindParam(":senaproveedor",$datos["senaproveedor"], PDO::PARAM_INT);
        $stmt->bindParam(":totalproveedor",$datos["totalproveedor"], PDO::PARAM_INT);
        $stmt->bindParam(":fechacompra",$datos["fechacompra"], PDO::PARAM_STR);
         $stmt->bindParam(":datosacompanante",$datos["datosacompanante"], PDO::PARAM_STR);
        $stmt->bindParam(":propuesta",$datos["propuesta"], PDO::PARAM_STR);
        $stmt->bindParam(":destino",$datos["destino"], PDO::PARAM_STR);
        $stmt->bindParam(":mtefectivo",$datos["mtefectivo"], PDO::PARAM_INT);
        $stmt->bindParam(":mttransferencia",$datos["mttransferencia"], PDO::PARAM_INT);
        $stmt->bindParam(":mtchecke",$datos["mtchecke"], PDO::PARAM_INT);
        $stmt->bindParam(":mttcredito",$datos["mttcredito"], PDO::PARAM_INT);
        $stmt->bindParam(":mtdbancario",$datos["mtdbancario"], PDO::PARAM_INT);
        $stmt->bindParam(":mtfoperador",$datos["mtfoperador"], PDO::PARAM_INT);
        $stmt->bindParam(":mtfagencia",$datos["mtfagencia"], PDO::PARAM_INT);
        
		if($stmt->execute()){
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt->close();
		$stmt=null;
	}
	
	
	#ACTUALIZAR back office turismo
		static public function mdlActualizarbackOficeturismo($tabla, $datos){
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET referencia=:referencia, formadepago=:formadepago, montofinal=:montofinal, cuota=:cuota, senaproveedor=:senaproveedor, totalproveedor=:totalproveedor, datosacompanante=:datosacompanante, propuesta=:propuesta, destino=:destino, mtefectivo=:mtefectivo, mttransferencia=:mttransferencia, mtchecke=:mtchecke, mttcredito=:mttcredito, mtdbancario=:mtdbancario, mtfoperador=:mtfoperador, mtfagencia=:mtfagencia WHERE id=:id");

		$stmt->bindParam(":referencia",$datos["referencia"], PDO::PARAM_INT);
		$stmt->bindParam(":formadepago",$datos["formadepago"], PDO::PARAM_STR);
		$stmt->bindParam(":montofinal",$datos["montofinal"], PDO::PARAM_INT);
		$stmt->bindParam(":cuota",$datos["cuota"], PDO::PARAM_INT);
		$stmt->bindParam(":senaproveedor",$datos["senaproveedor"], PDO::PARAM_INT);
        $stmt->bindParam(":totalproveedor",$datos["totalproveedor"], PDO::PARAM_INT);
         $stmt->bindParam(":datosacompanante",$datos["datosacompanante"], PDO::PARAM_STR);
        $stmt->bindParam(":propuesta",$datos["propuesta"], PDO::PARAM_STR);
        $stmt->bindParam(":destino",$datos["destino"], PDO::PARAM_STR);
        $stmt->bindParam(":mtefectivo",$datos["mtefectivo"], PDO::PARAM_INT);
        $stmt->bindParam(":mttransferencia",$datos["mttransferencia"], PDO::PARAM_INT);
        $stmt->bindParam(":mtchecke",$datos["mtchecke"], PDO::PARAM_INT);
        $stmt->bindParam(":mttcredito",$datos["mttcredito"], PDO::PARAM_INT);
        $stmt->bindParam(":mtdbancario",$datos["mtdbancario"], PDO::PARAM_INT);
        $stmt->bindParam(":mtfoperador",$datos["mtfoperador"], PDO::PARAM_INT);
        $stmt->bindParam(":mtfagencia",$datos["mtfagencia"], PDO::PARAM_INT);
        $stmt->bindParam(":id",$datos["id"], PDO::PARAM_INT);
		if($stmt->execute()){
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt->close();
		$stmt=null;
	}
	
	#REGISTRO cita prospecto proximo contacto
	static public function mdlRegistroCitaProspecto($tabla, $datos){
		$stmt=Conexion::conectar()->prepare("INSERT INTO $tabla(evento, color_evento, fecha_inicio, fecha_fin, id_asesor, observacion) VALUES (:evento, :color_evento, :fecha_inicio, :fecha_fin, :id_asesor, :observacion)");
		$stmt->bindParam(":evento",$datos["evento"], PDO::PARAM_STR);
		$stmt->bindParam(":color_evento",$datos["color_evento"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_inicio",$datos["fecha_inicio"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_fin",$datos["fecha_fin"], PDO::PARAM_STR);
		$stmt->bindParam(":id_asesor",$datos["id_asesor"], PDO::PARAM_INT);
		$stmt->bindParam(":observacion",$datos["observacion"], PDO::PARAM_STR);

        
		if($stmt->execute()){
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt->close();
		$stmt=null;
	}


    #ACTUALIZAR gastos
		static public function mdlActualizarGastos($tabla, $datos){
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET titulo=:titulo, descripcion=:descripcion, precio=:precio, u_negocioGastadora=:u_negocioGastadora, forma_de_pago=:forma_de_pago, observacioncompra=:observacioncompra, estado=:estado WHERE id=:id");
		$stmt->bindParam(":id",$datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":titulo",$datos["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion",$datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":precio",$datos["precio"], PDO::PARAM_INT);
		$stmt->bindParam(":estado",$datos["estado"], PDO::PARAM_INT);
		$stmt->bindParam(":u_negocioGastadora",$datos["u_negocioGastadora"], PDO::PARAM_INT);
		$stmt->bindParam(":forma_de_pago",$datos["forma_de_pago"], PDO::PARAM_STR);
		$stmt->bindParam(":observacioncompra",$datos["observacioncompra"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt->close();
		$stmt=null;
	}
	
}