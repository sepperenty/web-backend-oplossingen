  
<?php
  


  	class dataBase{

  	 protected	$db;

  		function __construct()
  		{
  			try
  			{
  				$this->db = new PDO('mysql:host=localhost;dbname=mailopdracht', 'root', 'root');

  			}

  			catch(PDOException $e)
  			{
  				$_SESSEION["notifications"]["type"] = "dateBase Error";
  				$_SESSEION["notifications"]["message"] = $e->getMessage;
  				header("Refresh:0");
  			}
  		}

  		public function getRow($what,  $table, $where = FALSE, $whereSpec = "", $whereCheck = "")
  		{
  			$getArray = array();
  			$sqlGetter = "";
  			if($where)
  			{
  				$sqlGetter = "SELECT " . $what . " from " . $table . " where " . $whereCheck . " = " . $whereSpec;
  			}

  			else
  			{

  				$sqlGetter = "SELECT " . $what . " from " . $table;
  			}

  			$getStatement = $this->db->prepare($sqlGetter);
  			$getStatement->execute();

    		while($row = $getStatement->fetch(PDO::FETCH_ASSOC))
  			{
  						$getArray[] = $row;
  			}

  			return $getArray;
    	}


      public function insert($table, $rows, $what)
      {
          $inserQuery = "INSERT into :table(:row)values(:what)";
          $insertStatement = $this->db->prepare($inserQuery);
          $insertStatement->bindParam(":table", $table);
          $insertStatement->bindParam(":row", $rows);
          $insertStatement->bindParam(":what", $what);
          $succes =   $insertStatement->execute();
      
          if($succes)
          {
            return "succes";
          }
          else
          {
            return "failed";
          }
      }



	}



?>