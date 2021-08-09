@if ($message = Session::get('success'))
    <div class="bg-green-300 alert alert-success px-3 py-3" onclick="fade(this)">
        <p class="text-green-800">{{ $message }}</p>
    </div>
@endif