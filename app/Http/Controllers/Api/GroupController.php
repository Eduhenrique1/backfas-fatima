<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // return Group::all();

       $goups = Group::all();
         return response()->json($goups);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      // Group::create($request->all());
      // cria um novo grupo
        $group = new Group;
        $group->name = $request->name;
        $group->description = $request->description;
        $group->save();

        $response = Http::post('http://localhost:8000/api/groups', [
            'name' => 'Group name',
            'description'=>'Group description' 
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

    /**
     * Display the specified resource.
     */
    public function show($search)
    {
        $group = Group::where('name',$search)
                        ->orWhere('id',$search)
                        ->first();

                         // Verifique se a empresa foi encontrada
      if (!$group) {
        return response()->json(['message' => 'Grupo não encontrada'], 404);
    }

    // Retorna os dados da empresa como uma resposta JSON
    return response()->json($group);
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $ValidatedData = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $Group = Group::findOrFail($id);
        $Group->update($ValidatedData);
        return response()->json(['message' => 'Empresa atualizada com sucesso']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Group= Group::findOrFail($id);
        $Group->delete() ;
    }
}
