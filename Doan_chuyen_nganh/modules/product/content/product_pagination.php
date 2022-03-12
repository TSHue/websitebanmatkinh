<nav>
    <ul class="pagination">
        <?php
            for ($i=1; $i <=$totalPage; $i++) { 
                ?>
                    <li>
                        <a href="<?php 
                            if (isset($_GET['type'])) {
                                echo "index.php?p=product&type=".$_GET['type']."&page=".$i;
                            }
                            elseif (isset($_GET['brand'])) {
                                echo "index.php?p=product&brand=".$_GET['brand']."&page=".$i;
                            }
                            elseif (isset($_GET['search'])) {
                                echo "index.php?p=product&search=".$_GET['search']."&page=".$i;
                            }
                            else {
                                echo "index.php?p=product&page=".$i;
                            }
                        ?>"><?php echo $i;?></a>
                    </li>
                <?php
            }
        ?>
    </ul>
</nav>