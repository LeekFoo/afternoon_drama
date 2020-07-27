<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Data\Word5;
use App\Model\Data\Word7;

class CardController extends Controller
{
    const FIVE = 7;
    const SEVEN = 3;

    const SENRYU_FIVE = 2;
    const SENRYU_SEVEN = 1;

    public function list(Request $request) {
        $fiveCard = Word5::get();
        $sevenCard = Word7::get();

        return response([
            'fiveCard' => $fiveCard,
            'sevenCard' => $sevenCard
        ]);
    }

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

    public function sample(Request $request) {
        $fiveCard = Word5::inRandomOrder()->take(self::SENRYU_FIVE)->get();
        $sevenCard = Word7::inRandomOrder()->take(self::SENRYU_SEVEN)->get();

        return response([
            'fiveCard' => $fiveCard,
            'sevenCard' => $sevenCard
        ]);
    }

    public function redraw(Request $request) {
        $hold = $request->hold;
        $redrawCntFive = $request->redrawCountFive;
        $redrawCntSeven = $request->redrawCountSeven;

        $fiveCard = Word5::inRandomOrder()
                    ->whereNotIn('id', $hold['five'])
                    ->take($redrawCntFive)
                    ->get();

        $sevenCard = Word5::inRandomOrder()
                    ->whereNotIn('id', $hold['seven'])
                    ->take($redrawCntSeven)
                    ->get();

        return response([
            'fiveCard' => $fiveCard,
            'sevenCard' => $sevenCard
        ]);
    }
}
