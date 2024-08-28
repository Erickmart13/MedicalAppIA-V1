{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}


@extends('layouts.app')
@section('page-title')
    Perfil
@endsection
@section('content')


    <div
        class="relative flex flex-col flex-auto min-w-0 p-4 mx-6 overflow-hidden break-words bg-white border-0 dark:bg-slate-850 dark:shadow-dark-xl shadow-3xl rounded-2xl bg-clip-border">
        <div class="flex flex-wrap -mx-3">







            <div class="flex-none w-auto max-w-full px-3">
                <div
                    class="relative inline-flex items-center justify-center text-white transition-all duration-200 ease-in-out text-base h-19 w-19 rounded-xl">
                    <img src="{{ asset('/img/team-3.jpg') }}" alt="profile_image" class="w-full shadow-2xl rounded-xl" />
                </div>
            </div>
            <div class="flex-none w-auto max-w-full px-3 my-auto">
                <div class="h-full">
                    <h5 class="mb-1 dark:text-white">{{ Auth::user()->user_name }}</h5>

                </div>
            </div>
            <div class="w-full max-w-full px-3 mx-auto mt-4 sm:my-auto sm:mr-0 md:w-1/2 md:flex-none lg:w-4/12">
                <div class="relative right-0">
                    <ul class="relative flex flex-wrap p-1 list-none bg-gray-50 rounded-xl" nav-pills role="tablist">
                        <li class="z-30 flex-auto text-center">
                            <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg bg-inherit text-slate-700"
                                nav-link active href="javascript:;" role="tab" aria-selected="true">
                                <i class="ni ni-app"></i>
                                <span class="ml-2">App</span>
                            </a>
                        </li>
                        <li class="z-30 flex-auto text-center">
                            <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg bg-inherit text-slate-700"
                                nav-link href="javascript:;" role="tab" aria-selected="false">
                                <i class="ni ni-email-83"></i>
                                <span class="ml-2">Messages</span>
                            </a>
                        </li>
                        <li class="z-30 flex-auto text-center">
                            <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-colors ease-in-out border-0 rounded-lg bg-inherit text-slate-700"
                                nav-link href="javascript:;" role="tab" aria-selected="false">
                                <i class="ni ni-settings-gear-65"></i>
                                <span class="ml-2">Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class=" w-full p-6 mx-auto">

        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 shrink-0 md:w-12/12 md:flex-0">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                        <div class="flex items-center">
                            <p class="mb-0 dark:text-white/80">Editar Perfil</p>
                            <button type="button"
                                class="inline-block px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Settings</button>
                        </div>
                    </div>
























                    <div class="flex-auto p-6">
                        
                        <div>
                            <div class="w-full max-w-full px-3 shrink-0 md:w-12/12 md:flex-0">
                                <div class="mb-4">
                                    @include('profile.partials.update-profile-information-form')
                                </div>
                            </div>



                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:w-12/12 md:flex-0">
                            <div class="mb-4">

                                @include('profile.partials.update-password-form')

                            </div>
                        </div>
                        <div>
                            <div class="w-full max-w-full px-3 shrink-0 md:w-12/12 md:flex-0">
                                <div class="mb-4">
                                    @include('profile.partials.update-profilePerson-information-form')
                                </div>
                            </div>



                        </div>

                        
                       







                       


                            <div class="mb-4">
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="relative p-2 my-1 text-white bg-red-500 rounded-lg">{{ $error }}
                                        </div>
                                    @endforeach
                                @endif

                                

                            </div>
                            
                            
                            


                   

















                        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                            <div class="max-w-xl">
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
@section('scripts')
    <!-- plugin for flatpickr  -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>
    <!-- main script file  -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dateOfBirthInput = document.getElementById('date_of_birth');
            const ageInput = document.getElementById('age');

            dateOfBirthInput.addEventListener('change', function() {
                const dob = new Date(dateOfBirthInput.value);
                const today = new Date();
                let age = today.getFullYear() - dob.getFullYear();
                const monthDifference = today.getMonth() - dob.getMonth();
                if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < dob.getDate())) {
                    age--;
                }
                ageInput.value = age;
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr("#date_of_birth", {
                locale: "es",
                dateFormat: "Y-m-d"
            });
        });
    </script>
@endsection
