<!doctype html>
<html data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>

<body class="font-poppins container m-auto px-5 lg:px-32">
    @include('includes.header')
    <main class="px-5">
        <div class="hero bg-slate-400">
            <div class="hero-content py-10">
                <div class="card shadow-2xl bg-emerald-200 shadow-lime-300 py-5">
                    <form class="card-body py-3" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="">
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Email</span>
                                </label>
                                <input id="email" type="email"
                                    class="input input-bordered @error('email') is-invalid @enderror" name="email"
                                    placeholder="Entire Email" value="{{ old('email') }}" required
                                    autocomplete="email" autofocus>
                            </div>
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Password</span>
                                </label>
                                <input id="password" type="password"
                                    class="input input-bordered @error('password') is-invalid @enderror"
                                    name="password" placeholder="Password" required autocomplete="current-password">
                            </div>
                            @error('email')
                                <strong class="text-red-600">{{ $message }}</strong>
                            @enderror
                            @error('password')
                                <strong class="text-red-600">{{ $message }}</strong>
                            @enderror
                        </div>


                        <label class="label">
                            <a href="#" class="label-text-alt link link-hover">Forgot password?</a>
                        </label>
                        <div class="form-control mt-6">
                            <button class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>
