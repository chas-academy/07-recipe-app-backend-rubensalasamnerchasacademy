<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Recipe;
use App\Http\Resources\RecipeResource;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    public function index()
    {
      return RecipeResource::collection(Recipe::with('title'));
    }

    public function store(Request $request)
    {   
 

        /* if (Auth::check())
        {
            $id = Auth::user()->getId();
        }       */
       
        $recipe = Recipe::create([
            'title' => $request->title,
            'email' => $request->email,
            'img' => $request->img
        ]);

       
        return new RecipeResource($recipe);
    }

    

    public function show(Recipe $recipe)
    {

       /*  DB::table('users')
            ->where('name', '=', 'John') */
        /* $recipe = Recipe::all(); */

        /* $results = Recipe::find('recipe')->where('email', "=", $recipe); */
        /* ('S * from recipes where id = :id', ['id' => 1]);
        ("SELECT * FROM posts WHERE userid in '($user_ids)'"); */

        return RecipeResource::collection(Recipe::all());
        /* return RecipeResource::collection($results); */
        
        /*  return new RecipeResource($recipe); */
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

    public function destroy(Request $request)
    {
       /*  $result = Recipe::where('id', $request->id)
        $result->delete();
       $result = Recipe::where('id', $request->id)->delete();
       $result = Recipe::delete('id', $request->id)->delete(); */
        
        Recipe::where('id', $request->id)->delete();
        return RecipeResource::collection(Recipe::all());
        /* return response()->json(null, 204); */
    }
}
