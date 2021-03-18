<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tarefa;




class TarefasController extends Controller
{

    public function __contruct()
    {
        $this->middleware('auth');
    }


    public function list()
    {
        $list = Tarefa::all();
        return view('tarefas.list', [
            'list'=>$list
        ]);
    }

    public function add()
    {
        return view('tarefas.add');
    }

    public function addAction(Request $request)
    {
        $request->validate([
            'titulo' => [ 'required', 'string' ]
        ]);

        $titulo = $request->input('titulo');

        $tarefa = new Tarefa;
        $tarefa->titulo = $titulo;
        $tarefa->save();
        return redirect()->route('tarefas.list');
    }

    public function edit($id)
    {
        $data = Tarefa::find($id);

        if($data) {
            return view('tarefas.edit', [
                'data' => $data
            ]);
        } else {
            return redirect()->route('tarefas.list');
        }
    }

    public function editAction(Request $request, $id)
    {
        if($request->filled('titulo')) {
            $titulo = $request->input('titulo');
                Tarefa::find($id)->update(['titulo'=>$titulo]);

            return redirect()->route('tarefas.list');
        } else {
            return redirect()->route('tarefas.edit', ['id'=>$id])->with('warning', 'Você não preencheu o título!');
        }
    }

    public function delete($id)
    {
        Tarefa::find($id)->delete($id);
        return redirect()->route('tarefas.list');


    }

    public function done($id)
    {

        $t = Tarefa::find($id);
        if($t){
            $t->resolvido = 1 - $t->resolvido;
            $t->save();
        }


        return redirect()->route('tarefas.list');
    }
}
