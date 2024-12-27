<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <script src="{{ asset('assets/bootstrap5/js/color-modes.js') }}"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="ACDF">
    <meta name="generator" content="ACDF">
    <title>ACDF CHatbot</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="{{ asset('assets/bootstrap5/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
    <style>
        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        .bd-mode-toggle .dropdown-menu .active .bi {
            display: block !important;
        }
    </style>
    {{--    <link href="{{ asset('assets/bootstrap5/custom-styles.css') }}" rel="stylesheet">--}}
</head>
<body>
<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <symbol id="check2" viewBox="0 0 16 16">
        <path
            d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
    </symbol>
    <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
    </symbol>
    <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path
            d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
        <path
            d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
    </symbol>
    <symbol id="sun-fill" viewBox="0 0 16 16">
        <path
            d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
    </symbol>
</svg>

<div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
    <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
            id="bd-theme"
            type="button"
            aria-expanded="false"
            data-bs-toggle="dropdown"
            aria-label="Toggle theme (auto)">
        <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
            <use href="#circle-half"></use>
        </svg>
        <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
    </button>
    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
        <li>
            <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light"
                    aria-pressed="false">
                <svg class="bi me-2 opacity-50" width="1em" height="1em">
                    <use href="#sun-fill"></use>
                </svg>
                Light
                <svg class="bi ms-auto d-none" width="1em" height="1em">
                    <use href="#check2"></use>
                </svg>
            </button>
        </li>
        <li>
            <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark"
                    aria-pressed="false">
                <svg class="bi me-2 opacity-50" width="1em" height="1em">
                    <use href="#moon-stars-fill"></use>
                </svg>
                Dark
                <svg class="bi ms-auto d-none" width="1em" height="1em">
                    <use href="#check2"></use>
                </svg>
            </button>
        </li>
        <li>
            <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto"
                    aria-pressed="true">
                <svg class="bi me-2 opacity-50" width="1em" height="1em">
                    <use href="#circle-half"></use>
                </svg>
                Auto
                <svg class="bi ms-auto d-none" width="1em" height="1em">
                    <use href="#check2"></use>
                </svg>
            </button>
        </li>
    </ul>
</div>


<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <symbol id="aperture" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
            stroke-width="2" viewBox="0 0 24 24">
        <circle cx="12" cy="12" r="10"/>
        <path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/>
    </symbol>
    <symbol id="cart" viewBox="0 0 16 16">
        <path
            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </symbol>
    <symbol id="chevron-right" viewBox="0 0 16 16">
        <path fill-rule="evenodd"
              d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
    </symbol>
</svg>

<nav class="navbar navbar-expand-md bg-dark sticky-top border-bottom" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand d-md-none" href="#">
            <svg class="bi" width="24" height="24">
                <use xlink:href="#aperture"/>
            </svg>
            Aperture
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas"
                aria-controls="offcanvas" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasLabel">Aperture</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav flex-grow-1 justify-content-between">
                    <li class="nav-item">
                        <a class="nav-link d-flex align-center" href="/">
                            <svg class="bi me-2" width="24" height="24">
                                <use xlink:href="#aperture"/>
                            </svg>
                            {{__('lang.chatbot')}}
                        </a>
                    </li>
                    <div class="d-flex align-center">
                        <li class="nav-item"><a class="nav-link" href="#">{{__('lang.about_us')}}</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('contact')}}">{{__('lang.apply')}}</a>
                        </li>
                       

                    </div>
                </ul>
                <div class="dropdown d-flex align-items-center">
                    <a href="#" class="nav-link link-offset-2 link-underline link-underline-opacity-0"
                       type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ app()->getLocale() == 'uz' ? 'O‘zbekcha 🇺🇿' : 'Русский 🇷🇺' }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('set-locale', 'uz') }}">O‘zbekcha <span class="fi fi-uz"></span> </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('set-locale', 'ru') }}">Русский <span class="fi fi-ru"></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>


