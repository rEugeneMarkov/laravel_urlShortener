@extends('layouts.personal')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Link Shortener</h1>
            <a href="{{ route('personal.link.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50"></i> {{ __('personal.add.link') }}</a>
        </div>
        <!-- Content Row -->

        <div class="row">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Your Links</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered dataTable" id="dataTable" width="100%"
                                        cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                        style="width: 100%;">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    style="width: 149px;">Title</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 230px;">Link</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Office: activate to sort column ascending"
                                                    style="width: 105px;">Back halve</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Office: activate to sort column ascending"
                                                    style="width: 105px;">Short Link</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Office: activate to sort column ascending"
                                                    style="width: 105px;">Transitions</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="dataTable"
                                                    rowspan="1" colspan="3"
                                                    aria-label="Salary: activate to sort column ascending"
                                                    style="width: 88px;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th class="text-center col-sm-3" rowspan="1" colspan="1">Title</th>
                                                <th rowspan="1" colspan="1">Link</th>
                                                <th class="col-sm-1" rowspan="1" colspan="1">Back halve</th>
                                                <th class="col-sm-1" rowspan="1" colspan="1">Short Link</th>
                                                <th class="col-sm-1" rowspan="1" colspan="1">Transitions</th>
                                                <th class="text-center col-sm-1" rowspan="1" colspan="3">Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($links as $link)
                                                <tr class="odd">
                                                    <td class="sorting_1">{{ $link->title }}</td>
                                                    <td>{{ $link->link }}</td>
                                                    <td>{{ $link->back_halve }}</td>
                                                    <td>
                                                        <a href="{{ env('APP_URL') . '/' . $link->back_halve }}"
                                                            target="_blank">
                                                            {{ env('APP_URL') . '/' . $link->back_halve }}
                                                        </a>
                                                    </td>
                                                    <td>{{ $link->transitions }}</td>
                                                    <td class="text-center">

                                                        <a class="btn btn-primary btn-sm"
                                                            href="{{ route('personal.link.show', $link->id) }}"
                                                            role="button">{{ __('personal.show') }}</a>
                                                    </td>
                                                    <td class="text-center">
                                                        <a class="btn btn-success btn-sm"
                                                            href="{{ route('personal.link.edit', $link->id) }}"
                                                            role="button">{{ __('personal.edit') }}</a>
                                                    </td>
                                                    <td class="text-center">
                                                        <form action="{{ route('personal.link.destroy', $link->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm">{{ __('personal.delete') }}</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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

        </div>
    </div>
@endsection
