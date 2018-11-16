<?php
	
	
		

		function getConnexionBD(){
		    $dbhost = 'localhost';
		$dbuser = 'naelamadou';
		$dbpassword = 'Passer@_123';
		$dbname = 'sogesegl';
					try {
				$db=new PDO("mysql:host=".$dbhost.";dbname=".$dbname,$dbuser,$dbpassword,array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8',PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));
			return $db;


			} catch (Exception $e) {
				die("Erreur de connexion à la BD ".$e->getMessage());
			}
		}
		function formatDate($date){
			if (strpos($date,'/')!==false) {
				$date = str_replace('/', '-', $date);
				$date = date('Y-m-d',strtotime($date));
			}else{
				$date= date('d-m-Y',strtotime($date));
				$date=str_replace('-','/',$date);
			}
			return $date;
		}
	