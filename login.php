<?php
include_once('config/config.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="estilo.css">

    <script type="text/javascript">
    $(document).ready(function () {

        $('#form_login').submit(function () {

            var login_valido = login_validator();

            if (login_valido) {

                $.ajax({
                    type: "POST",
                    url: 'autenticar',
                    data: $('#form_login').serialize(),
                    cache: false,
                    success: function (obj) {
                        obj = JSON.parse(obj);
                        if (obj.msg == 'success') {
                            setTimeout("location.href='modulos'", 1);
                        } else if (obj.msg == 'error') {
                            $('div#div_senha').after('<label id="erro_senha" class="error">' + obj.retorno + '</label>');
                        }
                    },
                    error: function (obj) {
                        $.prompt(obj.retorno);
                    }
                });
                return false;
            } else {
                return false;
            }
        });
    });

	    //VALIDATOR DO LOGIN
	    function login_validator() {
	        var valido = true;
	        var login = $("#login").val();
	        var senha = $("#senha").val();

	        //LIMPA MENSAGENS DE ERRO
	        $('label#erro_login').remove();
	        $('label#erro_senha').remove();

	        //VERIFICANDO SE OS CAMPOS LOGIN E SENHA FORAM INFORMADOS
	        if (login == "") {
	            $('div#div_login').after('<label id="erro_login" class="error">O campo usuário é obrigatório.</label>');
	            valido = false;
	        }
	        if (senha == "") {
	            $('div#div_senha').after('<label id="erro_senha" class="error">O campo senha é obrigatório.</label>');
	            valido = false;
	        }
	        return valido;
	    }
	</script>
</head>
<body>
	<fieldset>
		<label>Login</label></br>
			<input type="text" placeholder="Usuário" size="50"/> </br>
		<label>Senha</label></br>
			<input type="password" placeholder="Senha" size="50"/>
	</fieldset>
	<input type="submit" value="enviar">
</body>
</html>