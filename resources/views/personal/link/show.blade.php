@extends('layouts.personal')

@section('content')
    <div class="container">
        <div class="col-lg-6 card p-3 mx-auto">
            <div>
                <div class="d-flex flex-row align-items-start justify-content-start">
                    <div class="font-weight-bold">ID: </div>
                    <div class="ms-2">{{ $link->id }}</div>
                </div>
                <div class="d-flex flex-row align-items-start justify-content-start">
                    <div class="font-weight-bold">Title: </div>
                    <div class="ms-2">{{ $link->title }}</div>
                </div>
                <div class="d-flex flex-row align-items-start justify-content-start">
                    <div class="font-weight-bold">URL: </div>
                    <div class="ms-2">{{ $link->link }}</div>
                </div>
                <div class="d-flex flex-row align-items-start justify-content-start">
                    <div class="font-weight-bold">Transitions: </div>
                    <div class="ms-2">{{ $link->transitions }}</div>
                </div>
                <div class="d-flex flex-row align-items-start justify-content-start">
                    <div class="font-weight-bold">Back halve: </div>
                    <div class="ms-2">{{ $link->back_halve }}</div>
                </div>
                <div class="d-flex flex-row align-items-start justify-content-start mb-4">
                    <div class="font-weight-bold">Short link: </div>
                    <div class="ms-2"><a href="{{ env('APP_URL') . '/' . $link->back_halve }}" target="_blank">
                            {{ env('APP_URL') . '/' . $link->back_halve }}
                        </a></div>
                </div>
            </div>
            <div class="d-flex">
                <div>
                    <a class="btn btn-success btn-sm mr-2" href="{{ route('personal.link.edit', $link->id) }}" role="button">Edit</a>
                </div>
                <div>
                    <form action="{{ route('personal.link.destroy', $link->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
