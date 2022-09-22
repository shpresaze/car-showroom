<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class CarApiController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $cars = Car::query()
            ->with('model','brand')
            ->paginate(5);

        return JsonResource::collection($cars);
    }

    public function show(Car $car): JsonResource
    {
        $car->loadMissing('model','brand');
        return JsonResource::make($car);
    }
}
