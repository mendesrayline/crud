<?php
    include_once "conexao.php";

    $codigo = filter_input(INPUT_GET,'codigo',FILTER_SANITIZE_SPECIAL_CHARS);
    $nome = filter_input(INPUT_GET,'nome',FILTER_SANITIZE_SPECIAL_CHARS);
    $valor = str_replace(',','.',filter_input(INPUT_GET,'valor',FILTER_SANITIZE_SPECIAL_CHARS));

   if($codigo >0){
    $sql = "UPDATE produtos SET prod_nome = '$nome',prod_valor = $valor WHERE prod_id = $codigo";
   }else{
    $sql = "INSERT INTO produtos VALUES (null,'$nome',$valor)";

   }

    $inserir = mysqli_query($link,$sql);
    if(!$inserir){
        echo "<script>
        alert('Ocorreu um erro , por favor ,tente novamente');
        window.location.href = '../index.php';
        </script>";
    }
    else{
        echo "<script>
        alert('Dados salvos com sucesso');
        window.location.href = '../index.php';
        </script>";
    }
    mysqli_close($link);
?>