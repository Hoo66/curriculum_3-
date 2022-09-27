<?php
  $fruits = ["りんご" => 200, "みかん" => 100, "もも" => 400];
  $quantities = [3, 4, 2];
  $fruitNames = array_keys($fruits);

  function getTotalPrice($pricePerItem, $quantity) {
    return $pricePerItem * $quantity; 
  }
  
  for ($i = 0; $i < count($quantities); $i++) {
    $fruitName = $fruitNames[$i];
    $price = $fruits[$fruitName];
    $quantity = $quantities[$i];
    $totalPrice = getTotalPrice($price, $quantity);

    echo "${fruitName}は${totalPrice}円です";
    echo "<br>";
  }
?>