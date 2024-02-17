<?php if(!empty($_SESSION['cart'])): ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Product name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                </tr>
            </thead>
            <tbody>
                <?php $around = $_SESSION['cart.currency']['code'] == 'UAH' ? 0 : 2; ?>
                <?php foreach($_SESSION['cart'] as $id => $item): ?>
                <tr>
                    <td><a href="product/<?=$item['alias'];?>"><img id="cart-img" src="images/<?=$item['img'];?>" alt=""></a></td>
                    <td><a href="product/<?=$item['alias'];?>"><?=$item['title'];?></a></td>
                    <td><?=$item['qty'];?></td>
                    <td><?=$_SESSION['cart.currency']['symbol_left'].bcmul($item['price'] * $_SESSION['cart.currency']['value'],$item['qty'],$around).$_SESSION['cart.currency']['symbol_right'];?></td>
                    <td><span data-id="<?=$id;?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td>Quantity:</td>
                    <td colspan="4" class="text-right cart-qty"><?=$_SESSION['cart.qty'];?></td>
                </tr>
                <tr>
                    <td>Sum:</td>
                    <td colspan="4" class="text-right cart-sum"><?=$_SESSION['cart.currency']['symbol_left'].bcmul($_SESSION['cart.sum'], $_SESSION['cart.currency']['value'], $around).$_SESSION['cart.currency']['symbol_right'];?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php else: ?>
        <h3>Shopping cart is empty!</h3>
<?php endif; ?>