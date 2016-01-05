  
<?php
  


  	class dataBase{

  	 protected	$db;

  		function __construct()
  		{
  			try
  			{
  				$this->db = new PDO('mysql:host=localhost;dbname=opdracht-crud-cms', 'root', 'root');

  			}

  			catch(PDOException $e)
  			{
  				$_SESSEION["notifications"]["type"] = "dateBase Error";
  				$_SESSEION["notifications"]["message"] = "Failed to connect to database";
  				header("Refresh:0");
  			}
  		}

  		public function getRow($what,  $table, $where = FALSE, $whereSpec = "", $whereCheck = "")
  		{
  			$getArray = array();
  			$sqlGetter = "";
        $getStatement ="";
  			if($where)
  			{
  				$sqlGetter = "SELECT :what from :table where :whereCheck = :whereSpec";
          $getStatement = $this->db->prepare($sqlGetter);
          $getStatement->bindParam(":what", $what);
          $getStatement->bindParam(":table", $table);
          $getStatement->bindParam(":whereCheck", $whereCheck);
          $getStatement->bindParam(":whereSpec", $whereSpec);
          
  			}

  			else
  			{

  				$sqlGetter = "SELECT :what from :table";
          $getStatement = $this->db->prepare($sqlGetter);
          $getStatement->bindParam(":what", $what);
          $getStatement->bindParam(":table", $table);
  			}

  		  $succes = $getStatement->execute();

    		while($row = $getStatement->fetch(PDO::FETCH_ASSOC))
  			{
  						$getArray[] = $row;
  			}

  			return $succes;
    	}


      public function insert($table, $rows, $what)
      {
          $inserQuery = "INSERT into " . $table . "(" . $rows . ")" .  "values(" . $what . ")";
          $insertStatement = $this->db->prepare($inserQuery);
          $succes =   $insertStatement->execute();

          return $succes;
      }



	}



?>