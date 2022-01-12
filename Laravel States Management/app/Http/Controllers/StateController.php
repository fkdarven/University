<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
use App\Http\Requests\StateRequest;

class StateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $states = State::All();
        return view('states/index',['states'=>$states]);
    }
    public function create()
    {
        return view('states/new');
    }
    public function store(StateRequest $request)
    {
        $state = new State;
        $state->name = $request->input('name');
        $state->initials = $request->input('initials'); 
        $state->total_citizens = 0;
        if ($state->save()) {
            \Session::flash('status', 'Estado cadastrado com sucesso !');
            return redirect('/states');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao cadastrar o estado !');
            return view('states.new');
        }

    }
    public function edit($id)
    {
        $state = State::findOrFail($id);
        return view('states/edit', ['state' => $state]);

    }
    public function update(StateRequest $request, $id) {
        $state = State::findOrFail($id);
        $state->name = $request->input('name');
        $state->initials = $request->input('initials');
        if ($state->save()) {
            \Session::flash('status', 'Estado atualizado com sucesso !');
            return redirect('/states');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao atualizar a cidade !');
            return view('states/edit', ['state' => $state]);
        }
    }
    
    public function destroy($id)
    {
            $state = State::findOrFail($id);
            $state->delete();
            \Session::flash('status', 'Estado deletado com sucesso.');
            return redirect('/states');
    }
}
