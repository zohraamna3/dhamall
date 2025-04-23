@extends('users.buyer.layouts.app')

@section('title', 'Privacy Policy - Dhamall')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Privacy Policy</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="card shadow-lg border-0 rounded-lg mb-3"
         style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); color: white; padding: 30px; border-radius: 15px;">
        @if($allPolicies->count() > 0)
            <h1 class="text-center text-warning mb-4">Privacy Policy</h1>

            @foreach($allPolicies as $policy)
                <div class="mb-5">
                    <h3 class="text-warning">{{ $policy->Title }}</h3>
                    <div class="mt-2">
                        {!! $policy->Description !!}
                    </div>
                </div>

                @if(!$loop->last)
                    <hr style="border-color: rgba(255,255,255,0.1); margin: 30px 0;">
                @endif
            @endforeach
        @else
            <h1 class="text-center text-warning mb-4">Privacy Policy</h1>
            <p class="text-center">No privacy policy available at the moment.</p>
        @endif
    </div>
@endsection
