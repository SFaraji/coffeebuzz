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

function productList()
{
    /*
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Espresso</h4>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="espresso">
                    <label class="form-check-label">Small</label>
                    <br/>

                    <input class="form-check-input" type="radio" name="espresso">
                    <label class="form-check-label">Medium</label>
                    <br/>

                    <input class="form-check-input" type="radio" name="espresso">
                    <label class="form-check-label">Large</label>
                    <br/>
                </div>

                <label id="qty"></label>
                <a class="card-link" href="#">+</a><a class="card-link" href="#">-</a>
            </div>
        </div>
    </div>
    */
    $outerDiv = new html_element('div');
    $outerDiv->set('class','col-md-3');

    $cardDiv = new html_element('div');
    $cardDiv->set('class', 'card');

    $cardBodyDiv = new html_element('div');
    $cardBodyDiv->set('class', 'card-body');

    $title = new html_element('h4');
    $title->set('class', 'card-title');
    $title->set('text','TITLE GOES HERE');

    //$outerDiv->output();

    $file = fopen("dishes.csv", "r");
    while ($data = fgetcsv($file)) {
        $goods_list[] = $data;
    }
    fclose($file);

    echo '<form action="index.php" method="post">
    ';


    foreach ($goods_list as $arr) {
        // name, price, instock, sizes

        echo '
        <input type="checkbox" name="' . $arr[0] . '"';
        if ($arr[2] == 0) {
            echo 'disabled';
        }
        echo ' id="' . $arr[0] . '" value="1" onchange="calcPrice(); enableSelection(\''.$arr[0].'\')">' . $arr[0] . ' $' . $arr[1] . '
        quantity: <select disabled name="' . $arr[0] . 'qty" id="' . $arr[0] . 'qty" onchange="calcPrice()">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
        </select>';


        if ($arr[3] > 1) {
            echo 'size: <select disabled name="' . $arr[0] . 'size" id="' . $arr[0] . 'size" onchange="calcPrice()">
            <option value="0">large</option>
                    <option value="1">larger</option>';
            if ($arr[3] > 2) {
                echo '<option value="2">largest</option>';
            }
        } else {
            echo 'Single size';
        }
        echo '
        </select>
        ';
        if ($arr[2] == 0) {
            echo 'Sold Out!';
        }
        echo '
    <br>
    ';
    }
    echo '<p>Total :$<span id="total"></span></p>
    Customer Name: <input type="text" name="customer name" id="customer name" onchange="calcPrice()"><br>
    Paypal Email: <input type="email" name="Paypal" id="Paypal" onchange="calcPrice()"><br>
    <input disabled id="submit" type="submit" value="order">
    </form>';
}

function escript()
{
    $file = fopen("dishes.csv", "r");
    while ($data = fgetcsv($file)) {
        $goods_list[] = $data;
    }
    fclose($file);
    echo '<script type="text/javascript">
function calcPrice() {
    let price = 0;
    ';
    //print_r($goods_list);
    foreach ($goods_list as $arr) {

        if ($arr[2] == 1) {
            echo 'if (document.getElementById("' . $arr[0] . '").checked) {
            let e = document.getElementById("' . $arr[0] . 'qty");
            let qty = e.options[e.selectedIndex].value;
            
            ';
            if ($arr[3] > 1) {
                echo 'e = document.getElementById("' . $arr[0] . 'size");
                let size = e.options[e.selectedIndex].value;';
            } else {
                echo 'let size = 0;';
            }

            echo '
            price += (parseInt(' . $arr[1] . ') + parseInt(size)) * qty;
        }
        ';
        }
    }
    echo 'document.getElementById("total").innerText = price;
    if (price>0 && document.getElementById("customer name").value != "" && document.getElementById("Paypal").value != "") {
        document.getElementById("submit").removeAttribute("disabled");
    }else{
        document.getElementById("submit").setAttribute("disabled", "1");

    }}

    function enableSelection(productName) {
        let qty = document.getElementById(productName + "qty");
        let size = document.getElementById(productName + "size");
        let product = document.getElementById(productName);

        if (product.checked) {
            qty.removeAttribute("disabled");
            size.removeAttribute("disabled");
        } else {
            qty.setAttribute("disabled","1");
            size.setAttribute("disabled","1");
        }

    }
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
