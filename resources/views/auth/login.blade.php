<x-layout>
    <x-slot:heading>
        Login
    </x-slot:heading>

    <form method="POST" action="/login">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="email" >Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="email" id="email" :value="old('email')" required></x-form-input>
                            <div>
                                <x-form-error name="email"/>
                            </div>
                        </div>
                    </x-form-field>
                    <x-form-field>
                        <x-form-label for="password" >Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="password" id="password" type="password" required></x-form-input>
                            <div>
                                <x-form-error name="password"/>
                            </div>
                        </div>
                    </x-form-field>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
            <x-form-button>Login</x-form-button>
        </div>
    </form>

</x-layout>
