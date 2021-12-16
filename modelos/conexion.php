<?php 
class Conexion{
	static public function conectar(){
		$link =new PDO("mysql:host=localhost; dbname=crm", "root", "Dep-sistemas2021");
		$link->exec("set names utf8");
		return $link;
	}
}