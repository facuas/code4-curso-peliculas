<?php 

namespace App\Controllers\Dashboard;

use App\Models\PeliculaModel;
use App\Controllers\BaseController;

class Pelicula extends BaseController
{


    public function test($id)
    {
        echo 'test'.$id;
    }

    public function index()
    {   

        $peliculaModel=new PeliculaModel();

        echo view('dashboard/pelicula/index',[
            'peliculas'=> $peliculaModel->findAll(),
        ]);
    }    

    public function new()
    {

      echo view('dashboard/pelicula/new',[
        'pelicula' =>[
        'titulo' =>'',
        'descripcion'=>''
    ]]);
    }

    public function show($id)
    {

        $peliculaModel = new PeliculaModel();

        echo view('dashboard/pelicula/show',[
            'pelicula' =>$peliculaModel->find($id)
        ]);

    }


    public function create()
    {
        $peliculaModel= new PeliculaModel();


        if($this->validate('peliculas')){
            $peliculaModel->insert([
                'titulo'=>$this->request->getPost('titulo'),
                'descripcion'=>$this->request->getPost('descripcion')
            ]);
        }else{
            session()->setFlashdata([
                'validation' => $this->validator
            ]);

            return redirect()->back()->withInput();
        }
        
        return redirect()->to('/dashboard/pelicula')->with('mensaje','Registro creado de manera exitosa');
    }

    public function edit($id)
    {
        $peliculaModel= new PeliculaModel();

        echo view('dashboard/pelicula/edit',[
            'pelicula' =>$peliculaModel->find($id)
        ]);
    }

    
    public function update($id)
    {
        $peliculaModel= new PeliculaModel();

        if($this->validate('peliculas')){
            $peliculaModel->update($id,[
                'titulo'=>$this->request->getPost('titulo'),
                'descripcion'=>$this->request->getPost('descripcion')
            ]);
        }else{
            session()->setFlashdata([
                'validation' => $this->validator
            ]);

            return redirect()->back()->withInput();
        }

        return redirect()->back();
        //return redirect()->to('/dashboard/pelicula');
        //return redirect()->to('/dashboard/test');
        //return redirect()->route('pelicula.test');

    }


    public function delete($id){
       
        $peliculaModel = new PeliculaModel();
        $peliculaModel->delete($id);

        return redirect()->to('/dashboard/pelicula');
    }








}




