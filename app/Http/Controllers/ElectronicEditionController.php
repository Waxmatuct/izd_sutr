<?php
namespace App\Http\Controllers;

use App\Models\ElectronicEdition;
use Illuminate\Http\Request;

class ElectronicEditionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.catalog', [
            'items' => ElectronicEdition::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(ElectronicEdition $electronicEdition)
    {
        $item = ElectronicEdition::findOrFail($electronicEdition->id);
        // dd($item);
        return view('pages.show-edition', [
            'item' => $item,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ElectronicEdition $electronicEdition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ElectronicEdition $electronicEdition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ElectronicEdition $electronicEdition)
    {
        //
    }
}
