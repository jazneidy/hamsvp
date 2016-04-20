<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Deposito\UsuarioModel; 
use Deposito\ProductoModel;

class ExampleTest extends TestCase
{

    /**
     *   Autor:jazneidy vargas silva
     *   Versión: v1.0
     *   Fecha: 17-04-2016 13:28
     *   Descripción: Prueba unitaria de ingreso a la pagina principal
     *
     * @return void
     */
    public function testInicioExample()
    {
        $this->visit('/inicio')
             ->see('Deposito la Quinta');
    }

    /**
     * Autor:jazneidy vargas silva
     *   Versión: v1.0
     *   Fecha: 17-04-2016 13:28
     *   Descripción: Prueba unitaria de logueo del sistema
     *
     * @return void
     */
    public function testLoginExample()
    {
        $this->visit('/')
             ->see('Ingrese a tu cuenta')
             ->type('admin@gmail.com','#correo')
             ->type('000000','#clave')
             ->see('Error')
             ->type('admin@gmail.com','#correo')
             ->type('000000','#clave');
    }

    

    /**
     *   Autor:jazneidy vargas silva
     *   Versión: v1.0
     *   Fecha: 17-04-2016 13:28
     *   Descripción: Prueba unitaria de registro de Usuario
     *
     * @return void
     */
    public function testRegistrarUsuario()
    {
        $this->visit('/inicio')
             ->click('Usuario')
             ->seePageIs('/Usuario')
             ->click('Crear Usuario')
             ->seePageIs('/Usuario/create')
             ->type('1075253021','#cedula')
             ->type('jazneidy','#nombres')
             ->type('vargas silva','#apellidos')
             ->type('Providencia','#direccion')
             ->type('3116439230','#telefono')
             ->type('tutierra@hotmail.es','#correo')
             ->press('Aceptar')
             ->see('Accion Procesada!');        
    }


    /**
     *    Autor:jazneidy vargas silva
     *   Versión: v1.0
     *   Fecha: 17-04-2016 13:28
     *   Descripción: Prueba unitaria de actualizacion de Usuario
     *
     * @return void
     */
    public function testActualizarUsuario()
    {

        $Usuarios= UsuarioModel::All();
        $id=0;
        foreach ($Usuarios as $Usuario) {
            // echo 'hola mundo: '.$Usuario->id;
           $id=$Usuario->id;
           break;
        }
        $url='/Usuario/'.$id.'/edit';
        // echo $url;
        $this->visit($url)
             ->type('jazneidy prueba','#nombres')
             ->press('Aceptar')
             ->see('Accion Procesada!');   
        
    }

    /**
     *    Autor:jazneidy vargas silva
     *   Versión: v1.0
     *   Fecha: 17-04-2016 13:28
     *   Descripción: Prueba unitaria de registro de Usuario
     *
     * @return void
     */
    public function testRegistrarProducto()
    {
        $this->visit('/inicio')
             ->click('Productos')
             ->seePageIs('/producto')
             ->click('Crear Producto')
             ->seePageIs('/producto/create')
             ->type('mueble','#nombre')
             ->type('mueble viejo ','#descripcion')
             ->press('Aceptar')
             ->see('Accion Procesada!');        
    }

    /**
     *   Autor:jazneidy vargas silva
     *   Versión: v1.0
     *   Fecha: 17-04-2016 13:30
     *   Descripción: Prueba unitaria de actualizacion de prducto
     *
     * @return void
     */
    public function testActualizarProducto()
    {

        $productos= ProductoModel::All();
        $id=0;
        foreach ($productos as $producto) {
            // echo 'hola mundo: '.$producto->id;
           $id=$producto->id;
           break;
        }
        $url='/producto/'.$id.'/edit';
         // echo $url;
        $this->visit($url)
             ->type('Bebida prueba','#nombre')
             ->press('Aceptar')
             ->see('Accion Procesada!');   
        
    }


    /** 
     *   Autor:jazneidy vargas silva
     *   Versión: v1.0
     *   Fecha: 17-04-2016 13:40
     *   Descripción: Prueba unitaria de registro de entra de productos
     *
     * @return void
     */
    public function testRegistrarEntrada()
    {
        $this->visit('/inventario/create')
             ->press('Aceptar')
             ->see('Accion Procesada!');        
    }   
}
