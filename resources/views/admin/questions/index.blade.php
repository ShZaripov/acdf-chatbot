@extends('admin.layout.main')
@section('title')
    Savollar
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
            <header class="mb-3 d-flex justify-between">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Savollar</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-end align-items-center">
                                <a href="{{ route('questions.create') }}" class="btn btn-primary">
                                    <i class="bi bi-plus-lg"></i>
                                    Yangi savol qo'shish
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
                                        <th class="text-center" style="width: 30%;">SAVOL(UZ)</th>
                                        <th class="text-center" style="width: 25%;">SAVOL(RU)</th>
                                        <th class="text-center" style="width: 30%;">SKRINSHOTLAR</th>
                                        <th class="text-center" style="width: 15%;">AMALLAR</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($questions as $question)
                                        <tr>
                                            <td>{{ $question->question_uz }}</td>
                                            <td>{{ $question->question_ru }}</td>
                                            <td>
                                                <div class="row justify-content-center">
                                                    @foreach($question->images[app()->getLocale()] ?? [] as $image)
                                                        <div class="col-md-2 mb-2">
                                                            <img src="{{ $image }}" alt="Image {{ app()->getLocale() }}"
                                                                 class="img-fluid
                                                            rounded">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ route('questions.show', $question->id) }}"
                                                   class="btn icon btn-primary">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="{{ route('questions.edit', $question->id) }}"
                                                   class="btn icon btn-warning">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <form action="{{ route('questions.destroy', $question->id) }}"
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
