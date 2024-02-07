@extends('layouts.personal')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Link Shortener</h1>
            <a href="{{ route('personal.link.create') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50"></i> {{ __('personal.add.link') }}</a>
        </div>
        <!-- Content Row -->

        <div class="row px-3">
            <div class="card shadow">
                <div class="card-header p-3 ">
                    <h6 class="m-0 font-weight-bold text-primary">Your Links</h6>
                </div>
                <div class="card-body">
                    <div class="row px-0">
                        <div>
                            @foreach ($links as $link)
                                <div class="border rounded p-3 mt-2 mb-2 d-flex justify-content-md-between flex-column flex-md-row">
                                    <div class="d-flex flex-column" >
                                        <h3>{{ $link->title }}</h3>
                                        <a href="{{ env('APP_URL') . '/' . $link->back_halve }}" target="_blank">
                                            {{ env('APP_URL') . '/' . $link->back_halve }}
                                        </a>
                                        <div>
                                            <a class="link-underline link-underline-opacity-0" 
                                            href="{{ $link->link }}">{{ $link->link }}</a>
                                        </div>
                                        <div>Transitions: {{ $link->transitions }}</div>
                                    </div>
                                    <div class="d-flex flex-md-column justify-content-center flex-sm-row">
                                        <a class="btn btn-primary btn-sm mb-2 mr-2 mr-md-0"
                                            href="{{ route('personal.link.show', $link->id) }}"
                                            role="button">{{ __('personal.show') }}</a>

                                        <a class="btn btn-success btn-sm mb-2 mr-2 mr-md-0"
                                            href="{{ route('personal.link.edit', $link->id) }}"
                                            role="button">{{ __('personal.edit') }}</a>

                                        <form  action="{{ route('personal.link.destroy', $link->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-danger btn-sm w-100">{{ __('personal.delete') }}</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="align-center">
                            {{ $links->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
