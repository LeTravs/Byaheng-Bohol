@extends('layout')

@section('content')
    <h1>We're Sorry!</h1>
    <h4>This page is currently under maintenance. #WeWillBeBackSoon</h4>

    <h3>Thank you for your patience.</h3>
    <p>We are currently performing scheduled maintenance. During this time, our website will be unavailable. We apologize for any inconvenience this may cause and appreciate your understanding.</p>
    <p>If you need immediate assistance, please contact our support team at <a href="mailto:support@example.com">support@example.com</a>. We are working hard to improve our services and will be back online shortly.</p>
    <p>Stay tuned for updates and thank you for your continued support.</p>

    <style>
        h3 {
            text-align: center;
        }
        p {
            text-align: center;
            font-size: 16px;
            color: #555;
        }
        a {
            color: #0066cc;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
@endsection
