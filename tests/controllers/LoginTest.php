<?php

use PHPUnit\Framework\TestCase;
use Webjump262\DesafioPhpunit\Controller\LoginController;
use Webjump262\DesafioPhpunit\Model\Comida;
use Webjump262\DesafioPhpunit\Model\Usuario;

class LoginTest extends TestCase {

    public function UsuarioProvedor () {
        $user = new Usuario('gustavo', 'gustavo@mail.com', 'gustavo', 100);

        return $user;
    }

    public function LoginProvedor () {
        $loginProvedor = new LoginController();

        return $loginProvedor;
    }

    public function CompraProvider ()  {
        $buy = new CompraController();

        return $buy;
    }

    public function ComidaProvider () {
        $comida = new Comida(10, 'Sorvete');
    }

    /**
     * @dataProvider UsuarioProvedor
     * @dataProvider LoginProvedor
     */
    public function testUsuarioLogadoComSucesso (Usuario $usuario, LoginController $loginProvedor) {
        $this->expectException(DomainException::class);
        $helperPassword = 'gustavo';
        $loginProvedor->auth($usuario, $helperPassword);

        self::assertEquals($helperPassword, $usuario->getPassword());
    }

    /**
     * @dataProvider LoginProvedor
     * @depends testUsuarioLogadoComSucesso
     */
    public function testMostreUsuariosAutenticados (LoginController $loginProvedor) {
        self::assertCount(1, $loginProvedor->getUsuariosLogados());
    }

    /**
     * @dataProvider LoginProvedor
     * @dataProvider UsuarioProvedor
     * @dataProvider CompraProvedor
     * @dataProvider ComidaProvedor
     */
    public function testRealizeUmaCompra (Usuario $usuario, LoginController $login, CompraController $compraController, Comida $comida) {
        
        $this->expectException(DomainException::class);

        $logged = false;
        
        foreach ($login->getUsuariosLogados() as $userLogado) {
            $userLogado === $usuario ? $logged = true : false;
        }

        if($logged) {
            $compraController->comprar($usuario, $comida);
        }

        self::assertEquals(90, $usuario->getCredit());
    }
}
