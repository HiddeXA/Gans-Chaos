@extends('layouts/default')

@section('content')
    <div class="h-screen flex">
        <div class="m-auto">
            <div class="bg-(--white) rounded-t-[24px] border-t-8 border-x-8 border-(--blue-light) p-3">
                <h1 class="text-6xl">Login</h1>
            </div>
            <div class="pt-3 bg-(--white)/75 rounded-b-[24px] border-b-8 border-x-8 border-(--blue-light)">
                <form id="loginForm">
                    @csrf <!-- {{ csrf_field() }} -->
                    <div class="flex flex-col md:p-3 p-1 md:mx-7">
                        <input data-cy="email" required name="email" class="registration-form-input" placeholder="E-mail" type="email">
                        <input data-cy="password" required name="password" class="registration-form-input" placeholder="Wachtwoord" type="password">
                        <input data-cy="login-button" class="text-2xl bg-(--orange) rounded-full text-(--text-color-light) p-3 my-3" type="submit" value="Inloggen">
                    </div>
                </form>
                <div class="h-12">
                    <a href="{{route('register')}}" class="px-2 py-1 rounded-2xl float-end mr-4 content-end text-center bg-(--blue-light) text-(--text-color-light) text-1xl">Registreren</a>
                </div>
            </div>
        </div>
    </div>

    @vite("resources/js/login.js")

@endsection
