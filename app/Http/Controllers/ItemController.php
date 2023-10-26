<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    
    public function index()
    {
        // Retrieve all items from the database
        $items = Item::all();

        return view('index', compact('items'));
    }

    public function create()
    {
        $itemTypes = Item::all(); // Replace 'ItemType' with your actual model name or data source
        $itemConditions = Item::all(); // Replace 'ItemCondition' with your actual model name or data source
        return view('create', compact('itemTypes', 'itemConditions'));
    }

    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'item_name' => 'required',
            'item_type' => 'required',
            'item_condition' => 'required',
            'description' => 'required',
            'quantity' => 'required|integer',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048', // Validate uploaded images
        ]);

        // Create a new item
        $item = new Item();
        $item->item_name = $request->input('item_name');
        $item->item_type = $request->input('item_type');
        $item->item_condition = $request->input('item_condition');
        $item->description = $request->input('description');
        $item->defects = $request->input('defects');
        $item->quantity = $request->input('quantity');

        // Handle image uploads
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('item_images', 'public');
                $imagePaths[] = $path;
            }
            $item->images = json_encode($imagePaths);
        }

        $item->save();

        return redirect()->route('items.index')->with('success', 'Item added successfully.');
    }

    // Other methods for updating and deleting items can be added here.

    // For example, an edit method for updating items:
    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        // Validation and update logic
    }

    // A method for deleting items:
    public function destroy(Item $item)
    {
        // Delete item logic
    }

   
}
