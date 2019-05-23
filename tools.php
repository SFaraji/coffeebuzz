<?php
function styleCLink()
{
    $here = $_SERVER['SCRIPT_NAME'];
    $bits = explode('/', $here);
    $filename = $bits[count($bits) - 1];
    echo "<style>nav a[href$='$filename'] { color: #fce4a8; }</style>";
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function OpenCon()
 {
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "admin";
    $db = "coffeebuzz";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
    
    return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }

// REFERENCE: 
// https://davidwalsh.name/create-html-elements-php-htmlelement-class

/* creates an html element, like in js */
class html_element
{
	/* vars */
	var $type;
	var $attributes;
	var $self_closers;
	
	/* constructor */
	function html_element($type,$self_closers = array('input','img','hr','br','meta','link'))
	{
		$this->type = strtolower($type);
		$this->self_closers = $self_closers;
	}
	
	/* get */
	function get($attribute)
	{
		return $this->attributes[$attribute];
	}
	
	/* set -- array or key,value */
	function set($attribute,$value = '')
	{
		if(!is_array($attribute))
		{
			$this->attributes[$attribute] = $value;
		}
		else
		{
			$this->attributes = array_merge($this->attributes,$attribute);
		}
	}
	
	/* remove an attribute */
	function remove($att)
	{
		if(isset($this->attributes[$att]))
		{
			unset($this->attributes[$att]);
		}
	}
	
	/* clear */
	function clear()
	{
		$this->attributes = array();
	}
	
	/* inject */
	function inject($object)
	{
		if(@get_class($object) == __class__)
		{
			$this->attributes['text'].= $object->build();
		}
	}
	
	/* build */
	function build()
	{
		//start
		$build = '<'.$this->type;
		
		//add attributes
		if(count($this->attributes))
		{
			foreach($this->attributes as $key=>$value)
			{
				if($key != 'text') { $build.= ' '.$key.'="'.$value.'"'; }
			}
		}
		
		//closing
		if(!in_array($this->type,$this->self_closers))
		{
			$build.= '>'.$this->attributes['text'].'</'.$this->type.'>';
		}
		else
		{
			$build.= ' />';
		}
		
		//return it
		return $build;
	}
	
	/* spit it out */
	function output()
	{
		echo $this->build();
	}
}

function createItem($item) {
    // name, price, instock, sizes
    $itemName = $item[0];
    $itemPrice = $item[1];
    $itemInStock = $item[2];
    $numSizes = $item[3];

    $sizes = ['Small','Medium + $0.50' ,'Large + $1.00', 'Extra Large + $2.00'];

    //$itemName = 'ESPRESSO';
    //$numSizes = 3;

    $outerDiv = new html_element('div');
    $outerDiv->set('class','col-md-3');
    $outerDiv->set('text','');

    $cardDiv = new html_element('div');
    $cardDiv->set('class', 'card');
    $cardDiv->set('text','');


    $cardBodyDiv = new html_element('div');
    $cardBodyDiv->set('class', 'card-body');
    $cardBodyDiv->set('text','');

    $title = new html_element('h4');
    $title->set('class', 'card-title');
    $title->set('text',$itemName);

    $price = new html_element('p');
    $price->set('text',"$".$itemPrice);

    $radioButtons = new html_element('div');
    $radioButtons->set('class','form-check');
    $radioButtons->set('text','');

    $buttons = array();
    $labels = array();

    for($index = 0; $index < $numSizes; $index++) {
        $buttons[$index] = new html_element('input');
        $buttons[$index]->set('class','form-check-input');
        $buttons[$index]->set('type','radio');
        $buttons[$index]->set('value',$index);
        $buttons[$index]->set('name', $itemName.'_size');
        $buttons[$index]->set('text','');
        $buttons[$index]->set('onChange','calcPrice()');

        if($index == 0) {
            $buttons[$index]->set('checked','True');
        }

        $labels[$index] = new html_element('label');
        $labels[$index]->set('class','form-check-label');
        $labels[$index]->set('text', $sizes[$index]);
    }
    
    $br = new html_element('br');
    $br->set('text','');

    for($index = 0; $index < $numSizes; $index++) {
        $radioButtons->inject($buttons[$index]);
        $radioButtons->inject($labels[$index]);
        $radioButtons->inject($br);
    }

    $numItems = new html_element('input');
    $numItems->set('type','number');
    $numItems->set('id',$itemName.'_qty');
    $numItems->set('name','points');
    $numItems->set('style','width: 30%;');
    $numItems->set('min','0');
    $numItems->set('value','0');
    $numItems->set('onChange','calcPrice()');
    $numItems->set('text','');

    $numItemsLabel = new html_element('p');
    $numItemsLabel->set('class','form-check-label');
    $numItemsLabel->set('text', 'Quantity');


    
    $cardBodyDiv->inject($title);
    $cardBodyDiv->inject($price);

    if($itemInStock == '1'){
        $cardBodyDiv->inject($radioButtons);
        $cardBodyDiv->inject($numItemsLabel);
        $cardBodyDiv->inject($numItems);
    }
    else {
        $outOfStock = new html_element('p');
        $outOfStock->set('class','form-check-label');
        $outOfStock->set('text', 'Out of Stock');
        $cardBodyDiv->inject($outOfStock);
    }
    
    
    $cardDiv->inject($cardBodyDiv);

    $outerDiv->inject($cardDiv);

    return $outerDiv;
}

function getMenu() {

    $servername = "localhost";
    $username = "root";
    $password = "admin";
    $db = "coffeebuzz";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password,$db);
    
    $sql = "SELECT * FROM menu";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            // echo "item_id: ".$row["item_id"]." - Name: ".$row["name"]." - Price ".$row["price"]." - In Stock ". $row["in_stock"]." - Sizes ".$row["sizes"]."<br>";
            $goods_list[] = [$row["name"], $row["price"], $row["in_stock"], $row["sizes"]];
        }
    } 
    else {
        echo "0 results";
    }

    $conn->close();
    return $goods_list;
}

