@extends('layouts.backend')
@section('main')
    <div class="row">

        @foreach ($products as $item)
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $item->name }}</h4>

                        <img src="{{ asset($item->photo) }}" width="fit-content" height="200px" alt="">

                        <div class="d-flex py-4">
                            <div class="preview-list w-100">
                                <div class="preview-item p-0">
                                    <div class="preview-thumbnail">
                                        <img src="http://auth.loc/assets/images/faces/face15.jpg" class="rounded-circle"
                                            alt="">
                                    </div>
                                    <div class="preview-item-content d-flex flex-grow">
                                        <div class="flex-grow">
                                            <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                                <h6 class="preview-subject">{{ $item->get_user->name }}</h6>
                                                <p class="text-muted text-small">{{ $item->qty }} шт.</p>
                                            </div>
                                            <p class="text-muted">{{ number_format($item->price, 0, '.', ' ') }} sum</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-muted">YULDUZCHALAR </p>
                        <div class="progress progress-md portfolio-progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100">Production Date:
                                {{ \Carbon\Carbon::parse($item->production_date)->format('d-m-Y') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
