<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        
    </head>
    <body class="bg-black text-white d-flex flex-column">
    <div class="bg-light text-dark flex-grow-1 pb-5">
        <div class="d-flex justify-content-center align-items-start pt-5 pb-5">
            <div class="container pb-5">
                <h1 class="display-1 text-center fw-bold">BLOG MSIB</h1>
                <main class="mt-5">
                    <div class="row g-4">
                        <!-- author -->
                        <div class="col-lg-6">
                            <a href="{{ route('authors.index') }}" class="d-flex p-4 bg-white text-dark rounded shadow-lg text-decoration-none hover-shadow">
                                <div class="bg-danger rounded-circle d-flex justify-content-center align-items-center" style="width: 48px; height: 48px;">
                                    <svg class="bi" width="24" height="24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <g fill="#FEF9F2">
                                            <path d="M24 8.25a.5.5 0 0 0-.5-.5H.5a.5.5 0 0 0-.5.5v12a2.5 2.5 0 0 0 2.5 2.5h19a2.5 2.5 0 0 0 2.5-2.5v-12Zm-7.765 5.868a1.221 1.221 0 0 1 0 2.264l-6.626 2.776A1.153 1.153 0 0 1 8 18.123v-5.746a1.151 1.151 0 0 1 1.609-1.035l6.626 2.776ZM19.564 1.677a.25.25 0 0 0-.177-.427H15.6a.106.106 0 0 0-.072.03l-4.54 4.543a.25.25 0 0 0 .177.427h3.783c.027 0 .054-.01.073-.03l4.543-4.543ZM22.071 1.318a.047.047 0 0 0-.045.013l-4.492 4.492a.249.249 0 0 0 .038.385.25.25 0 0 0 .14.042h5.784a.5.5 0 0 0 .5-.5v-2a2.5 2.5 0 0 0-1.925-2.432ZM13.014 1.677a.25.25 0 0 0-.178-.427H9.101a.106.106 0 0 0-.073.03l-4.54 4.543a.25.25 0 0 0 .177.427H8.4a.106.106 0 0 0 .073-.03l4.54-4.543ZM6.513 1.677a.25.25 0 0 0-.177-.427H2.5A2.5 2.5 0 0 0 0 3.75v2a.5.5 0 0 0 .5.5h1.4a.106.106 0 0 0 .073-.03l4.54-4.543Z" />
                                        </g>
                                    </svg>
                                </div>
                                <div class="ps-3">
                                    <h2 class="h5 fw-bold">Author</h2>
                                </div>
                            </a>
                        </div>

                        <!-- post -->
                        <div class="col-lg-6">
                            <a href="{{ route('posts.index') }}" class="d-flex p-4 bg-white text-dark rounded shadow-lg text-decoration-none hover-shadow">
                                <div class="bg-danger rounded-circle d-flex justify-content-center align-items-center" style="width: 48px; height: 48px;">
                                    <svg class="bi" width="24" height="24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <g fill="#FEF9F2">
                                            <path d="M12.085 3.043a1.207 1.207 0 0 1 1.704 0l7.168 7.168a1.207 1.207 0 0 1 0 1.704l-9.168 9.168a1.207 1.207 0 0 1-.427.272l-5.5 1.5a.5.5 0 0 1-.621-.621l1.5-5.5a1.207 1.207 0 0 1 .272-.427l9.168-9.168Zm7.168 8.168L13.5 5.457 5.957 13l5.752 5.752 8.5-8.5a.207.207 0 0 0 0-.292Z"/>
                                        </g>
                                    </svg>
                                </div>
                                <div class="ps-3">
                                    <h2 class="h5 fw-bold">Post</h2>
                                </div>
                            </a>
                        </div>

                        <!-- category -->
                        <div class="col-lg-6">
                            <a href="{{ route('categories.index') }}" class="d-flex p-4 bg-white text-dark rounded shadow-lg text-decoration-none hover-shadow">
                                <div class="bg-danger rounded-circle d-flex justify-content-center align-items-center" style="width: 48px; height: 48px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill="#FEF9F2" d="M10 4H3.5C2.67 4 2 4.67 2 5.5v13c0 .83.67 1.5 1.5 1.5h17c.83 0 1.5-.67 1.5-1.5v-10c0-.83-.67-1.5-1.5-1.5H12l-2-2Z"/>
                                    </svg>
                                </div>
                                <div class="ps-3">
                                    <h2 class="h5 fw-bold">Category</h2>
                                </div>
                            </a>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
    
    <footer class="pt-4 text-center text-light">
        Copyright &copy; 2024 muqniansyah
    </footer>
</body>

</html>
