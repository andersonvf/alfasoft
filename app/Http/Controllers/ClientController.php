<?php

namespace App\Http\Controllers;

use Validator;
use Gate;
use Auth;
use Illuminate\Http\Request;
use \App\Http\Requests\ClientRequest;
use Illuminate\Support\Str;
use \App\Models\Client;
use \App\Models\User;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       // var_dump(session('todo'));

        $clients = Client::Simplepaginate(5);

        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {

        $data = $request->all();
        $data['user_id'] = Auth::User()->id;
        
        if (Client::create($data)) {
            $request->session()->flash('success', 'Cliente cadastrado com sucesso!');
        } else {
            $request->session()->flash('error', 'O Cadastro não foi realizado.');
        }

        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clients = Client::findorFail($id);
        return view('clients.show', compact('clients'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clients = Client::findorFail($id);

        $this->authorize('update-client', $clients);

        return view('clients.edit', compact('clients')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, $id)
    {        
        $clients = Client::findorFail($id);

        $clients->name = $request->input('name');
        $clients->email = $request->input('email');
   
        if ($clients->save()) {
            $request->session()->flash('success', 'Cliente atualizado com sucesso!');
        } else {
            $request->session()->flash('error', 'O Cadastro não foi atualizado.');
        }

        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $clients = Client::findorFail($id);

        $this->authorize('update-client', $clients);

        if ($clients->delete()) {
                $request->session()->flash('success', 'Cliente deletado com sucesso!');
            } else {
                $request->session()->flash('error', 'O Cadastro não foi deletado.');
            }
        
            return redirect()->route('clients.index');
    }
}
