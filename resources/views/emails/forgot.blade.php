@component('mail::message')

    <p>We Understand it happens.</p>

    @component('mail::button', ['url' => url('reset/' . $user->remember_token)])
        Reset Your password
    @endcomponent

    <p>In case you face any issues recovering your password, please contact us</p>
    Tanks, <br>
    {{ config('app.name') }}
@endcomponent
