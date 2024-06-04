<?php

    require_once("model/ProductsModel.php");

    $product = new ProductsModel;
    $matrizProducts = $product->getProducts();

?>