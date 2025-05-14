<x-layout>
    <h1 class="mb-4 text-2xl text-center">Sing in</h1>

    <x-card class="py-8 px-16">

        <form action="{{ route('auth.store') }}" method="POST">
            @csrf

            <div class="mb-8">
                <label for="email">Email</label>
                <x-text-input name="email"/>
                @error('email')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-8">
                <label for="password">Password</label>
                <x-text-input type="password" name="password"/>
                @error('password')
                    {{ $message }}
                @enderror
            </div>

            <div class="mb-8 flex justify-between">
                <div>
                    <div>
                        <label class="flex items-center space-x-2">
                            <input class="rounded-sm border border-slate-400" type="checkbox" name="remember">
                            <span>Remember me</span>
                        </label>

                    </div>
                </div>
                <div>
                    <a href="#" class="text-indigo-600 hover:underline">Forget password?</a>
                </div>
            </div>

            <x-button type="submit">Login</x-button>
        </form>
    </x-card>
</x-layout>
