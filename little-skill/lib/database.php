<?php 

	
class database{

	public $host= db1;
	public $user= db2;
	public $pass= db_pass;
	public $db_name= db_Nm;
    public $link;
    public $error;
    //public $query;
    //public $result;
	
    public function __construct(){
    	$this->connect();
    }

   

	private function connect(){

     $this->link=new mysqli($this->host,$this->user,$this->pass,$this->db_name);//$this->link is equivalent to $conn
    
  
   if(!$this->link)
   {
   	$this->error="Connection Failed".$this->link->connect_error;
   }

	}

    public function disconn(){
    	mysqli_close($this->link);    	
    }



	public function select($query){
		$result=$this->link->query($query);  //$result=$con->query($querry);

		if($result->num_rows>0){
			//echo "sdds";
			return $result;
		}
		else
			return false;
		


	}

	public function insert($query){
		$insert=$this->link->query($query);

		if($insert){
			// header('location:index1.php');
		}
		else
            echo 'NOt inserted';

	}

	public function update($query){
		$update=$this->link->query($query);

		if($update){
			header('location:index.pgp?insert=post updated..');
		}
		else
            echo 'did not updated';

	}

	public function delete($query){
		$delete=$this->link->query($query);

		if($delete){
			header('location:index.php');
		}
		else
            echo 'Deleted successfully';

	}

}


?>