<div>
    <style>
        a {
            margin-right: 10px;
        }
    </style>
    <div>
        <a href="{{url('/')}}" class="btn">Default</a>
        <a href="{{url('/home')}}" class="btn">Home</a>
        <a href="{{url('/contact')}}" class="btn">Contact</a>
        <a href="{{url('/about')}}" class="btn"> About Us</a>
    </div>
    <script>
        // Custom Navigation without page reload.....Using history push state!!
        buttons = document.querySelectorAll('.btn');
        document.addEventListener('click', function(e) {
            if (e.target.className == "btn") {
                e.preventDefault();
                let request = e.target.href;
                fetch(request, {
                    method: "GET"
                }).then((res) => {
                    return res.text();
                }).then((text) => {
                    document.getElementsByTagName('html')[0].innerHTML = text;
                    window.history.pushState(request, '', request);
                });
            }
        });
        window.addEventListener("popstate", function(e) {
            e.preventDefault();
            let request = location.href;
            fetch(request, {
                    method: "GET"
                }).then((res) => {
                    return res.text();
                }).then((text) => {
                    document.getElementsByTagName('html')[0].innerHTML = text;
                });
        });
    </script>
</div>