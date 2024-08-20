<?php 

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;

use App\Models\CategoriaModel;

class Categoria extends BaseController
{

    public function index()
    {   
        session()->set('key','value');
        $cateogiraModel=new CategoriaModel();

        echo view('dashboard/categoria/index',[
            'categorias'=> $cateogiraModel->findAll(),
        ]);
    }    

    public function new()
    {
      echo view('dashboard/categoria/new',[
        'categoria' =>[
        'titulo' =>'',
    ]]);
    }

    public function show($id)
    {

       

        $categoriaModel = new CategoriaModel();

        echo view('dashboard/categoria/show',[
            'categoria' =>$categoriaModel->find($id)
        ]);

    }


    public function create()
    {
        $categoriaModel= new CategoriaModel();
        if($this->validate('categorias')){
            $categoriaModel->insert([
                'titulo'=>$this->request->getPost('titulo'),
            ]);
        }else{
            session()->setFlashdata([
                'validation' => $this->validator
            ]);

            return redirect()->back()->withInput();
        }
        
        return redirect()->to('/dashboard/categoria')->with('mensaje','Registro creado de manera exitosa');
    }

    public function edit($id)
    {
        $categoriaModel= new CategoriaModel();

        echo view('dashboard/categoria/edit',[
            'categoria' =>$categoriaModel->find($id)
        ]);
    }

    
    public function update($id)
    {
        $categoriaModel= new CategoriaModel();

        
        if($this->validate('categorias')){
            $categoriaModel->update($id,[
                'titulo'=>$this->request->getPost('titulo'),
            ]);
        }else{
            session()->setFlashdata([
                'validation' => $this->validator
            ]);

            return redirect()->back()->withInput();
        }

        return redirect()->to('/dashboard/categoria')->with('mensaje','Registro creado de manera exitosa');

    }


    public function delete($id){
       
        $categoriaModel = new CategoriaModel();
        $categoriaModel->delete($id);

        
        session()->setFlashdata('mensaje','Registro eliminado de manera exitosa');
        return redirect()->back();
        //return redirect()->to('/dashboard/pelicula')->with('mensaje','Registro gestionado de manera exitosa');
    }








}




