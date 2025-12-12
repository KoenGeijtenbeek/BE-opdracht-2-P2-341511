<?php

namespace App\Http\Controllers;

use App\Models\LeverancierModel;
use Illuminate\Http\Request;

class LeverancierController extends Controller
{
    private $leverancierModel;

    public function __construct()
    {
        $this->leverancierModel = new LeverancierModel();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leveranciers = $this->leverancierModel->sp_GetAllLeveranciers();

        $data = [
            'title' => 'Leverancier overzicht',
            'leveranciers' => $leveranciers
        ];

        // Controller koppelen aan view
        return view('leverancier.index', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('leverancier.create', [
            'title' => 'Levering product'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $data = $request->validate([
            'leverancierId' => 'required',
            'productId' => 'required',
            'aantal' => 'required',
            'datumEerstvolgendeLevering' => 'required'
        ]);

        $newId = $this->leverancierModel->sp_CreateProductPerLeverancier(
            $data['leverancierId'],
            $data['productId'],
            $data['aantal'],
            $data['datumEerstvolgendeLevering']
        );

        return redirect()->route('leverancier.show') // id meegeven
            ->with('success', "Levering is succesvol toegevoegd met id: " . $newId);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = $this->leverancierModel->sp_GetLeverancierById($id);
        
        return view('leverancier.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LeverancierModel $leverancierModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LeverancierModel $leverancierModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LeverancierModel $leverancierModel)
    {
        //
    }

}
