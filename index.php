<?php

    session_start();
    include("connection.php");
    include("functions.php");

    
    $user_data = check_login($con);
    include("header.php");
?>

    <header id = "header" class = "vh-100 carousel slide" data-bs-ride = "carousel" style = "padding-top: 104px;">
        <div class = "container h-100 d-flex align-items-center carousel-inner">
            <div class = "text-center carousel-item active">
                <h2 class = "text-capitalize text-white">best collection</h2>
                <h1 class = "text-uppercase py-2 fw-bold text-white">new arrivals</h1>
                <a href = "#shop" class = "btn mt-3 text-uppercase">shop now</a>
            </div>
            <div class = "text-center carousel-item">
                <h2 class = "text-capitalize text-white">best price & offer</h2>
                <h1 class = "text-uppercase py-2 fw-bold text-white">new season</h1>
                <a href = "#shop" class = "btn mt-3 text-uppercase">buy now</a>
            </div>
        </div>

        <button class = "carousel-control-prev" type = "button" data-bs-target="#header" data-bs-slide = "prev">
            <span class = "carousel-control-prev-icon"></span>
        </button>
        <button class = "carousel-control-next" type = "button" data-bs-target="#header" data-bs-slide = "next">
            <span class = "carousel-control-next-icon"></span>
        </button>
    </header>
    <!-- end of header -->
    




    <!-- collection -->
<section id="disable">
    <section id = "shop" class = "pt-5">
        <div class = "container">
            
            <div class = "title text-center">
                <h2 class = "position-relative d-inline-block">Shop Now!</h2>
            </div>

            <div class = "row g-0">
                <div class = "d-flex flex-wrap justify-content-center mt-5 filter-button-group">
                    <button type = "button" class = "btn m-2 text-dark active-filter-btn" data-filter = "*">All</button>
                    <button type = "button" class = "btn m-2 text-dark" data-filter = ".flower">Flower Bouquet</button>
                    <button type = "button" class = "btn m-2 text-dark" data-filter = ".sunflower">Sunflower Bouquet</button>
                    <button type = "button" class = "btn m-2 text-dark" data-filter = ".chocolate">Chocolate Bouquet</button>
                    <button type = "button" class = "btn m-2 text-dark" data-filter = ".additionals">Additionals</button>
                </div>

                <div class = "collection-list mt-4 row gx-0 gy-3">
                
                    <!-- seasoning -->


                    <?php

                    $query2 = ("SELECT * FROM product ");
                    mysqli_query($con, $query2);
                    $result = mysqli_query($con, $query2) ;



                    while( $row = mysqli_fetch_array( $result ) ){

                        $id = $row['prod_ID'];
                        $category = $row['prod_category'];
                        $name = $row['prod_name'];
                        $price = $row['prod_price'];
                        $details = $row['prod_details'];
                        $user_id=$user_data["user_ID"];

                            echo "<div class = 'col-md-6 col-lg-4 col-xl-3 p-2 {$row['prod_category']}'>
                                <div class = 'collection-img position-relative'>
                                    <button class='col-btn '>
                                        <img class='rounded-5' src = 'images/products/{$row['prod_picture']}' class = 'w-100' width='300px' height='300px'>
                                    </button>
                                    
                                </div>
                                <div class = 'text-center'>
                                    
                                    <p class = 'text-capitalize mt-3 mb-1'>{$row['prod_name']}</p>
                                    <span class = 'fw-bold d-block'>₱{$row['prod_price']}.00</span>

                                    
                                    <a href='editQuantity.php?id=$id&user_id=$user_id'><button class='btn btn-primary mt-3'>Add to Cart</button></a>
                                </div>
                            </div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</section>


    


<?php

include('footer.php');

?>