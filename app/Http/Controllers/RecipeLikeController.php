<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class RecipeLikeController extends Controller
{
    public function store(Recipe $recipe): RedirectResponse
    {
        $recipe->likes()->firstOrCreate([
            'user_id' => Auth::id(),
        ]);

        return back();
    }

    public function destroy(Recipe $recipe): RedirectResponse
    {
        $recipe->likes()
            ->where('user_id', Auth::id())
            ->delete();

        return back();
    }
}
