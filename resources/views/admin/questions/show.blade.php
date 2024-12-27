@extends('admin.layout.main')
@section('title')
    {{ $question->question }}
@endsection
@section('content')
    <div id="main">
        <div class="wrapper">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading mb-3">
                <h3>{{ $question->question }}</h3>
                <div class="card-header d-flex justify-content-start align-items-center">
                    <a href="{{ url()->previous() }}" class="btn btn-outline-danger">
                        <i class="bi bi-arrow-left"></i>
                        Orqaga
                    </a>
                </div>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-end align-items-center">
                                <a href="{{ route('questions.edit', $question->id) }}" class="btn
                                btn-primary">O'zgartirish</a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <th scope="row" class="w-25">SAVOL(UZ)</th>
                                            <td>{{ $question->question_uz }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="w-25">SAVOL(RU)</th>
                                            <td>{{ $question->question_ru }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row my-5">
                                    <div class="col-md-12">
                                        <h2>Skrinshotlar(UZ):</h2>
                                    </div>
                                    @foreach($question->images['uz'] ?? [] as $image)
                                        <div class="col-md-3">
                                            <img src="{{ $image }}" alt="Image UZ" class="img-fluid rounded">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2>Skrinshotlar(RU):</h2>
                                    </div>
                                    @foreach($question->images['ru'] ?? [] as $image)
                                        <div class="col-md-3">
                                            <img src="{{ $image }}" alt="Image RU" class="img-fluid rounded">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
@endsection

