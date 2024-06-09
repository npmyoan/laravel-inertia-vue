<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PizzaController extends Controller
{
    public function index(): Response
    {
        $pizzas = Pizza::all();
        return Inertia::render('Pizzas/All', [
            'pizzas' => $pizzas,
        ]);
    }

    public function edit(Pizza $pizza)
    {
        return Inertia::render('Pizzas/Edit', [
            'pizza' => $pizza,
        ]);
    }
    public function update(Pizza $pizza, Request $request): void
    {
        $request->validate([
            'size' => 'string',
            'crust' => 'string',
            'status' => 'string',
            'toppings' => 'array',
        ]);



        $pizza->update($request->validated());

        route('pizza.index');
    }
}
