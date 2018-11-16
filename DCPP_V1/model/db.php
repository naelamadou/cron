<?php
	
		function getConnexionBD(){
		$dbhost = 'localhost';
		$dbuser = 'root';
		$dbpassword = '';
		$dbname = 'samaprojet';
					try {
				$db=new PDO("mysql:host=".$dbhost.";dbname=".$dbname,$dbuser,$dbpassword,array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8',PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));
			return $db;
			} catch (Exception $e) {
				die("Erreur de connexion à la BD ".$e->getMessage());
			}
		}
