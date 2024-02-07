@extends('layouts.landing')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('tracks.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.tracks.create_title')
            </h4>

            <form
                method="POST"
                action="{{ route('tracks.store') }}"
                enctype="multipart/form-data"
                class="mt-4"
            >
                @csrf
                @include('track.form-inputs')

                <div class="mt-4">
                    <a
                        href="{{ route('tracks.index') }}"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-return-left text-primary"></i>
                        @lang('crud.common.back')
                    </a>

                    <button type="submit" class="btn btn-primary float-right">
                        <i class="icon ion-md-save"></i>
                        Create Track
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
