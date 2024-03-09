@extends('layouts.backend')
@section('main')

        <form action="/admin/update_product/{{ $product->id }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name"
                    value="{{ $product->name }}">
            </div>

            <div class="form-group">
                <label for="qty">qty:</label>
                <input type="text" class="form-control" id="qty" placeholder="Enter birth date"
                    value="{{ $product->qty }}" name="qty">
            </div>

            <div class="form-group">
                <label for="price">price:</label>
                <input type="number" class="form-control" id="price" placeholder="Enter price" name="price"
                    value="{{ $product->price }}">
            </div>

            <div class="form-group">
                <label for="photo">photo:</label>
                <input type="file" class="form-control" id="photo" placeholder="Enter photo" name="photo"
                    value="{{ $product->photo }}">
            </div>

            <div class="form-group">
                <label for="brand">brand:</label>
                <input type="text" class="form-control" id="brand" placeholder="Enter brand" name="brand"
                    value="{{ $product->brand }}">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>


        </form>

    @endsection
