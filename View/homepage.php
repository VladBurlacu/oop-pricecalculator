<?php require 'includes/header.php'?>
<!-- this is the view, try to put only simple if's and loops here.
Anything complex should be calculated in the model -->
<section>
    <h4>Hello <?php echo $user->getName()?>,</h4>
    <h4>Testing some database data</h4>
        <?php
            $testObj = new Test();
            echo $testObj->getCustomers();
            echo $testObj->getCustomersStmt("Buddy", "Sharrock");
            echo $testObj->setCustomersStmt("Zeno", "Driesen", 8)
        ?>


    <p><a href="index.php?page=info">To info page</a></p>

    <div class="container">
        <div>Customer:</div>
            <div>
                <?php
                $customers = array();
                ?>
            </div>
        <div>Product:</div>
    </div>

</section>
<?php require 'includes/footer.php'?>