<?php
    include_once("template/header.php");
    include_once("process/orders.php");
?>
   <div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>gerenciar pedidos</h2>
            </div>
            <div class="col-md-12 table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">pedido</th>
                            <th scope="col">borda</th>
                            <th scope="col">massa</th>
                            <th scope="col">sabores</th>
                            <th scope="col">status</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($pizzas as $pizza):?>
                            
                            <tr>
                                <td><?= $pizza["id"]?></td>
                                <td><?= $pizza["borda"]?></td>
                                <td><?= $pizza["massa"]?></td>
                                <td>
                                   <ul>
                                    <?php foreach($pizza["sabores"] as $sabor):?>
                                        <li><?=$sabor;?></li>
                                    <?php endforeach;?>
                                   </ul>
                                </td>
                                <td>
                                    <form action="process/orders.php" method="POST" class="form-group update-form">
                                        <input type="hidden" name="id" value="update">
                                        <input type="hidden" name="type" value="<?= $pizza["id"] ?>">
                                        <select name="status" class="form-control status-input">
                                            <?php foreach($status as $statu):?>
                                            <option value="<?= $statu['id']?>" <?php echo ($statu["id"] == $pizza["status"] ? "selected" : "" );?>>
                                                <?= $statu['tipo']?>
                                            </option>
                                            <?php endforeach;?>
                                        </select>
                                        <button type="submit" class="delete-btn">
                                            <i class="fas fa-sync"></i>
                                        </button>
                                    </form>
                                    </td>
                                <td>
                                    <form action="process/orders.php" method="POST" class="form-group update-form">
                                        <input type="hidden" name="type" value="delete" >
                                        <input type="hidden" name="id" value="<?= $pizza["id"] ?>">
                                        <button type="submit" class="delete-btn">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
   </div>
    
<?php
include_once("template/footer.php")
?>