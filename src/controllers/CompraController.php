<?php

use Webjump262\DesafioPhpunit\Model\Comida;
use Webjump262\DesafioPhpunit\Model\Usuario;

class CompraController {
    public function comprar (Usuario $usuario, Comida $comida) {
        if ($usuario->getCredit() >= $comida->getPreco()) {
            $usuario->setCredit($usuario->getCredit() - $comida->getPreco());
        }
    }
}
