@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>{{ __('Mirë se erdhe') }}, {{ Auth::user()->name ?? '' }}!</p>

                    <div class="list-group">
                        <a href="{{ route('personal_info') }}" class="list-group-item list-group-item-action">
                            {{ __('Të dhënat personale') }}
                        </a>
                        <a href="{{ route('deposit') }}" class="list-group-item list-group-item-action">
                            {{ __('Bëj një depozitë') }}
                        </a>
                        <a href="{{ route('withdraw') }}" class="list-group-item list-group-item-action">
                            {{ __('Kërko tërheqje') }}
                        </a>
                        <a href="{{ route('withdraws_list') }}" class="list-group-item list-group-item-action">
                            {{ __('Historiku i tërheqjeve') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
