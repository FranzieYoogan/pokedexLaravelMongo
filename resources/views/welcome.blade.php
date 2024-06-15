<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap"
  rel="stylesheet" />
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/tw-elements/css/tw-elements.min.css" />
<script src="https://cdn.tailwindcss.com/3.3.0"></script>
<script>
  tailwind.config = {
    darkMode: "class",
    theme: {
      fontFamily: {
        sans: ["Roboto", "sans-serif"],
        body: ["Roboto", "sans-serif"],
        mono: ["ui-monospace", "monospace"],
      },
    },
    corePlugins: {
      preflight: false,
    },
  };
</script>

<link rel="stylesheet" href="{{asset('/css/login.css')}}">

    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50" onload="loginLoad()">

    @include('header')

    @if(isset($error))
            <div style="position: relative; display: flex; justify-content: center;">

            <img class="errorStyle" src="{{asset('/gifs/error.gif')}}" alt="">

            </div>

            <script>

                setTimeout(() => {
                    window.location.href = "/"
                }, 2000);

            </script>

    @endif


    @if(isset($ok))

<div style="position: relative; display: flex; justify-content: center;">

<img class="errorStyle" src="{{asset('/gifs/ok.gif')}}" alt="">

</div>

<script>

setTimeout(() => {
    window.location.href = "/dashboard"
}, 2000);

</script>

@endif

    <section class="h-screen">
  <div class="h-full">
    <!-- Left column container with background-->
    <div
      class="flex h-full flex-wrap items-center justify-center lg:justify-between">
      
      <div
        class="shrink-1 mb-12 grow-0 basis-auto md:mb-0 md:w-9/12 md:shrink-0 lg:w-6/12 xl:w-6/12">
        
        <img
          src="{{asset('wallpaper/red.jpg')}}"
          class="imgStyle w-full"
          alt="Sample image" />
      </div>

      <!-- Right column container -->
      <div class="mb-12 md:mb-0 md:w-8/12 lg:w-5/12 xl:w-5/12">
        <form method="POST" action="/">
        @csrf
            
       
          <!-- Email input -->
          <div class="relative mb-6" data-twe-input-wrapper-init>
            <input
              type="email"
              class="peer block min-h-[auto] w-full "
              id="email" name="email" required
              />
            <label
              for="email"
              class="labelStyle"
              id="labelEmail"
              >Email address
            </label>
          </div>

          <!-- Password input -->
          <div class="relative mb-6" data-twe-input-wrapper-init>
            <input
              type="password"
              class="peer block min-h-[auto] w-full "
              id="password" name="password" required
              />
            <label
              for="password"
              class="labelStyle"
              id="labelPassword"
              >Password
            </label>
          </div>

          <div class="mb-6 flex items-center justify-between">
        

            <!--Forgot password link-->
            <a href="#!" class="forgotStyle">Forgot password?</a>
          </div>

          <!-- Login button -->
          <div class="text-center lg:text-left">
            <button
              type="submit"
              class="inline-block w-full rounded bg-primary px-7 pb-2 pt-3 text-sm font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
              data-twe-ripple-init
              data-twe-ripple-color="light">
              Login
            </button>

            <!-- Register link -->
            <p class="mb-0 mt-2 pt-1 text-sm font-semibold">
              Don't have an account?
              <a
                href="#!"
                class="registerStyle text-danger transition duration-150 ease-in-out hover:text-danger-600 focus:text-danger-600 active:text-danger-700"
                >Register</a
              >
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>


    </body>
</html>


<script>

    function loginLoad() {

        const email = document.getElementById('email')
        const password = document.getElementById('password')

    email.addEventListener('input', (event) => {

        if(event.target.value) {

            document.getElementById('labelEmail').style.bottom = "2.5em"
            document.getElementById('labelEmail').style.color = "red"
            document.getElementById('email').style.border = "1px solid red"
            document.getElementById('email').style.boxShadow = "0px 0px 4px 0px red"
            document.getElementById('labelEmail').style.fontSize = "10px"

        } else {
            document.getElementById('labelEmail').style.bottom = "0.6em"
            document.getElementById('email').style.boxShadow = "0px 0px 4px 0px transparent"
            document.getElementById('labelEmail').style.color = "black"
            document.getElementById('email').style.border = "1px solid black"
            document.getElementById('labelEmail').style.fontSize = "15px"

        }

    })

    password.addEventListener('input', (event) => {

if(event.target.value) {

    document.getElementById('labelPassword').style.bottom = "2.5em"
    document.getElementById('labelPassword').style.color = "red"
    document.getElementById('password').style.border = "1px solid red"
    document.getElementById('password').style.boxShadow = "0px 0px 4px 0px red"
    document.getElementById('labelPassword').style.fontSize = "10px"

} else {
    document.getElementById('labelPassword').style.bottom = "0.6em"
    document.getElementById('password').style.boxShadow = "0px 0px 4px 0px transparent"
    document.getElementById('labelPassword').style.color = "black"
    document.getElementById('password').style.border = "1px solid black"
    document.getElementById('labelPassword').style.fontSize = "15px"

}

})
        

    }
    
</script>