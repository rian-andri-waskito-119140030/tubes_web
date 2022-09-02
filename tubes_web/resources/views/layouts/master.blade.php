<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets')}}/css/layout.css">
    <link rel="icon" href="https://w7.pngwing.com/pngs/683/766/png-transparent-computer-icons-livechat-online-chat-desktop-others-miscellaneous-angle-text.png" type="image/x-icon" />
    <title>SIMPLE LAPOR</title>
</head>

<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 center ">
                    <a href="{{route('report.index')}}">
                        <h1>SIMPLE LAPOR!</h1>
                    </a>
                </div>
            </div>

            @yield('content')

        </div>
    </section>
</body>
<script src="{{asset('assets')}}/js/layout.js"></script>

</html>