{literal}
    <script>
        function whenAvailable(name, callback) {
            var interval = 10; // ms
            window.setTimeout(function() {
                if (window[name]) {
                    callback(window[name]);
                } else {
                    window.setTimeout(arguments.callee, interval);
                }
            }, interval);
        }
        
        whenAvailable("fartscroll", function(t) {
            fartscroll();
        });

    </script>
{/literal}