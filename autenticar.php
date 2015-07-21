<?php
include_once('config/config.php');
$db = Conexao::getInsatnce();

$msg = "";

try {
	//PEGAR DADOS DE LOGIN
	$nome 	= strip_tags($_POST['login']);
	$senha 	= strip_tags($_POST['senha']);
	//SQL PARA VERIFICAR LOGIN EXISTENTE
	$result = $db->prepare("SELECT login, senha
							FROM usuario");
	$result->bindParam('login', $login);
	$result->execute();
	$num	= $result->rowCount();

	if ($num > 0) {
		//PEGA OS DADOS DO USUARIO, CASO TENHA ACESSO
		$dadosUsuario 	= $result->fetch(PDO::FETCG_ASSOC);

		//VERIFICA SE A SENHA INFORMADA É IGUAL A DO USUÁRIO
		if ($senha == $dadosUsuario['senha']){

			if ($dadosUsuario['status'] ==1) {

				$id 	= $dadosUsuario['id'];
				//CRIAR O TIMEOUT DA SESSÃO PARA EXPIRAR
				$_SESSION['timeout']	= time();
				//CRIAR AS SESSÕES DO USUÁRIO
				$_SESSION['id']			= $id;
				$_SESSION['login']		= $dadosUsuario['login'];
				//STATUS ONLINE -> 1 - ONLINE e 2 - OFFLINE
				$_SESSION['online']		= 1;
				//ATUALIZANDO O STATUS ONLINE DO USUARIO
				$result = $db->prepare("UPDATE usuario SET status = '1' WHERE id = ?");
				$result->bindValue(1, $id);
				$result->execute();

				//MENSAGEM DE SUCESSO
				$msg['id']				= $id;
				$msg['msg']				= 'sucess';
				$msg['retorno']			= 'login efetuado com sucesso.';
				echo json_enconde($msg);
				exit();
            } else {
                $msg['msg'] = 'error';
                $msg['retorno'] = 'Você não tem permissão de acesso ao sistema!';
                echo json_encode($msg);
                exit();
            }
        } else {
            $msg['msg'] = 'error';
            $msg['retorno'] = 'O usuário ou a senha inseridos estão incorretos.';
            echo json_encode($msg);
            exit();
        }
    } else {
        $msg['msg'] = 'error';
        $msg['retorno'] = 'O usuário ou a senha inseridos estão incorretos.';
        echo json_encode($msg);
        exit();
    }
} catch (PDOException $e) {
    $db->rollback();
    $msg['msg'] = 'error';
    $msg['retorno'] = "Erro ao tentar efeturar o login. :" . $e->getMessage();
    echo json_encode($msg);
    exit();
}
?>