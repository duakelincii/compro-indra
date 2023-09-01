<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $setting->nama_web }}</title>
    <link href="{{ asset('front/css/style.css') }}" rel="stylesheet" />
</head>
<style>
    /* general styling */
    :root {
        --smaller: .75;
    }

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    html,
    body {
        height: 100%;
        margin: 0;
    }

    body {
        align-items: center;
        /* background-color: #00AFAA; */
        background-image: url("../front/images/background-nanomist.jpg");
        display: flex;
        font-family: -apple-system,
            BlinkMacSystemFont,
            "Segoe UI",
            Roboto,
            Oxygen-Sans,
            Ubuntu,
            Cantarell,
            "Helvetica Neue",
            sans-serif;
    }

    .container {
        color: #333;
        margin: 0 auto;
        text-align: center;
    }

    h1 {
        font-weight: normal;
        letter-spacing: .125rem;
        text-transform: uppercase;
    }

    li {
        display: inline-block;
        font-size: 1.5em;
        list-style-type: none;
        padding: 1em;
        text-transform: uppercase;
    }

    li span {
        display: block;
        font-size: 4.5rem;
    }

    .emoji {
        display: none;
        padding: 1rem;
    }

    .emoji span {
        font-size: 4rem;
        padding: 0 .5rem;
    }

    @media all and (max-width: 768px) {
        h1 {
            font-size: calc(1.5rem * var(--smaller));
        }

        li {
            font-size: calc(1.125rem * var(--smaller));
        }

        li span {
            font-size: calc(3.375rem * var(--smaller));
        }
    }
</style>

<body>
    <div class="container">
        <div class="row">
            <h1 id="headline">Countdown to <br>{{ $setting->nama_web }}</h1>
            <div id="countdown">
                <ul>
                    <li><span id="days"></span>days</li>
                    <li><span id="hours"></span>Hours</li>
                    <li><span id="minutes"></span>Minutes</li>
                    <li><span id="seconds"></span>Seconds</li>
                </ul>
            </div>
            <div id="content" class="emoji">
                <span>🥳</span>
                <span>🎉</span>
                <span>🎂</span>
            </div>
        </div>

        {{-- <section class="py-5 layout_padding">
            <div class="container px-5">
                <h2 class="heading_container heading_center">{{ $setting->nama_web }} <span>Tiktok Videos</span></h2>
                <div class="row gx-5">
                    @if (!empty($tiktok))
                        @foreach ($tiktok as $data)
                            <div class="col-lg-4 mb-5">
                                <blockquote style="max-height: 500px;max-width: 605px;min-width: 325px;"
                                    class="tiktok-embed" cite="https://www.tiktok.com/video/{{ $data->tiktok_id }}"
                                    data-video-id="{{ $data->tiktok_id }}">
                                    <section> <a target="_blank" href="https://www.tiktok.com/?refer=embed"> </a>
                                    </section>
                                </blockquote>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section> --}}
        <!-- about section -->
    </div>
</body>
<script async src="https://www.tiktok.com/embed.js"></script>
<script>
    (function() {
        const second = 1000,
            minute = second * 60,
            hour = minute * 60,
            day = hour * 24;

        //I'm adding this section so I don't have to keep updating this pen every year :-)
        //remove this if you don't need it
        let today = new Date(),
            dd = String(today.getDate()).padStart(2, "0"),
            mm = String(today.getMonth() + 1).padStart(2, "0"),
            yyyy = today.getFullYear(),
            nextYear = yyyy + 1,
            dayMonth = "09/30/",
            birthday = dayMonth + yyyy;

        today = mm + "/" + dd + "/" + yyyy;
        if (today > birthday) {
            birthday = dayMonth + nextYear;
        }
        //end

        const countDown = new Date(birthday).getTime(),
            x = setInterval(function() {

                const now = new Date().getTime(),
                    distance = countDown - now;

                document.getElementById("days").innerText = Math.floor(distance / (day)),
                    document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
                    document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
                    document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);

                //do something later when date is reached
                if (distance < 0) {
                    document.getElementById("headline").innerText = "It's my birthday!";
                    document.getElementById("countdown").style.display = "none";
                    document.getElementById("content").style.display = "block";
                    clearInterval(x);
                }
                //seconds
            }, 0)
    }());
</script>

</html>
