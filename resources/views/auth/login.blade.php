@extends('layouts.auth')

@section('title', 'Connexion')

@section('content')

    <div class="flex justify-center items-center h-screen">
        <div class="w-full max-w-xs">
            <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
                <legend class="fieldset-legend">Connexion</legend>
                @if ($errors->any())
                    <div role="alert" class="alert alert-warning">
                        <x-lucide-triangle-alert class="h-6 w-6 shrink-0 stroke-current" />
                        <span>Les informations d'identification fournies sont invalides.</span>
                    </div>
                @endif

                @if (session('status'))
                    <div role="alert" class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST" class="flex flex-col gap-4">
                    @csrf
                    <div class="flex flex-col gap-2">
                        <label class="label">Adresse mail</label>
                        <input type="email" name="email" class="input{{ $errors->any() ? ' input-warning' : '' }}"
                            placeholder="Adresse mail" />
                    </div>

                    <div class="flex flex-col gap-2">
                        <label class="label">Mot de passe</label>
                        <input type="password" name="password" class="input{{ $errors->any() ? ' input-warning' : '' }}"
                            placeholder="Mot de passe" />
                    </div>

                    <div class="flex items-center gap-2">
                        <input type="checkbox" class="toggle" name="remember" id="remember" />
                        <label for="remember" class="label">Rester connecté</label>
                    </div>

                    <button class="btn btn-neutral">Se connecter</button>
                </form>
            </fieldset>
        </div>
    </div>
@endsection
