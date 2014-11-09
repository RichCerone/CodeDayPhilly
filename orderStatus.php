<!DOCTYPE>
<header>
    <!--Css/imports go here-->
</header>
<html>
    <body>
        <!--Title for the page-->
        <h1>Your Order Status</h1>
        <!--Load orders from database-->
        <?php
            include "./dbConnect.php";
            $items = $_POST["items"];
            $quantity = $_POST["quantity"];
            
            //Insert into database.
            $sql = "INSERT INTO ordered_items ()"
        ?>
    </body>
</html>