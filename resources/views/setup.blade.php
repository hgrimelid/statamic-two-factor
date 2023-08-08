@extends('statamic::outside')
@section('title', __('statamic-two-factor::setup.title'))

@section('content')

    @include('statamic::partials.outside-logo')
    <div class="two-factor">

        <div class="two-factor-setup">

            <div class="card auth-card mx-auto">

                <div>
                    <h1 class="mb-4 text-lg text-gray-800">{{ __('statamic-two-factor::setup.title') }}</h1>
                </div>
                <form method="POST" class="">
                    {!! csrf_field() !!}

                    <div class="md:flex">

                        <div class="left">
                            <div class="mb-4"
                                 style="width:170px; flex-shrink:0;">
                                {!! $qr !!}
                            </div>

                            <div class="text-sm">
                                <div class="font-bold text-xs">{{ __('statamic-two-factor::setup.code') }}:</div>
                                <div>{{ $secret_key }}</div>
                            </div>
                        </div>

                        <div class="right">
                            <div class="mb-6">
                                <p class="text-sm text-gray">{{ __('statamic-two-factor::setup.introduction') }}</p>
                            </div>

                            <div class="md:hidden">
                                <div class="mb-2"
                                     style="width:100%">
                                    {!! $qr !!}
                                </div>

                                <div class="text-sm mb-6">
                                    <div class="font-bold text-xs">{{ __('statamic-two-factor::setup.code') }}:</div>
                                    <div>{{ $secret_key }}</div>
                                </div>
                            </div>

                            <div class="mb-6">
                                <label class="mb-2" for="input-code">{{ __('statamic-two-factor::setup.verification_code') }}</label>
                                <input type="text" class="input-text" name="code" pattern="[0-9]*" maxlength="6" inputmode="numeric" autofocus autocomplete="off" id="input-code">
                                @error('code')<div class="text-red-500 text-xs mt-2">{{ $message }}</div>@enderror
                            </div>

                            <div class="flex justify-between items-center">
                                <div></div>
                                <button type="submit" class="btn-primary">{{ __('statamic-two-factor::setup.action') }}</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>

            <div class="mt-4 text-xs text-center">
                <a class="logout" href="{{ cp_route('logout') }}?redirect={{ cp_route('login') }}">{{ __('statamic-two-factor::actions.logout') }}</a>
            </div>
        </div>

    </div>
@endsection
