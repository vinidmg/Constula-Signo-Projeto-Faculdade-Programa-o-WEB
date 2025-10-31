<?php 
    include('assets/layouts/header.php'); 

$data_nascimento_completa = $_POST['data_nascimento'];

$signos = simplexml_load_file("signos.xml");

$signo_encontrado = null;

$dia_mes_nascimento = substr($data_nascimento_completa, 5, 5); // Resultado: MM-DD
?>

<?php

foreach ($signos->signo as $signo) {

    $data_inicio_xml = $signo->dataInicio;
    $data_fim_xml = $signo->dataFim;

    $mes_inicio = substr($data_inicio_xml, 3, 2);
    $dia_inicio = substr($data_inicio_xml, 0, 2);
    $data_inicio_comparacao = $mes_inicio . '-' . $dia_inicio; // MM-DD
    
    $mes_fim = substr($data_fim_xml, 3, 2);
    $dia_fim = substr($data_fim_xml, 0, 2);
    $data_fim_comparacao = $mes_fim . '-' . $dia_fim; // MM-DD


    if ($data_inicio_comparacao <= $data_fim_comparacao) {
        if ($dia_mes_nascimento >= $data_inicio_comparacao && $dia_mes_nascimento <= $data_fim_comparacao) {
            $signo_encontrado = $signo;
            break; 
        }
    } else {
        if ($dia_mes_nascimento >= $data_inicio_comparacao || $dia_mes_nascimento <= $data_fim_comparacao) {
            $signo_encontrado = $signo;
            break; 
        }
    }
}
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <?php if ($signo_encontrado): ?>
                
                <div class="card text-white bg-primary mb-3 shadow-lg">
                    <div class="card-header text-center h4">Seu Signo Zodiacal é:</div>
                    <div class="card-body text-center">
                        <h2 class="card-title display-4 fw-bold">
                            <?php echo $signo_encontrado->signoNome; ?>
                        </h2>
                        <p class="card-text fs-5 mt-4">
                            <?php echo $signo_encontrado->descricao; ?>
                        </p>
                    </div>
                </div>

            <?php else: ?>
                
                <div class="alert alert-danger text-center" role="alert">
                    Não foi possível encontrar um signo para a data informada (<?php echo $data_nascimento_completa; ?>). Por favor, verifique a data.
                </div>

            <?php endif; ?>
            
            <div class="text-center mt-4">
                <a href="index.php" class="btn btn-outline-secondary">
                    &larr; Voltar para a Consulta
                </a>
            </div>

        </div>
    </div>
</div>

</body>
</html>