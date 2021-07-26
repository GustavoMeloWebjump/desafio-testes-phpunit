<?php
namespace Webjump262\DesafioPhpunit\Controller;

use Webjump262\DesafioPhpunit\Model\Usuario;

class LoginController {
    private array $usuariosLogados = [];


    public function auth (Usuario $usuario, $helperPassword) {
        if ($usuario->getPassword() === $helperPassword) {
            $this->usuariosLogados[] = $usuario;
        }
    }

    public function getUsuariosLogados () {
        return $this->usuariosLogados;
    }

}
