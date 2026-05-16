<!-- a parte do json fica dentro do index agora e retorna php não ajax/js AINDA ESTOU ADAPTANDO!!!!!!!!!!!!!!!!11! -->
    <?php    
$dados = 'contas.json'; //arquivo json onde os dados ficam
$contas = json_decode(file_get_contents($dados), true) ?? []; //decodifica para formato que array q o php usa

$acao = $_POST['acao'] ?? $_GET['acao'] ?? ''; //pode usar get ou post para acao, ou vazio

if ($acao == 'inserir') {  //se acao for inserir
    $adicionarId = empty($contas) ? 1 : max(array_keys($contas)) + 1; //se for vazio começa de 1, se tiver id adiciona mais 1
     $contas[$adicionarId] = [ //id é chave do objeto    
        "codigo"     => $_POST['codigo'],
        "favorecido"     => $_POST['favorecido'],
        "vencimento" => $_POST['vencimento'],
        "valor"    => $_POST['valor']
    ];
    file_put_contents($dados, json_encode($contas, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    header("Location: index.php?status=sucesso");
    exit;

} else if ($acao == 'atualizar') { //se acao for atualizar
    $id = $_POST['id'];  //esse retorna e continua o mesmo
    $contas[$id]['codigo']     = $_POST['codigo'];
    $contas[$id]['favorecido']     = $_POST['favorecido'];
    $contas[$id]['vencimento'] = $_POST['vencimento'];
    $contas[$id]['valor']    = $_POST['valor'];                
    file_put_contents($dados, json_encode($contas, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    header("Location: index.php?status=atualizado");
    exit;

} else if ($acao == 'excluir') { 
    $id = $_GET['id']; //recebe o id do contato que vai ser excluido
    unset($contas[$id]); //remove contato
    file_put_contents($dados, json_encode($contas, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    header("Location: index.php?status=excluido");
    exit;
}
    
    
    ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <title>Contas a pagar</title>
</head>
<body>



    
</body>
</html>

