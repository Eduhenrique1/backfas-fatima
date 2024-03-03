<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtém todas as empresas
        $companies = Company::all();

        // Retorna os dados das empresas como uma resposta JSON
        return response()->json($companies);
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
  public function  show($search)
  {
      // Encontre a empresa pelo fantasy, social, CNPJ ou ID
      $company = Company::where('fantasy', $search)
                         ->orWhere('social', $search)
                         ->orWhere('cnpj', $search)
                         ->orWhere('id', $search)
                         ->first();
  
      // Verifique se a empresa foi encontrada
      if (!$company) {
          return response()->json(['message' => 'Empresa não encontrada'], 404);
      }
  
      // Retorna os dados da empresa como uma resposta JSON
      return response()->json($company);
  }

   
  public function update(Request $request, string $fantasy)
  {
      $validatedData = $request->validate([
          'fantasy' => 'required|string',
          'social' => 'required|string',
          'cnpj' => 'required|string',
          'type' => 'required|string',
          'responsible' => 'required|string',
          'opening' => 'required|date',
          'nationality' => 'required|string',
          'description' => 'required|string',
          'address' => 'required|string',
          'phone' => 'required|int',
          'website' => 'required|string',
      ]);
  
      // Encontre a empresa que deseja atualizar pelo campo "fantasy"
      $company = Company::where('fantasy', $fantasy)->firstOrFail();
  
      // Atualize os dados da empresa
      $company->update($validatedData);
  
      // Retorne uma resposta de sucesso
      return response()->json(['message' => 'Empresa atualizada com sucesso']);
  }
  

    public function destroy(string $id)
    {
        try{
        // Busca a empresa pelo ID
        $company = Company::findOrFail($id);

        // Exclui a empresa
        $company->delete();

        // Retorna uma resposta de sucesso
        return response()->json(['message' => 'Empresa excluída com sucesso'], 200);
    } catch (\Exception $e) {
        // Retorna uma resposta de erro se algo der errado
        return response()->json(['message' => 'Erro ao excluir empresa: ' . $e->getMessage()], 500);
    }
    }
}
