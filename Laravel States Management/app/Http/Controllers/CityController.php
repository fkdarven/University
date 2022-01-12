<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\State;
use DB;
use App\Http\Requests\CityRequest;
class CityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $cities = City::with('states')->get();
        return view('cities/index',['cities'=>$cities]);
    }
    public function create()
    {
        $states = State::pluck('name','id');
        if(State::count()>0)
        {
            return view('cities/new',['states'=>$states]);
        }
        else
        {
            \Session::flash('status','Não é possível cadastrar uma cidade sem ter ao menos um estado cadastrado antes !');
            return redirect('/cities');
        }
    }
    public function store(CityRequest $request) 
    {
        $city = new City;
        $city->name = $request->input('name');
        $city->citizens = $request->input('citizens');
        $city->state_id = $request->input('states');  
        echo $city;      
        if ($city->save()) 
        {
            \Session::flash('status', 'Cidade cadastrada com sucesso !');
            DB::select('call total_citizens_sum(?)', [$city->state_id]);
            return redirect('/cities');
        } 
        else 
        {
            \Session::flash('status', 'Ocorreu um erro ao cadastrar a cidade !');
            return view('cities/new');
        } 
        
    }
    public function edit($id)
    {
        $city = City::findOrFail($id);
        $states = State::pluck('name','id');
        return view('cities/edit', ['city' => $city],['states'=>$states]);

    }
    public function update(CityRequest $request, $id) 
    {
        $city = City::findOrFail($id);
        $city->name = $request->input('name');
        $city->citizens = $request->input('citizens');
        $city->state_id = $request->input('states');
        if ($city->save()) 
        {
            \Session::flash('status', 'Cidade atualizada com sucesso !');
            DB::select('call total_citizens_sum(?)', [$city->state_id]);
            return redirect('/cities');
        } 
        else 
        {
            \Session::flash('status', 'Ocorreu um erro ao atualizar a cidade !');
            return view('cities/edit', ['city' => $city]);
        }
    }
    
    public function destroy($id)
    {
            $city = City::findOrFail($id);
            if($city->delete())
            {
                \Session::flash('status', 'Cidade excluída com sucesso !');
                DB::select('call total_citizens_sum(?)', [$city->state_id]);
                return redirect('/cities');
            }
            else
            {
                \Session::flash('status, Ocorreu um erro ao excluir a cidade !');
                return redirect('/cities');
            }
            
            
    }
}
