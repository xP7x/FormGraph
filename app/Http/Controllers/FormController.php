<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Response;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        $forms = Form::all(); //Recupera todos os formulários
        return view('forms.index',compact('forms'));    
    }

    public function store(Request $request)
    {
        //Validação das respostas
        $request->validate([
            'form_id' =>'required|exists:form,id',
            'response'=>'required',
        ]);

        //Armazenar a resposta
        Response::create($request->all());
        return redirect('/forms')->with('success','Resposta enviada com sucesso!');
    }

    public function showCharts()
    {
        $responses = Response::with('form')->get(); //Carrega as respostas com os formulários
        $data=[];

        foreach($responses as $response){
            $formId = $response->form_id;
            if (!isset($data[$formId])){
                $data[$formId]=[];
            }
            $data[$formId][] = $response->response; //Armazena as respostas
        }
        return view('charts.index',compact('data'));
    }

}
