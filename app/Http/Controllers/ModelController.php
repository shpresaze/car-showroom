<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ModelController extends Controller
{
    //
    public function index(): Response
    {
        $models = Model::query()->simplePaginate(5);
        return Inertia::render('Models/Index',compact('models'));
    }

    public function show(Model $model): Response
    {
        return Inertia::render('Models/Show',compact('model'));
    }

    public function create(): Response
    {
        $brands = Brand::all();
        return Inertia::render('Models/Create',compact('brands'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required',
            'brand_id' => 'required'
        ]);

        $model= new Model();
        $model->brand_id = $request->input('brand_id');
        $model->name = $request->input('name');
        $model->save();

        return redirect()->back();
    }

    public function edit(Model $model): Response
    {
        return Inertia::render('Models/Edit',compact('model'));
    }

    public function update(Model $model, Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required'
        ]);

        $model->fill($validated);
        $model->save();

        return redirect()->back();
    }

    public function destroy(Model $model): RedirectResponse
    {
        $model->delete();
        return redirect()->back();
    }
}
