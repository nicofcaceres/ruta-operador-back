<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreJourneyRequest;
use App\Models\Journey;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;

class JourneyController extends Controller
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
    public function create(Request $request): Response
    {
        $technical_id = $request->get('technical_id');
        $now = Carbon::now()->format('Y-m-d H:m:s');
        $data = [
            'technical_id' => $technical_id,
            'start_at' => $now,
        ];
        $journey = Journey::create($data);
        return response("ok",200);
    }

    public function startJourney(Request $request): JsonResponse
    {
        $technical_id = $request->get('technical_id');
        $now = Carbon::now()->format('Y-m-d H:m:s');
        $data = [
            'technical_id' => $technical_id,
            'start_at' => $now,
        ];
        $journey = Journey::create($data);

        $responseData = [
            'journey_id' => $journey->id,
            'technical_id' => $journey->technical_id,
            'start_at' => $journey->start_at,
        ];
        return response()->json($responseData);
    }

    public function endJourney(Request $request ,string $journeyId): JsonResponse
    {
        $now = Carbon::now()->format('Y-m-d H:m:s');
        $data = [
            'end_at' => $now,
        ];
        $journey = Journey::find($journeyId)->update($data);

        return response()->json([
            "message"=>"Jornada Finalizada Correctamente",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJourneyRequest $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Journey $journey): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Journey $journey): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request ,string $journeyId): Response
    {
        $journey = Journey::find($journeyId)->update($request->all());
        return response($journey,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Journey $journey): RedirectResponse
    {
        //
    }
}
