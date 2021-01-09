<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/ico/favicon.ico') }}">
    <link
      rel="apple-touch-icon"
      sizes="76x76"
      href="./assets/img/apple-icon.png"
    />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/gh/creativetimofficial/tailwind-starter-kit/compiled-tailwind.min.css"
    />
    <title>Hotelier Hub</title>
  </head>
  <body class="text-gray-800 antialiased">

    <nav class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 navbar-expand-lg bg-white">
      <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
        <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">
          <!--<img src="{{ asset('images/logo/logo-soh.png') }}" alt="">-->
          <h3 class="text-3xl mb-2 font-semibold leading-normal text-purple-600">
            HOTELIER HUB
          </h3>
          <button class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
            type="button" onclick="toggleNavbar('example-collapse-navbar')">
            <i class="text-gray-800 fas fa-bars"></i>
          </button>
        </div>
        <div class="lg:flex flex-grow items-center bg-white lg:bg-transparent lg:shadow-none hidden" id="example-collapse-navbar">
          <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
            @if (Route::has('login'))
              @auth
                <li class="flex items-center">
                        <a class="lg:text-gray-800 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-md uppercase font-bold"
                            href="{{ url('/home') }}"><span class="inline-block ml-2">Home</span></a>
                    </li>
                    @else
                    <li class="flex items-center">
                        <a class="lg:text-gray-800 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-md uppercase font-bold"
                                href="{{ route('login') }}"><span class="inline-block ml-2">Login</span></a>
                    </li>
                        @if (Route::has('register'))
                        <li class="flex items-center">
                            <a class="lg:text-gray-800 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-md uppercase font-bold"
                                    href="{{ route('register') }}"><span class="inline-block ml-2">Register</span></a>
                        </li>
                        @endif
                    @endauth
                @endif
          </ul>
        </div>
      </div>
    </nav>

    <main>
      <div
        class="relative pt-16 pb-32 flex content-center items-center justify-center"
        style="min-height: 75vh;"
      >
        <div
          class="absolute top-0 w-full h-full bg-center bg-cover"
          style='background-image: url("{{ asset('images/hero.jpg') }}");'
        >
          <span
            id="blackOverlay"
            class="w-full h-full absolute opacity-75 bg-black"
          ></span>
        </div>
        <div class="container relative mx-auto">
          <div class="items-center flex flex-wrap">
            <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
              <div>
                <h1 class="text-white font-semibold text-5xl">
                  STAND OUT HOTELS
                </h1>
                <h1 class="mt-5 text-gray-200 text-3xl">
                  Marketplace for Hoteliers with technology parnerts and more with special rates.
                </h1>
              </div>
            </div>
          </div>
        </div>
        <div
          class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
          style="height: 70px; transform: translateZ(0px);"
        >
          <svg
            class="absolute bottom-0 overflow-hidden"
            xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="none"
            version="1.1"
            viewBox="0 0 2560 100"
            x="0"
            y="0"
          >
            <polygon
              class="text-gray-300 fill-current"
              points="2560 0 2560 100 0 100"
            ></polygon>
          </svg>
        </div>
      </div>
      <section class="pb-20 bg-gray-300 -mt-24">
        <div class="container mx-auto px-4">
          <div class="flex flex-wrap">
            <div class="lg:pt-12 pt-6 w-full md:w-4/12 px-4 text-center">
              <div
                class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg"
              >
                <div class="px-4 py-5 flex-auto">
                  <div
                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-purple-600"
                  >
                    <i class="fas fa-award"></i>
                  </div>
                  <h6 class="text-xl font-semibold">Marketplace for Hoteliers.</h6>
                  <p class="mt-2 mb-4 text-gray-600">
                    Marketplace for Hoteliers with technology parnerts and more with special rates.
                  </p>
                </div>
              </div>
            </div>
            <div class="w-full md:w-4/12 px-4 text-center">
              <div
                class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg"
              >
                <div class="px-4 py-5 flex-auto">
                  <div
                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-purple-600"
                  >
                    <i class="fas fa-retweet"></i>
                  </div>
                  <h6 class="text-xl font-semibold">Hotel Operational App.</h6>
                  <p class="mt-2 mb-4 text-gray-600">
                    The hotel staff work together as one cohesive team instead of in siloed departments. Ensure all requests are met consistently and on time, without radios, paper, pens, or physical contact.
                  </p>
                </div>
              </div>
            </div>
            <div class="pt-6 w-full md:w-4/12 px-4 text-center">
              <div
                class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg"
              >
                <div class="px-4 py-5 flex-auto">
                  <div
                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-purple-600"
                  >
                    <i class="fas fa-fingerprint"></i>
                  </div>
                  <h6 class="text-xl font-semibold">Hotel Guest App.</h6>
                  <p class="mt-2 mb-4 text-gray-600">
                    Enable your hotel to create a contactless guest journey that improves guest communication, safety and cost-efficiency with a hotel guest app.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="flex flex-wrap items-center mt-32">
            <div class="w-full md:w-5/12 px-4 mr-auto ml-auto">
              <div
                class="text-purple-600 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-gray-100"
              >
                <i class="fas fa-user-friends text-xl"></i>
              </div>
              <h3 class="text-3xl mb-2 font-semibold leading-normal">
                MORE GUEST, LESS GUESSES!
              </h3>
              <p
                class="text-lg font-light leading-relaxed mt-4 mb-4 text-gray-700"
              >
              Enable lean hotel staff to do the most impactful work in the most efficient way.
              </p>
              <p
                class="text-lg font-light leading-relaxed mt-0 mb-4 text-gray-700"
              >
              All teams and tasks connected, tracked, understood and optimized...in one place. Increase productivity with smart and efficient task distribution and management.
              </p>
              <a
                href="#"
                class="font-bold text-gray-800 mt-8"
                >Get Organized & Efficient.</a
              >
            </div>
            <div class="w-full md:w-4/12 px-4 mr-auto ml-auto">
              <div
                class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-lg bg-purple-600"
              >
                <img
                  alt="..."
                  src="{{ asset('images/1.jpg') }}"
                  class="w-full align-middle rounded-t-lg"
                />
                <blockquote class="relative p-8 mb-4">
                  <svg
                    preserveAspectRatio="none"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 583 95"
                    class="absolute left-0 w-full block"
                    style="height: 95px; top: -94px;"
                  >
                    <polygon
                      points="-30,95 583,95 583,65"
                      class="text-purple-600 fill-current"
                    ></polygon>
                  </svg>
                  <h4 class="text-xl font-bold text-white">
                    Lorem, ipsum dolor.
                  </h4>
                  <p class="text-md font-light mt-2 text-white">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat sequi recusandae deleniti soluta illum cupiditate ullam dolores repudiandae eveniet sit?
                  </p>
                </blockquote>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="relative py-20">
        <div
          class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
          style="height: 80px; transform: translateZ(0px);"
        >
          <svg
            class="absolute bottom-0 overflow-hidden"
            xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="none"
            version="1.1"
            viewBox="0 0 2560 100"
            x="0"
            y="0"
          >
            <polygon
              class="text-white fill-current"
              points="2560 0 2560 100 0 100"
            ></polygon>
          </svg>
        </div>
        <div class="container mx-auto px-4">
          <div class="items-center flex flex-wrap">
            <div class="w-full md:w-4/12 ml-auto mr-auto px-4">
              <img
                alt="..."
                class="max-w-full rounded-lg shadow-lg"
                src="{{ asset('images/2.jpg') }}"
              />
            </div>
            <div class="w-full md:w-5/12 ml-auto mr-auto px-4">
              <div class="md:pr-12">
                <div
                  class="text-purple-600 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-purple-300"
                >
                  <i class="fas fa-rocket text-xl"></i>
                </div>
                <h3 class="text-3xl font-semibold">MORE DONE LESS WAIT!</h3>
                <p class="mt-4 text-lg leading-relaxed text-gray-600">
                  Enable your housekeeping department to be in constant communication with mobile functionality for all users to send and receive requests from each department, wherever they are on property. With hotel housekeeping management integrated into your hotel’s PMS, gain instant insight into room status.
                </p>
                <ul class="list-none mt-6">
                  <li class="py-2">
                    <div class="flex items-center">
                      <div>
                        <span
                          class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-purple-600 bg-purple-200 mr-3"
                          ><i class="fas fa-fingerprint"></i
                        ></span>
                      </div>
                      <div>
                        <h4 class="text-gray-600">
                          Lorem, ipsum dolor.
                        </h4>
                      </div>
                    </div>
                  </li>
                  <li class="py-2">
                    <div class="flex items-center">
                      <div>
                        <span
                          class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-purple-600 bg-purple-200 mr-3"
                          ><i class="fab fa-html5"></i
                        ></span>
                      </div>
                      <div>
                        <h4 class="text-gray-600">Lorem, ipsum dolor.</h4>
                      </div>
                    </div>
                  </li>
                  <li class="py-2">
                    <div class="flex items-center">
                      <div>
                        <span
                          class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-purple-600 bg-purple-200 mr-3"
                          ><i class="far fa-paper-plane"></i
                        ></span>
                      </div>
                      <div>
                        <h4 class="text-gray-600">Lorem, ipsum.</h4>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <footer class="relative bg-gray-300 pt-8 pb-6">
      <div
        class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
        style="height: 80px; transform: translateZ(0px);"
      >
        <svg
          class="absolute bottom-0 overflow-hidden"
          xmlns="http://www.w3.org/2000/svg"
          preserveAspectRatio="none"
          version="1.1"
          viewBox="0 0 2560 100"
          x="0"
          y="0"
        >
          <polygon
            class="text-gray-300 fill-current"
            points="2560 0 2560 100 0 100"
          ></polygon>
        </svg>
      </div>
      <div class="container mx-auto px-4">
        <div class="flex flex-wrap">
          <div class="w-full lg:w-6/12 px-4">
            <h4 class="text-3xl font-semibold">Lorem ipsum dolor sit.</h4>
            <h5 class="text-lg mt-0 mb-2 text-gray-700">
              Lorem ipsum dolor sit amet, consectetur adipisicing.
            </h5>
            <div class="mt-6">
              <button
                class="bg-white text-blue-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
                type="button"
              >
                <i class="flex fab fa-twitter"></i></button
              ><button
                class="bg-white text-blue-600 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
                type="button"
              >
                <i class="flex fab fa-facebook-square"></i></button
              >
            </div>
          </div>
          <div class="w-full lg:w-6/12 px-4">
            <div class="flex flex-wrap items-top mb-6">
              <div class="w-full lg:w-4/12 px-4 ml-auto">
                <span
                  class="block uppercase text-gray-600 text-sm font-semibold mb-2"
                  >Useful Links</span
                >
                <ul class="list-unstyled">
                  <li>
                    <a
                      class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                      href="#"
                      >About Us</a
                    >
                  </li>
                  <li>
                    <a
                      class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                      href="#"
                      >Blog</a
                    >
                  </li>
                  <li>
                    <a
                      class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                      href="#"
                      >Github</a
                    >
                  </li>
                  <li>
                    <a
                      class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                      href="#"
                      >Free Products</a
                    >
                  </li>
                </ul>
              </div>
              <div class="w-full lg:w-4/12 px-4">
                <span
                  class="block uppercase text-gray-600 text-sm font-semibold mb-2"
                  >Other Resources</span
                >
                <ul class="list-unstyled">
                  <li>
                    <a
                      class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                      href="#"
                      >MIT License</a
                    >
                  </li>
                  <li>
                    <a
                      class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                      href="#"
                      >Terms &amp; Conditions</a
                    >
                  </li>
                  <li>
                    <a
                      class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                      href="#"
                      >Privacy Policy</a
                    >
                  </li>
                  <li>
                    <a
                      class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                      href="#"
                      >Contact Us</a
                    >
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <hr class="my-6 border-gray-400" />
        <div
          class="flex flex-wrap items-center md:justify-between justify-center"
        >
          <div class="w-full md:w-4/12 px-4 mx-auto text-center">
            <div class="text-sm text-gray-600 font-semibold py-1">
              Copyright © 2020
            </div>
          </div>
        </div>
      </div>
    </footer>
  </body>
  <script>
    function toggleNavbar(collapseID) {
      document.getElementById(collapseID).classList.toggle("hidden");
      document.getElementById(collapseID).classList.toggle("block");
    }
  </script>
</html>
