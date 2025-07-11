<?php

namespace App\Http\Controllers\Depositos;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepositoRequest;
use App\Models\Depositos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepositosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(DepositoRequest $request)
    {
        Depositos::create([
            "id_user" => Auth::id(),
            "value" => $request->get("valor")
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return response()->json(
            Depositos::all()->where("id_user", Auth::id())
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
