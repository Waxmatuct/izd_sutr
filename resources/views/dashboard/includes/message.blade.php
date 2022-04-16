@if ($message = Session::get('success'))
    <div id="success" class="w-full bg-green-300 alert alert-success px-3 py-3 mb-5">
        <p class="text-green-800">{{ $message }}</p>
    </div>
    <script type="text/javascript">
        window.onload = timeout;

        function timeout() {
            setTimeout(() => fade(), 1000);
        }

        function fade() {
            var op = 1; // initial opacity
            var div = document.getElementById("success")
            var timer = setInterval(function() {
                if (op <= 0.1) {
                    clearInterval(timer);
                    div.style.display = 'none';
                }
                div.style.opacity = op;
                div.style.filter = 'alpha(opacity=' + op * 100 + ")";
                op -= op * 0.1;
            }, 50);
        }
    </script>
@endif
