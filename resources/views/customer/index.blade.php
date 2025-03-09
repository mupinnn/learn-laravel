<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        @routes
        @vite(['resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <main class="max-w-lg mx-auto p-4 flex flex-col gap-8 lg:p-8">
            <h1 class="text-2xl font-medium">Build your dream PC</h1>

            <section class="flex flex-col gap-4" x-data>
                <label class="block">
                    <span class="text-gray-700">CPU Brand</span>
                    <select
                        class="w-full mt-1 disabled:opacity-50"
                        x-model="$store.parts.cpuBrand.value"
                        @change="$store.parts.onChange('cpuBrand')"
                    >
                        <option value="">--Please choose an option--</option>
                        <template x-for="cpuBrand in $store.parts.cpuBrand.options">
                            <option :value="cpuBrand.id">
                                <span x-text="cpuBrand.name" />
                            </option>
                        </template>
                    </select>
                </label>

                <label class="block">
                    <span class="text-gray-700">CPU</span>
                    <select
                        class="w-full mt-1 disabled:opacity-50"
                        x-model="$store.parts.cpu.value"
                        @change="$store.parts.onChange('cpu')"
                       :disabled="!$store.parts.cpuBrand.value"
                    >
                        <option value="">--Please choose an option--</option>
                        <template x-for="cpu in $store.parts.cpu.options">
                            <option :value="cpu.socket">
                                <span x-text="cpu.name" />
                            </option>
                        </template>
                    </select>
                </label>

                <label class="block">
                    <span class="text-gray-700">Motherboard</span>
                    <select
                        class="w-full mt-1 disabled:opacity-50"
                        x-model="$store.parts.motherboard.value"
                        :disabled="!$store.parts.cpuBrand.value || !$store.parts.cpu.value"
                    >
                        <option value="">--Please choose an option--</option>
                        <template x-for="mobo in $store.parts.motherboard.options">
                            <option :value="mobo.socket">
                                <span x-text="mobo.name" />
                            </option>
                        </template>
                    </select>
                </label>
            </section>
        </main>
    </body>
</html>

