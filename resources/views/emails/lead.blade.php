@component('mail::message')
# Новая заявка с сайта БашТехОсмотр.РФ

Станция:<br>{{ $station }}
<br><br>

Дата:<br>{{ $n_date }}
<br><br>

Время:<br>{{ $time }}
<br><br>

Категория:<br>{{ $category }}
<br><br>

Госномер:<br>{{ $number }}
<br><br>

Имя:<br>{{ $name }}
<br><br>

Телефон:<br>{{ $phone }}

@endcomponent
