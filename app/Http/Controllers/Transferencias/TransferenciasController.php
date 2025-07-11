<?php

namespace App\Http\Controllers\Transferencias;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransferenciaRequest;
use App\Http\Services\AccountServices;
use App\Models\Transferencias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransferenciasController extends Controller
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
    public function create(TransferenciaRequest $request)
    {
        return AccountServices::setTransferencia($request);
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
    public function show_toUser()
    {
        return response()->json(Transferencias::all()->where("id_user_to", Auth::id())->toArray());
    }

    /**
     * Display the specified resource.
     */
    public function show_fromUser()
    {
        return response()->json(Transferencias::all()->where("id_user_from", Auth::id())->toArray());
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
