<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CarController extends Controller
{
    //
    public function index(): Response
    {
        $cars = Car::query()->simplePaginate(5);
        return Inertia::render('Cars/Index',compact('cars'));
    }

    public function show(Car $car): Response
    {
        return Inertia::render('Cars/Show',compact('car'));
    }

    public function create(): Response
    {
        $models = Model::all();
        return Inertia::render('Cars/Create',compact('models'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'number' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'model_id' => 'required',
        ]);
        $car= new Car();
        $car->model_id = $request->input('model_id');
        $car->number = $request->input('number');
        $car->description = $request->input('description');
        $car->image = $request->input('number');
        $car->title = $request->input('title');
        $car->save();
        return redirect()->back();
    }

    public function edit(Car $car): Response
    {
        $models = Model::all();
        return Inertia::render('Cars/Edit',compact('car','models'));
    }

    public function update(Car $car, Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'number' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);

        $car->fill($validated);
        $car->save();

        return redirect()->back();
    }

    public function destroy(Car $car): RedirectResponse
    {
        $car->delete();
        return redirect()->back();
    }
}
