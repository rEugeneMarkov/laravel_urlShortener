@extends('layouts.personal')

@section('content')
    <div class="container">
        <div class="col-6">
            <table class="table table-bordered border-warning">
                <tbody>
                    <tr>
                        <th scope="row">ID</th>
                        <td>{{ $link->id }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Title</th>
                        <td>{{ $link->title }}</td>
                    </tr>
                    <tr>
                        <th scope="row">URL</th>
                        <td>{{ $link->link }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Transitions</th>
                        <td>{{ $link->transitions }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Back halve</th>
                        <td>{{ $link->back_halve }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Short link</th>
                        <td><a href="{{ env('APP_URL') . '/' .  $link->back_halve }}" target="_blank">
                            {{ env('APP_URL') . '/' . $link->back_halve }}
                        </a></td>
                    </tr>
                </tbody>
            </table>
            <table>
                <tr>
                    
                    <td>
                        <a class="btn btn-success" href="{{ route('personal.link.edit', $link->id) }}" role="button">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('personal.link.destroy', $link->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
