@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>All Registered Items</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Item Name</th>
                    <th>Item Type</th>
                    <th>Item Condition</th>
                    <th>Description</th>
                    <th>Defects</th>
                    <th>Quantity</th>
                    <th>Images</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->itemName }}</td>
                        <td>{{ $item->itemType }}</td>
                        <td>{{ $item->itemCondition }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->defects }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>
                            @if($item->images)
                                @foreach(json_decode($item->images) as $image)
                                    <img src="{{ asset('storage/' . $image) }}" alt="Item Image" width="100">
                                @endforeach
                            @else
                                No images available
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
