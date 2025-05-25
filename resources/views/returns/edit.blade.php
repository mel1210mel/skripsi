@extends('layouts.app')
@section('content')
<h2>Edit Retur Barang</h2>
<form method="POST" action="{{ route('returns.update', $productReturn) }}">
    @csrf @method('PUT')
    <select name="item_id" required>
        @foreach($items as $item)
            <option value="{{ $item->id }}" {{ $item->id == $productReturn->item_id ? 'selected' : '' }}>
                {{ $item->name }}
            </option>
        @endforeach
    </select>
    <input type="number" name="quantity" value="{{ $productReturn->quantity }}" required>
    <input type="text" name="reason" value="{{ $productReturn->reason }}" required>
    <input type="date" name="return_date" value="{{ $productReturn->return_date }}" required>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
