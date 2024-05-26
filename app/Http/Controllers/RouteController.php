<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreRouteRequest;
use App\Http\Requests\UpdateRouteRequest;
use App\Models\Route;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): JsonResponse
    {
        $data = $request->all();
        foreach ($data['data'] as $key => $location) {
            $location['location_time'] = Carbon::createFromTimestamp($location['location_time'])->toDateTimeString();
            Route::create($location);
        }
        //Route::insert($data['data']);
        return response()->json([
            "message"=>"Datos insertados correctamente",
        ]);
    }

    /**s
     * Store a newly created resource in storage.
     */
    public function store(StoreRouteRequest $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Route $route): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Route $route): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRouteRequest $request, Route $route): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Route $route): RedirectResponse
    {
        //
    }
}
