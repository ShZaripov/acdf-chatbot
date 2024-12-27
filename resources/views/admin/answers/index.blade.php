@extends('admin.layout.main')
@section('title')
    Javoblar
@endsection
@section('custom-styles')
    <link rel="stylesheet"
          href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/pages/datatables.css') }}"/>
    <style>
        table {
            width: 100%; /* Ensures the table takes up full width */
            table-layout: fixed; /* Forces fixed layout for the columns */
        }

        th, td {
            word-wrap: break-word; /* Handles long words to wrap correctly */
            text-align: center; /* Optional: Align text in center */
        }
    </style>
@endsection
@section('content')
    <div id="main">
        <div class="wrapper">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Javoblar</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-end align-items-center">
                                <a href="{{ route('answers.create') }}" class="btn btn-primary">
                                    <i class="bi bi-plus-lg"></i>
                                    Yangi javob qo'shish
                                </a>
                            </div>
                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                    </div>
                                @endif
                                <table class="table" id="questionsDataTable">
                                    <thead>
                                    <tr>
                                        <th>SAVOL</th>
                                        <th>JAVOB(RU)</th>
                                        <th>JAVOB(RU)</th>
                                        <th>SKRINSHOTLAR</th>
                                        <th>AMALLAR</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($answers as $answer)
                                        <tr>
                                            <td>{{ $answer->question->question }}</td>
                                            <td>{{ $answer->answer_uz }}</td>
                                            <td>{{ $answer->answer_ru }}</td>
                                            <td>
                                                <div class="row justify-content-center">
                                                    @foreach($answer->images[app()->getLocale()] ?? [] as $image)
                                                        <div class="col-md-2 mb-2">
                                                            <img src="{{ $image }}" alt="Image {{ app()->getLocale() }}"
                                                                 class="img-fluid
                                                            rounded">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ route('answers.show', $answer->id) }}"
                                                   class="btn icon btn-primary">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="{{ route('answers.edit', $answer->id) }}"
                                                   class="btn icon btn-warning">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <form action="{{ route('answers.destroy', $answer->id) }}"
                                                      method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn icon btn-danger">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        @endsection
        @section('custom-scripts')
            <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
            <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
            <script src="{{ asset('assets/js/pages/datatables.js') }}"></script>
@endsection
