@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Contact Us</h1>
    <p>If you have any questions or feedback, please feel free to reach out to us using the form below.</p>
    <form action="/contact" method="POST">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div>
            <label for="message">Message:</label>
            <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Send Message</button>
    </form>
</div>
@endsection
