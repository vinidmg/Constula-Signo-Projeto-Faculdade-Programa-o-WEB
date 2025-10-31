<?php 
    include('assets/layouts/header.php'); 
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            
            <h1 class="text-center mb-4">Descubra Seu Signo Zodiacal</h1>
            
            <form id="signo-form" method="POST" action="show_zodiac_sign.php" class="p-4 border rounded shadow-sm">

                <div class="mb-3">
                    <label for="data_nascimento" class="form-label fs-5">Data de Nascimento</label>
                    
                    <input type="date" 
                           class="form-control" 
                           id="data_nascimento" 
                           name="data_nascimento" 
                           required 
                           aria-describedby="dateHelp">
                    
                    <div id="dateHelp" class="form-text">
                        Insira sua data de nascimento (o ano será usado para comparação de datas).
                    </div>
                </div>
                
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">Descobrir Signo</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>