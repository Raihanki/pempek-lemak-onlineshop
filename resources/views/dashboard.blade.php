<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-md">
                    <h1>Selamat datang {{ Auth::user()->name }}</h1>
                    <p>Anda login sebagai {{ Auth::user()->roles[0]->name }}</p>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
