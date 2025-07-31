@extends('layouts.auth')

@section('title', 'Inscription')

@section('content')

    <div class="flex justify-center items-center h-screen">
        <div class="w-full max-w-xs">
            <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
                <legend class="fieldset-legend">Inscription</legend>
                @if ($errors->any())
                <div role="alert" class="alert alert-warning">
                    <x-lucide-triangle-alert class="h-6 w-6 shrink-0 stroke-current" />
                    <span>Les informations d'identification fournies sont invalides.</span>
                    <span>{{ $errors->first() }}</span>
                </div>
                @endif
                <form action="{{ route('register') }}" method="POST" class="flex flex-col gap-4">
                    @csrf
                    <div class="flex flex-col gap-2">
                        <label class="label">Nom d'utilisateur</label>
                        <input type="text" name="name" class="input{{ $errors->any() ? ' input-warning' : '' }}"
                            placeholder="Nom d'utilisateur" />
                    </div>

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
                    <div class="flex flex-col gap-2">
                        <label class="label">Confirmer le mot de passe</label>
                        <input type="password" name="password_confirmation" class="input{{ $errors->any() ? ' input-warning' : '' }}"
                            placeholder="Confirmer le mot de passe" />
                    </div>

                    <button class="btn btn-neutral">S'inscrire</button>
                </form>
            </fieldset>
        </div>
    </div>
@endsection
