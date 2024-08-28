<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Actualizar contraseña') }}
        </h2>

        <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Contraseña</p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="flex flex-wrap -mx-3">

            <div class="w-full max-w-full px-3 shrink-0 md:w-4/12 md:flex-0">
                <div class="mb-4">
                    <x-input-label for="update_password_current_password" :value="__('Contraseña actual')"
                        class="inline-block mb-2 ml-1 font-bold text-sm text-slate-700 dark:text-white/80" />
                    <x-text-input id="update_password_current_password" name="current_password" type="password"
                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                        autocomplete="current-password" />
                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                </div>
            </div>



            <div class="w-full max-w-full px-3 shrink-0 md:w-4/12 md:flex-0">
                <div class="mb-4">
                    <x-input-label for="update_password_password" :value="__('Nueva contraseña')"
                        class="inline-block mb-2 ml-1 font-bold text-sm text-slate-700 dark:text-white/80" />
                    <x-text-input id="update_password_password" name="password" type="password"
                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                        autocomplete="new-password" />
                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                </div>
            </div>

            <div class="w-full max-w-full px-3 shrink-0 md:w-4/12 md:flex-0">
                <div class="mb-4">
                    <x-input-label for="update_password_password_confirmation" :value="__('Confirmar contraseña')"
                        class="inline-block mb-2 ml-1 font-bold text-sm text-slate-700 dark:text-white/80" />
                    <x-text-input id="update_password_password_confirmation" name="password_confirmation"
                        type="password"
                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                        autocomplete="new-password" />
                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                </div>
            </div>
           
            <div class="w-full max-w-full px-3 shrink-0 flex justify-end">
                <x-primary-button class="inline-block px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-lime-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">{{ __('Guardar') }}</x-primary-button>

                @if (session('status') === 'password-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                @endif
            </div>
        </div>
    </form>
</section>
