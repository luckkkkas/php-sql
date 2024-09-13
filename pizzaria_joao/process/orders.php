<?php
    include_once ("conn.php");
    $method = $_SERVER["REQUEST_METHOD"];

if($method === "GET"){
    $pedidosQuery = $conn->query("SELECT * FROM pedidos;");
    $pedidos = $pedidosQuery->fetchAll();

    $pizzas = [];
    //MONTANDO A PIZZA;
    foreach($pedidos as $pedido){
        $pizza = [];

        //DEFINE UM ARRAY PARA A PIZZA
        $pizza["id"] = $pedido["pizza_id"];
        //RESGATANDO A PIZZA
        $pizzaQuery = $conn->prepare("SELECT * FROM pizzas WHERE id = :pizza_id;" );
        $pizzaQuery->bindParam(":pizza_id", $pizza["id"]);
        $pizzaQuery->execute();
        $pizzaData = $pizzaQuery->fetch(PDO::FETCH_ASSOC);
        
        //resgatando a borda
    
        $bordaQuery = $conn->prepare("SELECT * FROM bordas WHERE id = :borda_id;" );
        $bordaQuery->bindParam(":borda_id", $pizzaData["borda_id"]);
        $bordaQuery->execute();
        $borda = $bordaQuery->fetch(PDO::FETCH_ASSOC);
        $pizza["borda"] = $borda["tipo"];

        //resgatando a massa
        $massaQuery = $conn->prepare("SELECT * FROM massas WHERE id = :massa_id;" );
        $massaQuery->bindParam(":massa_id", $pizzaData["massa_id"]);
        $massaQuery->execute();
        $massa = $massaQuery->fetch(PDO::FETCH_ASSOC);
        $pizza["massa"] = $massa["tipo"];
        
        //resgatando os saboress
        $saboresQuery = $conn->prepare("SELECT * FROM pizza_sabor WHERE pizzas_id = :pizza_id;");
        $saboresQuery->bindParam(":pizza_id", $pizza["id"]);
        $saboresQuery->execute();
        $sabores = $saboresQuery->fetchAll(PDO::FETCH_ASSOC);
        
        // resgatando o nome dos sabores
        $saboresDaPizza=[];
        $saborQuery = $conn->prepare("SELECT * FROM sabores WHERE id = :sabor_id;");
        foreach($sabores as $sabor){
            $saborQuery->bindParam(":sabor_id",$sabor["sabores_id"]);
            $saborQuery->execute();
            $saborPizza = $saborQuery->fetch(PDO::FETCH_ASSOC);
            array_push($saboresDaPizza, $saborPizza["nome"]);
            }
            $pizza["sabores"] = $saboresDaPizza;
            //status do pedido
            $pizza["status"] = $pedido["status_id"];
            //adicionar o array de pizza, ao array das pizzas
            array_push($pizzas,$pizza);
    }
        //resgatando os status;
    $statusQuery = $conn->query("SELECT * FROM status;");
    $status = $statusQuery->fetchAll();
   

    // verifincando tipo de POST
}else if($method ==="POST"){
    $type = $_POST["type"];
    //deletar pedido
    if($type === "delete"){
        $pizzaId = $_POST["id"];
        $deleteQuery = $conn->prepare("DELETE FROM pedidos  WHERE pizza_id = :pizza_id;");
        $deleteQuery->bindParam(":pizza_id", $pizzaId, PDO::PARAM_INT);
        $deleteQuery->execute();

        $_SESSION["msg"] = "pedido removido Com sucesso!";
        $_SESSION["status"] = "success";
        
    }else if($type === "update"){
        $pizzaId = $_POST["id"];
        $statusId = $_POST["status"];
        $updateQuery = $conn->prepare("UPDATE pedidos SET status_id = :status_id where pizza_id = :pizza_id;");
        $updateQuery->bindParam(":pizza_id", $pizzaId, PDO::PARAM_INT);
        $updateQuery->bindParam(":status_id", $statusId, PDO::PARAM_INT);
        $updateQuery->execute();
        
        $_SESSION["msg"] = "pedido  {$pizzaID}  atualizado com sucesso!";
        $_SESSION["status"] = "success";
    }

    //envia novamente a dashbord
    header("Location: ../dashboard.php");

}

?>