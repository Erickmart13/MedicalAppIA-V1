<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Actualizar Información Personal') }}
        </h2>

        <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Información
            personal</p>
    </header>
    {{-- Formulario person --}}
    <form method="post" action="{{ route('profilePerson.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="flex flex-wrap -mx-3">

            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                <div class="mb-4">
                    <label for="first_name"
                        class="inline-block mb-2 ml-1 font-bold text-sm text-slate-700 dark:text-white/80">Nombre</label>
                    <x-text-input id="first_name" name="first_name" type="text"
                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                        :value="old('first_name', $person->first_name)" required autofocus autocomplete="first_name" />
                    <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
                </div>
            </div>
            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                <div class="mb-4">
                    <label for="last_name"
                        class="inline-block mb-2 ml-1 font-bold text-sm text-slate-700 dark:text-white/80">Apellido</label>
                    <x-text-input id="last_name" name="last_name" type="text"
                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                        :value="old('last_name', $person->last_name)" required autofocus autocomplete="last_name" />
                    <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
                </div>
            </div>
            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                <div class="mb-4">
                    <label for="cedula"
                        class="inline-block mb-2 ml-1 font-bold text-sm text-slate-700 dark:text-white/80">Cédula</label>
                    <x-text-input id="cedula" name="cedula" type="text"
                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                        :value="old('cedula', $person->cedula)" required autofocus autocomplete="cedula" />
                    <x-input-error class="mt-2" :messages="$errors->get('cedula')" />
                </div>
            </div>
            <div class="w-full max-w-full px-3 shrink-0 md:w-3/12 md:flex-0">
                <div class="mb-4">
                    <label for="date_of_birth"
                        class="inline-block mb-2 ml-1 font-bold text-sm text-slate-700 dark:text-white/80">Fecha de
                        nacimeinto</label>
                    <x-text-input id="date_of_birth" name="date_of_birth" type="text"
                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                        :value="old('date_of_birth', $person->date_of_birth)" required autofocus autocomplete="date_of_birth" />
                    <x-input-error class="mt-2" :messages="$errors->get('date_of_birth')" />
                </div>
            </div>
            <div class="w-full max-w-full px-3 shrink-0 md:w-1/12 md:flex-0">
                <div class="mb-4">
                    <label for="age"
                        class="inline-block mb-2 ml-1 font-bold text-sm text-slate-700 dark:text-white/80">Edad</label>
                    <x-text-input id="age" name="age" type="text"
                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                        :value="old('age', $person->age)" required autofocus autocomplete="age" />
                    <x-input-error class="mt-2" :messages="$errors->get('age')" />
                </div>
            </div>
            <div class="w-full max-w-full px-3 shrink-0 md:w-2/12 md:flex-0">
                <div class="mb-4">
                    <label for="gender"
                        class="inline-block mb-2 ml-1 font-bold text-sm text-slate-700 dark:text-white/80">Género</label>
                    <x-text-input id="gender" name="gender" type="text"
                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                        :value="old('gender', $person->gender)" required autofocus autocomplete="gender" />
                    <x-input-error class="mt-2" :messages="$errors->get('gender')" />
                </div>
            </div>
        </div>

        <hr
            class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />

        <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Información de
            contacto</p>
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                <div class="mb-4">
                    <label for="phone"
                        class="inline-block mb-2 ml-1 font-bold text-sm text-slate-700 dark:text-white/80">Teléfono</label>
                    <x-text-input id="phone" name="phone" type="text"
                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                        :value="old('phone', $person->phone)" required autofocus autocomplete="phone" />
                    <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                </div>
            </div>
            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                <div class="mb-4">
                    <label for="city_id"
                        class="inline-block mb-2 ml-1 font-bold text-sm text-slate-700 dark:text-white/80">Ciudad de Residencia</label>
                    <x-text-input id="city_id" name="city_id" type="text"
                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                        :value="old('city_id', $person->city->name)" required autofocus autocomplete="city_id" />
                    <x-input-error class="mt-2" :messages="$errors->get('city_id')" />
                </div>
            </div>
            <div class="w-full max-w-full px-3 shrink-0 md:w-12/12 md:flex-0">
                <div class="mb-4">
                    <label for="address"
                        class="inline-block mb-2 ml-1 font-bold text-sm text-slate-700 dark:text-white/80">Dirección</label>
                    <x-text-input id="address" name="address" type="text"
                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                        :value="old('address', $person->address)" required autofocus autocomplete="address" />
                    <x-input-error class="mt-2" :messages="$errors->get('address')" />
                </div>
            </div>





            <div class="w-full max-w-full px-3 shrink-0 md:flex-0 flex justify-end">
                <x-primary-button
                    class="inline-block px-8 py-2 mb-4 font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-lime-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">
                    {{ __('Guardar') }}
                </x-primary-button>

                @if (session('status') === 'profilePerson-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                @endif
            </div>
        </div>
        </div>


    </form>
</section>
