<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return Company::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      //  Company::create($request->all());

    // Crie a empresa
    $company = new Company;
    $company->fantasy = $request->fantasy;
    $company->social = $request->social;
    $company->cnpj = $request->cnpj;
    $company->type = $request->type;
    $company->responsible = $request->responsible;
    $company->opening = $request->opening;
    $company->nationality = $request->nationality;
    $company->description = $request->description;
    $company->address = $request->address;
    $company->phone = $request->phone;
    $company->website = $request->website;
    $company->save();

    // Envie os dados para a API
      // Envie os dados para a API
      $response = Http::post('http://localhost:8000/api/companies', [
        'fantasy' => 'Company fantasy',
        'social'=>'Company social' ,
        'cnpj'=>'Company cnpj',
        'type'=>'Company type',
        'responsible'=>'Company responsible',
        'opening'=>'Company date opening',
        'nationality' => 'Company nationality',
        'description'=> 'Company description',
        'address' => 'Company address',
        'phone'=> 'Company phone',
        'website' =>  'Company website',
    ]);
              
    // Verifique se a requisição HTTP foi bem-sucedida
    if ($response->successful()) {
        return response()->json(['message' => 'Dados enviados com sucesso para a API'], 200);
    } else {
        return response()->json(['message' => 'Erro ao enviar dados para a API'], $response->status());
    }
    /**
     * Display the specified resource.
     */
    }
  public function show(string $id)
    {
        return Company::findOrFail($id);
    }

   
    public function update(Request $request, string $id)
    {
        $company = Company::findOrFail($id);
        $company->update($request->all());
    }

   
    public function destroy(string $id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
    }
}
