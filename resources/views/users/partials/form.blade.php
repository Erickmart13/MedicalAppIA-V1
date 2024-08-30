

<div class="mb-4">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="relative p-2 my-1 text-white bg-red-500 rounded-lg">{{ $error }}</div>
        @endforeach
    @endif
    <hr
    class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />

    <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Información de usuario</p>


</div>




<div class="flex flex-wrap -mx-3">

    <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="user_name">Nombre de
                usuario</label>
            <input id="user_name" placeholder="Ingrese el nombre del paciente" type="text" name="user_name" required
                value="{{ old('user_name') }}"
                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
        </div>
    </div>
    <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="user_email">Correo
                electrónico</label>
            <input id="user_email" placeholder="Ingrese el correo electrónico del paciente" type="email"
                name="user_email" required value="{{ old('user_email') }}"
                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
        </div>
    </div>

    <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Contraseña</label>
            <input id="password" type="password" name="password" required value="{{ old('password') }}"
                {{-- value="{{old('password',Str::password(8))}}" --}}
                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
        </div>
    </div>
    <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="address">Confirmar
                contraseña</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required
                value="{{ old('Confirm Password') }}" autocomplete="new-password"
                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
        </div>
    </div>


</div>
