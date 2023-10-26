@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Register an Item</h2>
        <form action="{{ route('items.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
    <label for="item_type">Item Type</label>
    <select name="item_type" id="item_type" class="form-control">
        @foreach($itemTypes as $type)
            <option value="{{ $type->name }}">{{ $type->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="item_condition">Item Condition</label>
    <select name="item_condition" id="item_condition" class="form-control">
        @foreach($itemConditions as $condition)
            <option value="{{ $condition->name }}">{{ $condition->name }}</option>
        @endforeach
    </select>
</div>

<!-- Other form fields (name, description, defects, quantity, and images) -->


            <!-- Other Fields (Description, Defects, Quantity) -->
            <div class="form-group">
                <label for="description">Item Description</label>
                <input type="text" name="description" id="description" class="form-control">
            </div>

            <div class="form-group">
                <label for="defects">Defects (optional)</label>
                <input type="text" name="defects" id="defects" class="form-control">
            </div>

            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control">
            </div>

            <!-- File Upload for Images -->
            <div class="form-group">
                <label for="images">Upload Images</label>
                <input type="file" name="images[]" id="images" class="form-control" multiple>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
@endsection
