<?php

require 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Webjump262\DesafioPhpunit\Controller\CompraController;
use Webjump262\DesafioPhpunit\Model\Comida;
use Webjump262\DesafioPhpunit\Model\Usuario;

class UnitarioTest extends TestCase {

    public function provedor () {
        $buy = new CompraController();
        $comida = new Comida(10, 'Sorvete');

        return [
            [
                $buy,
                $comida
            ]
        ];
    }

    /**
     * @dataProvider provedor
     */
    public function testRealizeUmaCompraSemCredito (CompraController $compraController, Comida $comida) {

        $usuario = new Usuario('Gustavo', 'gustavo@mail.com', 'gustavo', 5);

        $this->expectException(DomainException::class);
        $compraController->comprar($usuario, $comida);
    }

    /**
     * @dataProvider provedor
     */
    public function testRealizeUmaCompraComCredito(CompraController $compraController, Comida $comida) {
        $usuario = new Usuario('Gustavo', 'gustavo@mail.com', 'gustavo', 15);

        $compraController->comprar($usuario, $comida);

        self::assertEquals(5, $usuario->getCredit());
    }
}
