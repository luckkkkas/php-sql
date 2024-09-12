<?php
    include_once("template/header.php");
    include_once("process/pizza.php");
?>
<form action="process/pizza.php" method="POST" id="pizza-form">
    <div class="form-group">
           <label for="massa">massas</label>
            <select name="massa" id="massa" class="form-control">
                <option value="0">Selecione a Massa</option>
                <?php foreach($massas as $massa):?>
                    <option value="<?= $massa["id"]?>"><?= $massa["tipo"]?></option>
                <?php endforeach; ?>
            </select>
    </div>
        
    <div class="form-group">
        <label for="borda">borda</label>
        <select name="borda" id="borda" class="form-control">
            <option value="0">Selecione a borda</option>
                <?php foreach($bordas as $borda):?>
                    <option value="<?= $borda['id']?>"><?= $borda["tipo"]?></option>
                <?php endforeach;?>
        </select>
    </div>

    <div class="form-group">
         <label for="sabores">sabores (3 maximo)</label>
        <select multiple name="sabores[]" id="sabores" class="form-control">
            <?php foreach($sabores as $sabor):?>
                    <option value="<?=$sabor['id']?>"><?=$sabor["nome"]?></option>
            <?php endforeach;?>
        </select>
    </div>
    <div class="form-group ">
        <input type="submit" value="pedir!" class="btn btn-primary" />
    </div>
</form>
    
<?php
    include_once("template/footer.php")
?>