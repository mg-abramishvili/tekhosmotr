@component('mail::message')
# Новая заявка с сайта БашТехОсмотр.РФ

Станция:<br>{{ $station }}
<br><br>

Дата:<br>{{ $date }}
<br><br>

Время:<br>{{ $time }}
<br><br>

Имя:<br>{{ $name }}
<br><br>

Телефон:<br>{{ $phone }}

@endcomponent
