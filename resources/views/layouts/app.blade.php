<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <link rel="stylesheet" href="{{asset('js/toastr.min.css')}}">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">

        @yield('styles')

        <style>
           /* unvisited link */
            a:link {
            color: #1CA5BE;
            }

            /* visited link */
            a:visited {
            color: #6B89DA;
            }

            /* mouse over link */
            a:hover {
            color: #0B1EAF;
            }

            /* selected link */
            a:active {
            color: #030B46;
            }

            .sidenav {
                    height: 500px;
                    width: 280px;
                    position: fixed;
                    z-index: 1;
                    top: 22%;
                    left: 0;
                    background-color: #dee5fe;
                    overflow-x: hidden;
                    padding-top: 20px;
                    /* bottom : 10%; */
                    /* padding-bottom: 5px; */
                    }

                    .sidenav a {
                    padding: 6px 6px 6px 32px;
                    text-decoration: none;
                    font-size: 25px;
                    color: #758bd7;
                    display: block;
                    }

                    .sidenav a:hover {
                    color: #0912b6;

                
                   
                }

                
        </style>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>


                    <div class="sidenav">
                        @if(Auth::user()->admin)
                          <a href="{{route('users')}}">Users</a>
                          <a href="{{route('user.create')}}">Create a User</a>
                        @endif
                        <a href="{{route('user.profile')}}">Edit Profile</a>
                        <a href="{{route('posts')}}">Posts</a>
                        <a href="{{route('post.create')}}">Create a Post</a>
                        <a href="{{route('post.trashed')}}">Trashed Posts</a>
                        <a href="{{route('categories')}}">Categories</a>
                        <a href="{{route('category.create')}}">Create a Category</a>
                        <a href="{{route('tags')}}">Tags</a>
                        <a href="{{route('tag.create')}}">Create a Tag</a>
                      

                        @if(Auth::user()->admin)
                          <a href="{{route('settings')}}">Settings</a>
                        @endif
                    </div>


                            <!-- Page Content -->
                            <main style='margin-left:235px'>
                                {{ $slot }}
                            </main>
          
        </div>
        <script src="{{asset('js/toastr.min.js')}}"></script>
        <script>
            @if(Session::has('success'))

                toastr.success('{{Session::get('success')}}')

            @endif
        </script>

        @yield('scripts')

    </body>
   
</html>
