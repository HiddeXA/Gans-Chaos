@extends('layouts/default')



@section('content')
<div class="h-screen flex">
    <div class="m-auto">
        <div class="bg-(--white) rounded-t-[24px] border-t-8 border-x-8 border-(--blue-light) p-3">
            <h1 class="text-6xl">Registreren</h1>
        </div>
        <div class="bg-(--white)/75 rounded-b-[24px] border-b-8 border-x-8 border-(--blue-light)">
            <form id="registerForm" class="flex md:flex-row flex-col-reverse">
                @csrf <!-- {{ csrf_field() }} -->
                <div class="flex flex-col md:p-3 p-1 md:mx-7">
                    <input required name="name" class="registration-form-input" placeholder="Gebruikersnaam" type="text">
                    <input required name="email" class="registration-form-input" placeholder="E-mail" type="email">
                    <input required name="password" class="registration-form-input" placeholder="Wachtwoord" type="password">
                    <input required name="password_confirmation" class="registration-form-input" placeholder="Herhaal wachtwoord" type="password">
                    <input class="text-2xl bg-(--orange) rounded-full text-(--text-color-light) p-3 md:my-3" type="submit" value="Registreren">
                </div>
                <div class="md:p-3 p-1 flex flex-col items-center md:mx-7">
                    <img class="rounded-full aspect-square mx-4 w-1/2 md:w-60" src="{{asset("/images/default-profile-pic.jpg")}}" id="imagePreview" alt="profile">
                    <label for="imageInp" class="bg-(--blue-light) rounded-full text-(--text-color-light) py-1 px-3 my-3 md:my-6">Foto uploaden</label>
                    <input id="imageInp" type="file" class="hidden" accept="image/jpeg image/png image/jpg" >
                </div>
            </form>
        </div>
    </div>
</div>

    @vite("resources/js/registration.js")

@endsection
