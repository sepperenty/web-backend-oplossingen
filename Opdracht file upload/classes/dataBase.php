  
<?php
  


  	class dataBase{

  	 protected	$db;

  		function __construct()
  		{
  			try
  			{
  				$this->db = new PDO('mysql:host=localhost;dbname=opdracht_file_upload', 'root', 'root');

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
          $inserQuery = "INSERT into " . $table . "(" . $rows . ")" .  "values(" . $what . ")";
          $insertStatement = $this->db->prepare($inserQuery);
          $succes =   $insertStatement->execute();

          return $succes;
      }

      public function update($table, $value, $newValue, $secValue, $newSecValue, $tocheck, $checker)
      {
          $updateQuery = "UPDATE " . $table . "
                  SET 
                  " . $value ." = " . $newValue . "," 
                   . $secValue . "=" . $newSecValue . "
                  WHERE " . $tocheck . "=" . $checker;
        $updateStatement = $this->db->prepare($updateQuery);
         /* $updateStatement->bindParam(":table", $table);
          $updateStatement->bindParam(":value", $value);
          $updateStatement->bindParam(":newValue", $newValue);
          $updateStatement->bindParam(":secvalue", $secValue);
          $updateStatement->bindParam(":newsecvalue", $newSecValue);
          $updateStatement->bindParam(":tocheck", $tocheck);
          $updateStatement->bindParam(":checker", $checker);*/


          $succes = $updateStatement->execute();

         if($succes)
          {
            return "succes";
          }

          else
          {
            return $updateStatement;
          }

         
      }



	}



?>