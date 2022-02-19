<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Project;
use \App\Models\Client;
use \App\Http\Requests\ProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::simplepaginate(5);

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::get();
        return view('projects.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $project = Project::create($request->all());

        if ($project) {

            $request->session()->flash('success', 'Contato cadastrado com sucesso!');
        } else {
            $request->session()->flash('error', 'O Contato não foi realizado.');
        }

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projects = Project::findorFail($id);
        return view('projects.show', compact('projects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $clients = Client::get();
        
        return view('projects.edit', compact('project', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, $id)
    {
        $project = Project::findorFail($id);

        $project->name = $request->input('name');
        $project->code = $request->input('code');
        $project->number = $request->input('number');
   
        if ($project->save()) {
            $request->session()->flash('success', 'Contato atualizado com sucesso!');
        } else {
            $request->session()->flash('error', 'O Contato não foi atualizado.');
        }

        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, Request $request)
    {
        if ($project->delete()) {
            $request->session()->flash('success', 'Contato deletado com sucesso!');
        } else {
            $request->session()->flash('error', 'O Contato não foi deletado.');
        }

        return redirect()->route('projects.index');
    }
}
