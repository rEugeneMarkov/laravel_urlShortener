@extends('layouts.personal')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('personal.link.store') }}" method="POST">
                    @csrf
                    <div class="form-group w-50">
                        <label class="mb-3 mt-2">Your link</label>
                        <input type="text" class="form-control" name="link" placeholder="Your link"
                            value="{{ old('link') }}">
                        @error('link')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <input type="submit" class="btn btn-primary" value="Add Link">
                    </div>
                </form>
            </div>
            <!-- ./col -->
        </div>
    </div>
@endsection
