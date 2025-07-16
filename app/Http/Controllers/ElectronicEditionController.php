<?php
namespace App\Http\Controllers;

use App\Models\ElectronicEdition;
use App\Models\Type;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ElectronicEditionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Factory | \Illuminate\Foundation\Application  | View | Application
    {
        return view('pages.catalog', [
            'items' => ElectronicEdition::with('type')->get()->sortByDesc('id'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Factory|\Illuminate\Foundation\Application|View|Application
     * @throws AuthorizationException
     */
    public function create(): Factory | \Illuminate\Foundation\Application  | View | Application
    {
        $this->authorize('create', ElectronicEdition::class);

        return view('dashboard.electronic-edition.create', [
            'types' => Type::query()->orderBy('title')->get(),
            'years' => ['2014', '2015', '2016', '2017', '2018', '2019', '2020', '2021', '2022', '2023', '2024', '2025', '2026'],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request  $request
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request->all());
        $this->authorize('create', ElectronicEdition::class);
        ElectronicEdition::create($request->all());

        return redirect()->route('electronic-editions.create')
            ->with('success', 'Издание успешно добавлено');

    }

    /**
     * Display the specified resource.
     */
    public function show(ElectronicEdition $electronicEdition): Factory | \Illuminate\Foundation\Application  | View | Application
    {
        $item = ElectronicEdition::findOrFail($electronicEdition->id);
        // dd($item);
        return view('pages.show-edition', [
            'item' => $item,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  ElectronicEdition  $electronicEdition
     * @return Factory|\Illuminate\Foundation\Application|View|Application
     * @throws AuthorizationException
     */
    public function edit(ElectronicEdition $electronicEdition): Factory | \Illuminate\Foundation\Application  | View | Application
    {
        $this->authorize('update', $electronicEdition);

        $edition = [
            'edition' => ElectronicEdition::findOrFail($electronicEdition->id),
            'types'   => Type::all(),
            'years'   => ['2014', '2015', '2016', '2017', '2018', '2019', '2020', '2021', '2022', '2023', '2024', '2025', '2026'],
        ];

        return view('dashboard.electronic-edition.edit', $edition);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request  $request
     * @param  ElectronicEdition  $electronicEdition
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(Request $request, ElectronicEdition $electronicEdition): RedirectResponse
    {
//        dd($electronicEdition);
        $this->authorize('update', $electronicEdition);
        ElectronicEdition::find($electronicEdition->id)->update($request->all());

        return redirect()
            ->back()
            ->with('success', 'Издание успешно обновлено');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ElectronicEdition $electronicEdition)
    {
        //
    }
}
