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

function productList()
{
    $file = fopen("dishes.csv", "r");
    while ($data = fgetcsv($file)) {
        $goods_list[] = $data;
    }
    fclose($file);

    echo '<form action="index.php" method="post">
    ';


    foreach ($goods_list as $arr) {


        echo '
        <input type="checkbox" name="' . $arr[0] . '"';
        if ($arr[2] == 0) {
            echo 'disabled';
        }
        echo ' id="' . $arr[0] . '" value="1" onchange="culcPrice(); enableSelection(\''.$arr[0].'\')">' . $arr[0] . ' $' . $arr[1] . '
        quantity: <select disabled name="' . $arr[0] . 'qty" id="' . $arr[0] . 'qty" onchange="culcPrice()">
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
            echo 'size: <select disabled name="' . $arr[0] . 'size" id="' . $arr[0] . 'size" onchange="culcPrice()">
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
    Customer Name: <input type="text" name="customer name" id="customer name" onchange="culcPrice()"><br>
    Paypal Email: <input type="email" name="Paypal" id="Paypal" onchange="culcPrice()"><br>
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
function culcPrice() {
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
        echo '<header>
    this is the header
    </header>
    ';
    }


    /**
     * echo the footer which is the copyright info and the links
     */
    function FooterValue()
    {
        echo '<footer>
        <div>&copy;
            <script>
                document.write(new Date().getFullYear());
            </script> copyright info </div>
        
        <div>the links
        <a href=\'../placeHolder.html\'>placeHolder</a>
        <a href=\'../placeHolder.html\'>placeHolder</a>
        <a href=\'../placeHolder.html\'>placeHolder</a>
        <a href=\'../placeHolder.html\'>placeHolder</a>

        </div>
    </footer>';
    }
}
