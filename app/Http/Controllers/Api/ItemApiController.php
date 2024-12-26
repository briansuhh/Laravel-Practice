<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreItemRequest;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemApiController extends Controller
{
    // display all the resources
    public function index()
    {
        return response()->json(Item::all(), 200);
    }

    // create a new resource
    public function store(StoreItemRequest $request)
    {        
        $item = Item::create($request->validated());

        return response()->json([
            'success' => true,
            'data' => $item,
            'message' => 'Item created successfully',
        ], 200);
        
    }

    // display the specified resource
    public function show(string $id)
    {
        // you can use findOrFail instead of find for a better error-handling mechanism
        $item = Item::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $item,
            'message' => 'Item displayed successfully',
        ], 200);
        
    }

    // update the specified resource
    public function update(StoreItemRequest $request, string $id)
    {
        $item = Item::findOrFail($id);

        $item->update($request->validated());

        return response()->json([
            'success' => true,
            'data' => $item,
            'message' => 'Item updated successfully',
        ], 200);
        
    }

    // remove the specified resource
    public function destroy(string $id)
    {
        $item = Item::findOrFail($id);

        $item->delete();

        return response()->json([
            'success' => true,
            'data' => $item,
            'message' => 'Item deleted successfully',
        ], 200);
        
    }
}


// for improvement:
// 1. centralized error handling
//     -findOrFail instead of find to remove the manual error handling of not finding a resourcebundle_count
// 2. better resource validation
//     -put the resource validation in a different file
//     -php artisan make:request StoreItemRequest
