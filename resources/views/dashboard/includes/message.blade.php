@if ($message = Session::get('success'))
    <div class="absolute top-5 left-5 w-max bg-green-300 alert alert-success px-3 py-3" onclick="fade(this)">
        <p class="text-green-800">{{ $message }}</p>
    </div>
    <script>
        function fade(element) {
            var op = 1;  // initial opacity
            var timer = setInterval(function () {
                if (op <= 0.1){
                    clearInterval(timer);
                    element.style.display = 'none';
                }
                element.style.opacity = op;
                element.style.filter = 'alpha(opacity=' + op * 100 + ")";
                op -= op * 0.1;
            }, 50);
        }
    </script>
@endif