function productList()
{


    $goods_list = getMenu();

    $container = new html_element('div');
    $container->set('class','container');
    $container->set('text','');

    $row = new html_element('div');
    $row->set('class', 'row');
    $row->set('text','');

    $br = new html_element('br');
    $br->set('text','');
    $index = 0;

    foreach ($goods_list as $arr) {
        // name, price, instock, sizes
        
        $outerDiv = createItem($arr);

        $row->inject($outerDiv);
        
        if($index == 3) {
            $container->inject($row);
            $container->inject($br);

            $row = new html_element('div');
            $row->set('class', 'row');
            $row->set('text','');
        }
        $index++;
        $index = $index % 4;
    }

    $container->inject($row);
    $container->inject($br);

    $container->output();
}


function escript()
{
    $goods_list = getMenu();
    echo '<script type="text/javascript">
        function calcPrice() {
        let price = 0;
        let e = 0;
        let qty = 0;
        let size = 0;
        let receipt = "ORDER CONFIRMED\n---------------------------------------------------------------\n";
        let details = "";
        document.getElementById("orderDetails").innerText = "";
        let sizes = ["Small","Medium + $0.50" ,"Large + $1.00", "Extra Large + $2.00"];

        ';

    //print_r($goods_list);

    foreach ($goods_list as $arr) {

        if ($arr[2] == 1) {
            echo 'e = document.getElementById("' . $arr[0] . '_qty");
            qty = e.value;
            //console.log(qty);
            ';
            if ($arr[3] > 1) {
                echo 'size = document.querySelector("input[name=\''.$arr[0].'_size\']:checked").value;';
            } else {
                echo 'size = 0;';
            }

            echo '
            //console.log("QTY = "+qty);
            //console.log("ITEM PRICE = " + parseFloat(' . $arr[1] . '));
            //console.log("SIZE = "+(size));
            
            price += (parseFloat(' . $arr[1] . ') + parseInt(size)/2.00) * qty;
            
            if(qty > 0) {
                receipt +=  "Item: '.$arr[0].' | ";
                receipt += "Price: "+parseFloat('.$arr[1].')+" | ";
                receipt += "Size: "+sizes[parseInt(size)]+" | ";
                receipt += "Qty: "+qty+"\n";

                details += "'.$arr[0].','.$arr[1].',"+size+","+qty+" | ";
            }

            ';
        }
    }
    echo 'document.getElementById("orderPrice").innerText = price;
    //console.log(price);
    if (price > 0) {
        document.getElementById("orderForm").classList.remove("hiddenMessage");

        receipt += "TOTAL: $"+price+"\n---------------------------------------------------------------\n";
        document.getElementById("receipt").innerText = receipt; 
        document.getElementById("orderDetails").innerText = details; 
    }else{
        document.getElementById("orderForm").classList.add("hiddenMessage");
        
        document.getElementById("receipt").innerText = "";

    }}

    </script>
    ';
}


class echoer
{
    function HeaderValue()
    {
        echo '
        <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="SCRUM TEAM">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        
        
        <title>coffeeBuzz</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
        <link rel="stylesheet" href="assets/css/styles.min.css">
      
      </head>
        ';
    }

    /**
     * echo the footer which is the copyright info and the links
     */
    function FooterValue()
    {
        echo '
    <div class="footer-basic">
      <footer>
        <div class="social">
          <a href="#"><i class="icon ion-social-instagram"></i></a>
          <a href="#"><i class="icon ion-social-snapchat"></i></a>
          <a href="#"><i class="icon ion-social-twitter"></i></a>
          <a href="#"><i class="icon ion-social-facebook"></i></a>
        </div>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">About Us</a></li>
          <li class="list-inline-item"><a href="#">Contact Us</a></li>
          <li class="list-inline-item"><a href="#">Terms and Conditions</a></li>
          <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
          <li class="list-inline-item"><a href="#">Careers</a></li>
        </ul>

        <p class="copyright">coffeeBuzz © 2019</p>

      </footer>
    </div>
        ';
    }
}
