{{--@extends('admin.layouts.app')--}}

@section('title', 'Manage FAQs')

@section('content')
    <div class="container mt-4">
        <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary mb-3">Add FAQ</a>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Question</th>
                <th>Answer</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($faqs as $faq)
                <tr>
                    <td>{{ $faq->id }}</td>
                    <td>{{ $faq->Question }}</td>
                    <td>{{ $faq->Answer }}</td>
                    <td>
                        <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
