<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class Usuario extends BaseController
{
    public function crear_usuario()
    {
        $usuarioModel = new UsuarioModel();
        
        $usuarioModel->insert([
            'usuario'=>'admin',
            'email'=>'admin@gmail.com',
            'contrasena'=>$usuarioModel->contrasenaHash('12345')

        ]
        );
    }

    public function probar_contrasena()
    {
        $usuarioModel = new UsuarioModel();
        echo $usuarioModel->contrasenaVerificar('12345','$2y$10$xtQPeG/VJA7I1Y8IM1VXruY0BJe/nW6rxN3blx5obmpj9BIyf0bwS');
    }

    public function login()
    {
        echo view ('web/usuario/login');
    }

    public function login_post()
    {
        $usuarioModel = new UsuarioModel();

        $email = $this->request->getPost('email');
        $contrasena = $this->request->getPost('contrasena');

        $usuario = $usuarioModel->select('id,usuario,email,contrasena,tipo')
        ->orwhere('email',$email)
        ->orwhere('usuario',$email)
        ->first();

        if(!$usuario){
            return redirect()->back()->with('mensaje','Usuario y/o contraseña invalida');
        }

        if($usuarioModel->contrasenaVerificar($contrasena,$usuario->contrasena)){
            unset($usuario->contrasena);
            session()->set('usuario',$usuario);

            return redirect()->to('/dashboard/categoria')->with('mensaje',"Bienvenido $usuario->usuario");
        }


        return redirect()->back()->with('mensaje','Usuario y/o contraseña invalida');

    }

    public function register()
    {
        echo view ('web/usuario/register');
    }

    public function register_post()
    {
        $usuarioModel = new UsuarioModel();

        if($this->validate('usuarios')){
            $usuarioModel->insert([
                'usuario'=>$this->request->getPost('usuario'),
                'email'=>$this->request->getPost('email'),
                'contrasena'=>$usuarioModel->contrasenaHash($this->request->getPost('contrasena')),
            ]);

            return redirect()->to(route_to('usuario.login'))->with('mensaje',"Registro exitoso");
        }

        session()->setFlashdata([
            'validation' => $this->validator
        ]);

        return redirect()->back()->withInput();

    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(route_to('usuario.login'));
    }

}
