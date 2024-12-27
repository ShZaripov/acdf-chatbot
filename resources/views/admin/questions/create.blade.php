@extends('admin.layout.main')
@section('title')
    Yangi savol qo'shish
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
                <h3>Yangi savol qo'shish</h3>
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
                            <div class="card-content">
                                <div class="card-body">
                                    @if ($errors->any())
                                        <div>
                                            <ul class="p-0">
                                                @foreach ($errors->all() as $error)
                                                    <div class="alert alert-danger alert-dismissible show fade p-3">
                                                        <li class="ms-3">{{ $error }}</li>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                                aria-label="Close"></button>
                                                    </div>

                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form class="form" data-parsley-validate method="POST"
                                        action="{{ route('questions.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mandatory">
                                                    <label for="question-uz" class="form-label">Savol(UZ)</label>
                                                    <input type="text" id="question-uz" class="form-control"
                                                        placeholder="Savol(UZ)" name="question_uz"
                                                        data-parsley-required="true" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mandatory">
                                                    <label for="question-ru" class="form-label">Savol(RU)</label>
                                                    <input type="text" id="question-ru" class="form-control"
                                                        placeholder="Savol(RU)" name="question_ru"
                                                        data-parsley-required="true" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-3">
                                                    <label for="images_uz" class="form-label">Skrinshotlar(UZ)</label>
                                                    <input class="form-control" type="file" name="images_uz[]"
                                                        id="images_uz" multiple data-parsley-required="true" />
                                                </div>
                                                <div class="col-12">
                                                    <div class="uploaded-images">
                                                        <div class="row"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="mb-3">
                                                    <label for="images_ru" class="form-label">Skrinshotlar(RU)</label>
                                                    <input class="form-control" type="file" name="images_ru[]"
                                                        id="images_ru" multiple data-parsley-required="true" />
                                                </div>
                                                <div class="col-12">
                                                    <div class="uploaded-images-ru">
                                                        <div class="row"></div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">
                                                    Qo'shish
                                                </button>
                                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                                    Tozalash
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    @endsection
    @section('custom-scripts')
        <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/extensions/parsleyjs/parsley.min.js') }}"></script>
        <script src="{{ asset('assets/js/pages/parsley.js') }}"></script>
        <script>
            const imagesInput = document.getElementById('images_uz');
            const uploadedImagesContainer = document.querySelector('.uploaded-images .row');

            imagesInput.addEventListener('change', () => {
                uploadedImagesContainer.innerHTML = ''; // Clear previous images
                const files = imagesInput.files;
                for (let i = 0; i < files.length; i++) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        let img = document.createElement('img');
                        img.src = e.target.result;
                        img.classList.add('col-md-4', 'col-12', 'mb-3');
                        uploadedImagesContainer.appendChild(img);
                    }
                    reader.readAsDataURL(files[i]);
                }
            });
        </script>
        <script>
            const ruImagesInput = document.getElementById('images_ru');
            const uploadedRuImagesContainer = document.querySelector('.uploaded-images-ru .row');

            ruImagesInput.addEventListener('change', () => {
                uploadedRuImagesContainer.innerHTML = ''; // Clear previous images
                const files = ruImagesInput.files;
                for (let i = 0; i < files.length; i++) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        let img = document.createElement('img');
                        img.src = e.target.result;
                        img.classList.add('col-md-4', 'col-12', 'mb-3');
                        uploadedRuImagesContainer.appendChild(img);
                    }
                    reader.readAsDataURL(files[i]);
                }
            });
        </script>
    @endsection
