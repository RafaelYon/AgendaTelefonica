<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Request;
use App\Models\Phone;

class PhoneController extends Controller
{
    public function __construct()
    {
        $this->middleware(\App\Http\Middlewares\AuthMiddleware::class);
    }

    public function index(Request $request)
    {
        dp('PHONES!');
    }

    public function show(Request $request)
    {
        $phone = Phone::findOrFail($request->getParameter(0));

        return view('phone.show', [
            'phone' => $phone
        ]);
    }

    public function create(Request $request)
    {
        $phone = new \App\Models\Phone();

        $phone->number = $request->getParameter(0);
        dp($phone->save());
    }

    public function getAllContacts(Request $request)
    {
        $phone = Phone::new();
        $phone->whereRaw('1 = 1');

        return response(['data' => $phone->get()])->json();
    }
}