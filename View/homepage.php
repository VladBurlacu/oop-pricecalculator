<?php require 'includes/header.php'?>
<!-- this is the view, try to put only simple if's and loops here.
Anything complex should be calculated in the model -->
<section style="display: flex; flex-direction: row; justify-content: space-between;">
    <div>

        <h4>Testing some database data</h4>
        <?php
        /*
        $testObj = new Test();
        echo $testObj->getCustomers();
        echo $testObj->getCustomersStmt("Buddy", "Sharrock");
        echo $testObj->setCustomersStmt("Zeno", "Driesen", 8);
        */
        /*
        $customer = new Customers();
        $custumerGroup = $customer->getCustomerGroup(29);
        echo json_encode($custumerGroup);
        */


        ?>
    </div>

    <div>

        <p>Put your content here.</p>

        <form method="post">
            <label for="customers">Customer:</label>

            <select id="products" name="products">

                <?php
                foreach ($productNames as $product){
                    echo "<option value='" . $product['id'] . "'>" . $product['name']. " - $" . $product['price']."</option>";
                }
                ?>

            </select>

            <label for="products">Product:</label>

            <select id="customers" name="customers">
                <?php
                foreach ($customerNames as $customer){
                    echo "<option value='" . $customer['id'] . "'>" . $customer['firstname'] . '&nbsp;' . $customer['lastname'] . "</option>";
                }
                ?>
            </select>

            <!--<label for="amount">Amount:</label>
            <select id="amount">
                <?php
                    for ($i=1; $i <= 20; $i++){
                        echo "<option>$i</option>";
                    }
                ?>
            </select>-->
            <button type="submit" name="submit">Calculate</button>
        </form>

        <h2>
            <?php

                if (isset($POST['submit'])){
                    echo $productDetails['name'] . "<br>";
                    echo $productDetails['price'];
                }

            ?>
        </h2>

    </div>

    <div>
        <p><a href="index.php?page=info">To info page</a></p>
    </div>
</section>
<?php require 'includes/footer.php'?>