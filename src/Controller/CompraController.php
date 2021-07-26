<?php

namespace Webjump262\DesafioPhpunit\Controller;

use DomainException;
use Webjump262\DesafioPhpunit\Model\Comida;
use Webjump262\DesafioPhpunit\Model\Usuario;

class CompraController {
    public function comprar (Usuario $usuario, Comida $comida) {
        try {   
            if ($usuario->getCredit() >= $comida->getPreco()) {
                $menos = $usuario->getCredit() - $comida->getPreco();
                var_dump($menos); 
                $usuario->setCredit($menos);
            }
            else {
                throw new DomainException("Sem credito");
            }   
        } catch (DomainException $excessao) {
            throw new DomainException("Sem credito");
        }
    }
}
