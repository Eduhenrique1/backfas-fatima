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
        // Obtém todas as empresas
        // $companies = DB::table('companies')->join('groups', 'companies.group_id', '=', 'groups.id')->get();

        // Retorna os dados das empresas como uma resposta JSON
       // return response()->json($companies);
       $companies = Company::all();
        return response()->json($companies);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // return response()->json([$request->all()]);
      //  Company::create($request->all());

    // Crie a empresa
    try {
    $company = new Company;
    $company->fantasy = $request->get("fantasy");
    $company->social = $request->get("social");
    $company->cnpj = $request->get("cnpj");
    $company->type = $request->get("type");
    $company->responsible = $request->get("responsible");
    $company->opening = $request->get("opening");
    $company->nationality = $request->get("nationality");
    $company->description = $request->get("description");
    $company->address = $request->get("address");
    $company->phone = $request->get("phone");
    $company->website = $request->get("website");
    $company->class = $request->get("class");
    $company->faculty = $request->get("faculty");
    $company->semester = $request->get("semester");
    $company->year = $request->get("year");
    $company->group_id = $request->get("group_id");
    $company->save();

    // Envie os dados para a API
      // Envie os dados para a API
      $response = Http::post('http://localhost:8000/api/companies', [
        'fantasy',
        'social',
        'cnpj',
        'type',
        'responsible',
        'opening' => 'required|date',
        'nationality',
        'description',
        'address',
        'phone' => 'required|int',
        'website',
         'class',
         'faculty',
         'semester',
         'year'

        
    ]);  
        } catch(\Exception $exception){
            return response()->json([$exception]);
    }
    
    

    // Verifique se a requisição HTTP foi bem-sucedida
    /*if ($response->successful()) {
        return response()->json(['message' => 'Dados enviados com sucesso para a API'], 200);
    } else {
        return response()->json(['message' => 'Erro ao enviar dados para a API'], $response->status());
    }*/
    }
  public function  show($search)
  {
      // Encontre a empresa pelo fantasy, social, CNPJ ou ID
      $company = Company::where('fantasy', $search)
                         ->orWhere('id', $search)
                         ->orWhere('social', $search)
                         ->orWhere('cnpj', $search)
                         ->orWhere('class', $search)
                        
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
          'fantasy',
          'social',
          'cnpj',
          'type',
          'responsible',
          'opening',
          'nationality',
          'description',
          'address',
          'phone' => 'required|int',
          'website',
          'class',
          'faculty',
          'semester',
          'year'
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
