@extends('users.buyer.layouts.app')

@section('title', 'FAQs - Dhamall')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">FAQs</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="card shadow-lg border-0 rounded-lg mb-3"
         style="background: linear-gradient(135deg, #1a1a2e, #0d0d1a); color: white; padding: 30px; border-radius: 15px;">
        <h1 class="text-center text-warning mb-4">Frequently Asked Questions</h1>
        <div class="accordion" id="faqAccordion">
            @foreach ($faqs as $faq)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{ $loop->index }}">
                        <button class="accordion-button bg-dark text-white" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $loop->index }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                aria-controls="collapse{{ $loop->index }}">
                            {{ $faq->Question }}
                        </button>
                    </h2>
                    <div id="collapse{{ $loop->index }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                         aria-labelledby="heading{{ $loop->index }}" data-bs-parent="#faqAccordion">
                        <div class="accordion-body bg-light text-dark">
                            {{ $faq->Answer }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