<main>
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 bg-body-tertiary">
        <div class="col-md-8 p-lg-5 mx-auto my-5">
            <form action="{{ route('question.get') }}" method="post" class="mb-4">
                @csrf
                @method('POST')
                <h1 class="text-center">{{__('lang.faq')}}</h1>
                <div class="input-group mt-4">
                    <span class="input-group-text" id="basic-addon1">{{__('lang.savolni_kiritish')}}</span>
                    <input type="text" class="form-control"
                           placeholder="{{ __('lang.savolda_kalitsoz') }}"
                           aria-label="Savolda qatnashadigan asosiy kalit so'zni kiritishni boshlang..."
                           aria-describedby="basic-addon1"
                           id="searchInput"
                           name="question"
                    >
                    <button type="submit" class="btn btn-dark border">{{__('lang.izlash')}}</button>
                </div>
                <span class="text-danger" id="errorMsg"></span>
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
            </form>
            <div class="accordion accordion-flush" id="accordionFlushExample">
                @foreach($questions as $question)
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapse{{ $question->id }}" aria-expanded="false"
                                    aria-controls="flush-collapse{{ $question->id }}">
                                {{ $question->question }}
                            </button>
                        </h2>
                        <div id="flush-collapse{{ $question->id }}" class="accordion-collapse collapse"
                             data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <b>{{__('lang.savol_skrinshotlari')}}</b>
                                <div class="row my-3">
                                    @foreach($question->images[app()->getLocale()] as $image)
                                        <div class="col-md-12">
                                            <img src="{{ $image }}" class="img-thumbnail" alt="FAQ javob rasmi">
                                        </div>
                                    @endforeach
                                </div>
                                <br>
                                <b><h2> {{ $question->answer->answer }}</h2></b>
                                <br>
                                <b><h2> {{__('lang.javob_skrinshotlari')}}</h2></b>
                                <div class="row my-3">
                                    @foreach($question->answer->images[app()->getLocale()] as $image)
                                        <div class="col-md-12 my-2">
                                            <img src="{{ $image }}" class="img-thumbnail" alt="FAQ javob rasmi">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</main>

<footer class="container py-5">
    <div class="row">
        <div class="col-12 col-md">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                 stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mb-2" role="img"
                 viewBox="0 0 24 24"><title>Product</title>
                <circle cx="12" cy="12" r="10"/>
                <path
                    d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/>
            </svg>
            <small class="d-block mb-3 text-body-secondary">&copy; 2024 <a href="https://www.acdf.uz/oz">ACDF</a></small>
        </div>


    </div>
</footer>
<script src="{{ asset('assets/bootstrap5/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
<script>
$(function () {
    let availableTags = [];

    $(document).ready(function () {
        $('#searchInput').on('input', function () {
            if (!$('#searchInput').val() || availableTags.length > 0){
                $('#errorMsg').text('');
            }
            const keyword = $(this).val();

            if (keyword.length >= 3) { // Only trigger search after 3 characters
                $.ajax({
                    url: '{{ route('question.search') }}',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token: '{{ csrf_token() }}',
                        keyword: keyword,
                        lang: '{{ app()->getLocale() }}'
                    },
                    success: function (data) {
                        availableTags = []; // Clear the array within the success handler
                        if (data.status === 200) {
                            if (data.count > 0) {
                                data.questions.forEach((question) => {
                                    availableTags.push(question.question_{{app()->getLocale()}});
                                });
                            } else {
                                $('#errorMsg').text('Bunday so\'z qatnashgan savol topilmadi, iltimos boshqa so\'zlar ' +
                                    'yordamida izlab ko\'ring! Agar savolni topa olmasangiz, "Ariza qoldirish" bo\'limi ' +
                                    'orqali ariza qoldiring! Siz bilan operatorlarimiz tez orada bog\'lanishadi!');
                            }
                            $('#searchInput').autocomplete({
                                source: availableTags
                            });
                            // TODO: tarjima atish garak
                        } else {
                            $('#errorMsg').text('Kutilmagan xatolik: Iltimos, adminstrator bilan bog\'laning!');
                        }
                    },
                    error: function (xhr, status, error) {
                        $('#errorMsg').text('Error: ' + error);
                    }
                });
            }
        });
    });
});
</script>
</body>
</html>
