<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Data\Word5;
use App\Model\Data\Word7;

class CardController extends Controller
{
    const FIVE = 7;
    const SEVEN = 3;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $five = $request->five;
        $five = $five ? $five : self::FIVE;

        $seven = $request->seven;
        $seven = $seven ? $seven : self::SEVEN;

        $fiveCard = Word5::inRandomOrder()->take($five)->get();
        $sevenCard = Word7::inRandomOrder()->take($seven)->get();

        return response([
            'fiveCard' => $fiveCard,
            'sevenCard' => $sevenCard
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
