@extends('layouts.app')

@section('content')
<div class="chatbot-container">
    <h2>Assistant IA</h2>
    <div id="chatbox"></div>
    <form id="chat-form">
        <input type="text" id="message" placeholder="Posez votre question..." autocomplete="off" />
        <button type="submit">Envoyer</button>
    </form>
</div>

<style>
.chatbot-container {
    max-width: 600px;
    margin: auto;
    background: #fff;
    padding: 20px;
    box-shadow: 0 0 10px #ccc;
    border-radius: 8px;
}
#chatbox {
    max-height: 400px;
    overflow-y: auto;
    border: 1px solid #ddd;
    padding: 10px;
    margin-bottom: 10px;
}
#chatbox p { margin: 5px 0; }
.user { color: #0d6efd; font-weight: bold; }
.bot { color: #198754; }
form {
    display: flex;
    gap: 10px;
}
input[type="text"] {
    flex: 1;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
button {
    padding: 10px 15px;
    background-color: #28a745;
    border: none;
    color: white;
    border-radius: 5px;
}
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#chat-form').on('submit', function (e) {
        e.preventDefault();
        const message = $('#message').val();
        $('#chatbox').append('<p class="user"><strong>Vous :</strong> ' + message + '</p>');
        $.post('/chatbot', {
            message: message,
            _token: '{{ csrf_token() }}'
        }, function (data) {
            $('#chatbox').append('<p class="bot"><strong>Assistant :</strong> ' + data.answer + '</p>');
            $('#message').val('');
        }).fail(function() {
            $('#chatbox').append('<p class="bot"><strong>Assistant :</strong> Bonjour en quoi puis-je vous aider.</p>');
        });
    });
</script>
@endsection
