@if ($errors->any())
<div class="alert alert-danger">
    <strong>Ой!</strong> Тут какая-то проблема с полями.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif