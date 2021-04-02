<?php

    require_once(__DIR__.'/model/aba.php');
    require_once(__DIR__.'/model/pipay.php');
    require_once(__DIR__.'/model/wing.php');

    function sort_desc($arr1,$arr2)
    {
        return $arr2->getTotal() > $arr1->getTotal() ? true : false;
    }

    $payments = [
        new ABA('Bag',30,3),
        new PiPay('Shoes',10,2),
        new Wing('T-shirt',5,10),
        new PiPay('Shirt',4.5,5),
        new Wing('Water bottle',10,1),
        new ABA('Smart Speaker',50,1),
        new ABA('Google Assitance',250,1),
        new PiPay('Case',10,1),
    ];

    $paymentCategory = [];
    $paymentMethod = [];

    usort($payments,"sort_desc");

    function getAllPaymentData($payments)
    {
        foreach($payments as $payment){
            $items = $payment->getItems();
            $price = $payment->getPrice();
            $qty = $payment->getQty();
            $method = $payment->getPaymentMethod();
            $total = $payment->getTotal();
            echo "<tr>
                <td>$items</td>
                <td>$$price</td>
                <td>$qty</td>
                <td>$method</td>
                <td>$$total</td>
            </tr>";
            // echo "Item: $items "." Price: $$price "."Quantity: $qty"." Method: $method"."Total: $$total"."<br>";
        }
    }



    function getAllPaymentByCategory($payments,$paymentCategory){
        foreach($payments as $payment){
            $method = $payment->getPaymentMethod();
            if (!array_key_exists($method,$paymentCategory)){
                $paymentCategory["$method"] = [$payment];
            }else{
                array_push($paymentCategory["$method"],$payment);
            }
        }

        foreach ($paymentCategory as $key => $category){
            $method = $key;
            $numberofSale = count($category);
            echo "<p>   - $method: $numberofSale<p> ".'<br>';
        }
    }
?> 
<!DOCTYPE html>
<html>
    <head>

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
        <!--Title-->
        <title>Task2|E-Commerce</title>

    </head>
    <body>
        <div class="text-center"><?php echo '<h1>E-Commerce<h1>'; ?></div>
        <div class="ml-5">
            <?php
                echo '<h3>Category Sale: <h3> '.'<br>';
                getAllPaymentByCategory($payments,$paymentCategory);
            ?>
        </div>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Method</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    getAllPaymentData($payments);
                ?>
            </tbody>
        </table>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </body>
</html>