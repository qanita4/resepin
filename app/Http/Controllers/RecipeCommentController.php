<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecipeCommentRequest;
use App\Models\Recipe;
use App\Models\RecipeComment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class RecipeCommentController extends Controller
{
    public function store(StoreRecipeCommentRequest $request, Recipe $recipe): RedirectResponse
    {
        $recipe->comments()->create([
            'user_id' => Auth::id(),
            'comment' => $request->validated()['comment'],
        ]);

        return back()->with('status', 'Komentar berhasil ditambahkan.');
    }

    public function destroy(Recipe $recipe, RecipeComment $comment): RedirectResponse
    {
        if ($comment->recipe_id !== $recipe->id || $comment->user_id !== Auth::id()) {
            abort(403);
        }

        $comment->delete();

        return back()->with('status', 'Komentar berhasil dihapus.');
    }
}
