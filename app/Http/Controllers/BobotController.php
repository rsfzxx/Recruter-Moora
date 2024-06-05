<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bobot;

class BobotController extends Controller
{
    public function index()
    {
        $bobots = Bobot::all();
        return view('livewire.pages.bobot.index', compact('bobots'));
    }
}
