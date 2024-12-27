<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .contact-header {
            text-align: center;
            margin-top: 30px;
            margin-bottom: 20px;
        }
        .contact-info {
            margin-bottom: 20px;
        }
        .contact-info h5 {
            font-weight: bold;
        }
    </style>
</head>

<body>
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

    <div class="container">
        <div class="contact-header">
            <h1>Contact Us</h1>
            <p>Agar sizda biron bir savol bo'lsa, quyidagi shakl yoki taqdim etilgan aloqa ma'lumotlari orqali biz bilan bog'laning.</p>
        </div>

        <div class="row">
            <!-- Contact Information -->
            <div class="col-md-6 contact-info">
                <h5>{{__('lang.address')}}</h5>
                <p>123 Main Street,<br> Tashkent, Uzbekistan</p>

                <h5>Phone</h5>
                <p>+998 (90) 123-45-67</p>

                <h5>Email</h5>
                <p> info@acdf.uz</p>
            </div>

            <!-- Contact Form -->
            <div class="col-md-6">
                <form action="" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Your Message</label>
                        <textarea class="form-control" id="message" name="message" rows="4" placeholder="Write your message here" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
