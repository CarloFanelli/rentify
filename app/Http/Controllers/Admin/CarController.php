<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Car;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.cars.index', ['cars' => Car::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::all();
        return view('admin.cars.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarRequest $request)
    {

        $val_data = $request->validated();

        if ($request->has('image')) {
            $path = Storage::put('car_images', $val_data['image']);
            $val_data['image'] = $path;
        }

        Car::create($val_data);

        return to_route('admin.cars.index')->with('message', 'car added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        $categories = Category::all();

        return view('admin.cars.show', compact('car', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        $categories = Category::all();
        return view('admin.cars.edit', compact('car', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        $val_data = $request->validated();

        if ($request->has('image')) {

            if (Storage::exists($car->image)) {
                Storage::delete($car->image);
            }
            $path = Storage::put('car_images', $request->image);
            $val_data['path'] = $path;
        }

        $car->update($val_data);

        return to_route('admin.cars.show', compact('car'))->with('message', 'car updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {

        if (Storage::exists($car->image)) {
            Storage::delete($car->image);
        }

        $car->delete();

        return to_route('admin.cars.index')->with('message', 'car deleted succesfully');
    }
}
