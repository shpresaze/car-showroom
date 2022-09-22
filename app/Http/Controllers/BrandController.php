<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class BrandController extends Controller
{
    //
    public function index(): Response
    {
        $brands = Brand::query()->simplePaginate(5);
        return Inertia::render('Brands/Index',compact('brands'));
    }

    public function show(Brand $brand): Response
    {
        return Inertia::render('Brands/Show',compact('brand'));
    }

    public function create(): Response
    {
        return Inertia::render('Brands/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
           'name' => 'required'
        ]);

        Brand::query()->create($validated);
        return redirect()->back();
    }

    public function edit(Brand $brand): Response
    {
        return Inertia::render('Brands/Edit',compact('brand'));
    }

    public function update(Brand $brand, Request $request)
    {
        $validated = $request->validate([
            'name' => 'required'
        ]);

        $brand->fill($validated);
        $brand->save();

        return redirect()->back();
    }

    public function destroy(Brand $brand): RedirectResponse
    {
        $brand->delete();
        return redirect()->back();
    }
}
