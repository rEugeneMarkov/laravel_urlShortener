@extends('layouts.personal')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('personal.link.update', $link->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group w-50">
                        <label class="mt-2">Site title</label>
                        <input type="text" class="form-control" name="title" placeholder="Site title"
                            value="{{ old('title') ? old('title') : $link->title }}">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <label class="mt-2">Link</label>
                        <input type="text" class="form-control" name="link" placeholder="Site link"
                            value="{{ old('link') ? old('link') : $link->link }}">
                        @error('link')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <input type="submit" class="btn btn-primary" value="Edit link">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
