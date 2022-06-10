<?php
class Product{
	private $host  = 'localhost';
    private $user  = 'root';
    private $password   = "";
    private $database  = "shiksha_db";
	private $productTable = 'course';    
	private $dbConnect = false;
    public function __construct(){
        if(!$this->dbConnect){ 
            $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            }else{
                $this->dbConnect = $conn;
            }
        }
    }
	private function getData($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$data= array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[]=$row;            
		}
		return $data;
	}
	private function getNumRows($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}	
	public function cleanString($str){
		return str_replace(' ','_',$str);
	}
	public function getCategories() {		
		$sqlQuery = "
			SELECT cat_id, cat_name
			FROM ".$this->productTable." 
			GROUP BY cat_name";
        return  $this->getData($sqlQuery);
	}
	
	// public function getBrand () {
	// 	$sql = '';
	// 	if(isset($_POST['category']) && $_POST['category']!="") {
	// 		$category = $_POST['category'];
	// 		$sql.=" WHERE cat_id IN ('".implode("','",$category)."')";
	// 	}
	// 	$sqlQuery = "
	// 		SELECT distinct course_name
	// 		FROM ".$this->productTable." 
	// 		$sql GROUP BY course_name";
    //     return  $this->getData($sqlQuery);
	// }
	public function getMaterial () {
		$sql = '';
		if(isset($_POST['brand']) && $_POST['brand']!="") {
			$brand = $_POST['brand'];
			$sql.=" WHERE course_name IN ('".implode("','",$brand)."')";
		}
		$sqlQuery = "
			SELECT distinct course_level
			FROM ".$this->productTable." 
			$sql GROUP BY course_level";
        return  $this->getData($sqlQuery);
	}
	public function getProductSize () {
		$sql = '';
		if(isset($_POST['brand']) && $_POST['brand']!="") {
			$brand = $_POST['brand'];
			$sql.=" WHERE course_name IN ('".implode("','",$brand)."')";
		}
		$sqlQuery = "
			SELECT distinct course_price
			FROM ".$this->productTable." 
			$sql GROUP BY course_price";
        return  $this->getData($sqlQuery);
	}
	public function getTotalProducts () {
		$sql= "SELECT distinct course_id FROM ".$this->productTable."  WHERE status != 0";
		if(isset($_POST['category']) && $_POST['category']!="") {
			$category = $_POST['category'];
			$sql.=" AND cat_id IN ('".implode("','",$category)."')";
		}
		// if(isset($_POST['brand']) && $_POST['brand']!="") {
		// 	$brand = $_POST['brand'];
		// 	$sql.=" AND course_name IN ('".implode("','",$brand)."')";
		// }
		if(isset($_POST['material']) && $_POST['material']!="") {
			$material = $_POST['material'];
			$sql.=" AND course_level IN ('".implode("','",$material)."')";
		}
		if(isset($_POST['size']) && $_POST['size']!="") {
			$size = $_POST['size'];
			$sql.=" AND course_price IN (".implode(',',$size).")";
		}		
		$productPerPage = 9;		
		$rowCount = $this->getNumRows($sql);
		$totalData = ceil($rowCount / $productPerPage);
		return $totalData;
	}		
	public function getProducts() {
		$productPerPage = 9;	
		$totalRecord  = strtolower(trim(str_replace("/","",$_POST['totalRecord'])));
		$start = ceil($totalRecord * $productPerPage);	
		$sql = "SELECT s.stu_name,c.* FROM course as c JOIN student as s ON c.ins_id = s.stu_id where  c.status = 1";	
		// $sql= "SELECT * FROM ".$this->productTable." WHERE status != 0";	
		if(isset($_POST['category']) && $_POST['category']!=""){			
			$sql.=" AND cat_id IN ('".implode("','",$_POST['category'])."')";
		}
		if(isset($_POST['brand']) && $_POST['brand']!=""){			
			$sql.=" AND course_name IN ('".implode("','",$_POST['brand'])."')";
		}
		if(isset($_POST['material']) && $_POST['material']!="") {			
			$sql.=" AND course_level IN ('".implode("','",$_POST['material'])."')";
		}		
		if(isset($_POST['size']) && $_POST['size']!="") {			
			$sql.=" AND course_price IN (".implode(',',$_POST['size']).")";
		}
		
		if(isset($_POST['sorting']) && $_POST['sorting']!="") {
			$sorting = implode("','",$_POST['sorting']);			
			if($sorting == 'newest' || $sorting == '') {
				$sql.=" ORDER BY course_id DESC";
			} else if($sorting == 'low') {
				$sql.=" ORDER BY course_price ASC";
			} else if($sorting == 'high') {
				$sql.=" ORDER BY course_price DESC";
			}
		} else {
			$sql.=" ORDER BY course_id DESC";
		}

		 
				
		$sql.=" LIMIT $start, $productPerPage";		
		$products = $this->getData($sql);
		$rowcount = $this->getNumRows($sql);
		$productHTML = '';
		if(isset($products) && count($products)) {			
            foreach ($products as $key => $product) {	
				$course_id = $product['course_id'];			
                $productHTML .= '<article class="col-md-4 col-sm-6">';
                $productHTML .= '<div class="thumbnail product mr-5" style="height: 370px; width: 250px;">';
                $productHTML .= '<figure>';
                $productHTML .= '<a href="course_details.php?course_id='.$course_id.'"><img style="height:200px; width: 250px;"src="'. str_replace('..','.',$product["course_img"]).'" alt="'.$product['course_name'].'" /></a>';
                $productHTML .= '</figure>';
                $productHTML .= '<div class="caption">';
                $productHTML .= '<a href="" class="product-name" style="color:#181717;"><h5>'.$product['course_name'].'</h5></a>';
                // $productHTML .= '<div class="price">$'.$product['course_price'].'</div>';
                $productHTML .= '<p>By '.$product['stu_name'].'</p>';
                // $productHTML .= '<h6>Material : '.$product['course_level'].'</h6>';
                $productHTML .= '<div class=""><h5>Price ₹<del> '.$product['course_original_price'].'</del> ₹'.$product['course_price'].'<a  class="f-right " href="course_details.php?course_id='.$course_id.'">Enroll</a></h5>';
                // $productHTML .= ' <div ><a  class="f-right" href="course_details.php?">Enroll</a></div>';
                $productHTML .= '</div>';
                $productHTML .= '<div>';
                $productHTML .= '<div style="text-align:botom; vertical-align: bottom; position:relative;">';
                $productHTML .= '<a class="float-left"  href="addtocart.php?course_id='.$course_id.'">Add to cart</a>';
                $productHTML .= '<a  class="float-right"href="addtowishlist.php?course_id='.$course_id.'">Add to wishlist</a>';

 				$productHTML .= '</div>';
				
                $productHTML .= '</div>';
				
                $productHTML .= '</div>';
                $productHTML .= '</article>';				
			}
		}
		return 	$productHTML;	
	}
	
}
?>