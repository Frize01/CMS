@extends('layouts.auth')

@section('title', 'Mot de passe oublié')

@section('content')

    <div class="flex justify-center items-center h-screen">
        <div class="w-full max-w-xs">
            <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
                <legend class="fieldset-legend">Mot de passe oublié</legend>

                @if ($errors->any())
                    <div role="alert" class="alert alert-warning">
                        <x-lucide-triangle-alert class="h-6 w-6 shrink-0 stroke-current" />
                        <span>Les informations d'identification fournies sont invalides.</span>
                    </div>
                @endif

                @if (session('status'))
                    <div role="alert" class="alert alert-success">
                        Un email a été envoyé avec un lien pour réinitialiser votre mot de passe.
                    </div>
                @endif

                <form action="{{ route('password.update') }}" method="POST" class="flex flex-col gap-4">
                    @csrf
                    <input type="hidden" name="token" value="{{ request()->route('token') }}">
                    <div class="flex flex-col gap-2">
                        <label class="label">Adresse mail</label>
                        <input type="email" name="email" class="input{{ $errors->any() ? ' input-warning' : '' }}"
                            placeholder="Adresse mail" value="{{ old('email') }}" required autofocus />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="label">Nouveau mot de passe</label>
                        <input type="password" name="password" class="input{{ $errors->any() ? ' input-warning' : '' }}" placeholder="Nouveau mot de passe" required />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="label">Confirmer le mot de passe</label>
                        <input type="password" name="password_confirmation" class="input{{ $errors->any() ? ' input-warning' : '' }}" placeholder="Confirmer le mot de passe" required />
                    </div>

                    <button class="btn btn-neutral">Réinitialiser le mot de passe</button>
                </form>
            </fieldset>
        </div>
    </div>
@endsection
