<?php require 'includes/header.php'?>
<!-- this is the view, try to put only simple if's and loops here.
Anything complex should be calculated in the model -->
<section style="display: flex; flex-direction: row; justify-content: space-between;">
    <div>
        <h4>Hello <?php echo $user->getName()?>,</h4>
        <h4>Testing some database data</h4>
        <?php
        /*
        $testObj = new Test();
        echo $testObj->getCustomers();
        echo $testObj->getCustomersStmt("Buddy", "Sharrock");
        echo $testObj->setCustomersStmt("Zeno", "Driesen", 8);
        */

        $customers = new Customers();

        ?>
    </div>

    <div>

        <p>Put your content here.</p>

        <select id="products">
            <?php
            $products = new Products();
            echo $products->showProducts();
            ?>
        </select>

        <select id="customers">
            <?php
                $customers = new Customers();
                echo $customers->showCustomers();
            ?>
        </select>

    </div>

<<<<<<< HEAD
    <div class="container">
        <div>Customer:</div>
            <div>
                <?php
                $customers = array();
                ?>
            </div>
        <div>Product:</div>
    </div>

=======
    <div>
        <p><a href="index.php?page=info">To info page</a></p>
    </div>
>>>>>>> e15bea08a4012895e2c5f8a34792376119db75e4
</section>
<?php require 'includes/footer.php'?>