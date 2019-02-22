<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\Http\Resources\RecipeResource;

class RecipeController extends Controller
{
    public function index()
    {
      return RecipeResource::collection(Recipe::with('title'));
    }

    public function store(Request $request)
    {
      $recipe = Recipe::create([
        'user_id' => $request->user()->id,
        'title' => $request->title,
        'description' => $request->description,
      ]);
      
      return new RecipeResource($recipe);
    }

    public function show(Recipe $recipe)
    {
      return new RecipeResource($recipe);
    }

    public function update(Request $request, Recipe $recipe)
    {
      // check if currently authenticated user is the owner of the book
      if ($request->user()->id !== $recipe->user_id) {
        return response()->json(['error' => 'You can only edit your own recipes.'], 403);
      }

      $recipe->update($request->only(['title']));

      return new RecipeResource($recipe);
    }

    public function destroy(Recipe $recipe)
    {
      $recipe->delete();

      return response()->json(null, 204);
    }
}
