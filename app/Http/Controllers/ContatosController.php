<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contatos;

class ContatosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contatos = Contatos::all();

        return view('contatos.index', compact('contatos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contatos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome'=> ['required', 'string', 'min:5' ],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:contatos'],
            'idade'=> 'required'
            
        ]);

        $contatos = new Contatos([
            'nome' => $request->get('nome'),
            'email' => $request->get('email'),
            'idade' => $request->get('idade'),
            'genero' => $request->get('genero'),
            'nacionalidade' => $request->get('nacionalidade'),
            'cidade' => $request->get('cidade'),
        ]);
        $contatos->save();
        return redirect('/contatos')->with('sucess', 'Contato salvo!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contatos = Contatos::find($id);
        return view('contatos.edit', compact('contatos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nome'=> ['required', 'string', 'min:5' ],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:contatos'],
            'idade'=> 'required'
        ]);

        $contatos = Contatos::find($id);
        $contatos->nome = $request->get('nome');
        $contatos->email = $request->get('email');
        $contatos->idade = $request->get('idade');
        $contatos->genero = $request->get('genero');
        $contatos->nacionalidade = $request->get('nacionalidade');
        $contatos->cidade = $request->get('cidade');
        $contatos->save();

        return redirect('contatos')->with('sucess', 'Contato atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contatos = Contatos::find($id);
        $contatos->delete();

        return redirect('/contatos')->with('sucess', 'Contato excluido!');
    }
}
