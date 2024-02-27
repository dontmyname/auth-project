@extends('layouts.backend')
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="/admin/update_user" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Username</label>
                            <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username" name="name"
                                value="{{ Auth::user()->name }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email"
                                value="{{ Auth::user()->email }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <a class="btn btn-dark" href="/admin/">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
