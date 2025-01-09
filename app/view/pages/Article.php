<?php

require_once __DIR__."/../../../vendor/autoload.php";

use App\Controllers\ArticlesController;

$rows = ArticlesController::getPublishedArticle();
$row = ArticlesController::getArticleById();
// var_dump($ss);
// session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/f01941449c.js" crossorigin="anonymous"></script>
    <title>Article</title>
</head>


<body class="bg-white font-sans flex-col justify-center items-center  leading-normal tracking-normal">

    <!--Nav-->
    <header id="header" class="bg-white z-10 top-0  animated">
        <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex-1 md:flex md:items-center md:gap-12">
                    <a class="block text-teal-600" href="#">
                        <span class="sr-only">Home</span>
                        <svg class="h-8" viewBox="0 0 28 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0.41 10.3847C1.14777 7.4194 2.85643 4.7861 5.2639 2.90424C7.6714 1.02234 10.6393 0 13.695 0C16.7507 0 19.7186 1.02234 22.1261 2.90424C24.5336 4.7861 26.2422 7.4194 26.98 10.3847H25.78C23.7557 10.3549 21.7729 10.9599 20.11 12.1147C20.014 12.1842 19.9138 12.2477 19.81 12.3047H19.67C19.5662 12.2477 19.466 12.1842 19.37 12.1147C17.6924 10.9866 15.7166 10.3841 13.695 10.3841C11.6734 10.3841 9.6976 10.9866 8.02 12.1147C7.924 12.1842 7.8238 12.2477 7.72 12.3047H7.58C7.4762 12.2477 7.376 12.1842 7.28 12.1147C5.6171 10.9599 3.6343 10.3549 1.61 10.3847H0.41ZM23.62 16.6547C24.236 16.175 24.9995 15.924 25.78 15.9447H27.39V12.7347H25.78C24.4052 12.7181 23.0619 13.146 21.95 13.9547C21.3243 14.416 20.5674 14.6649 19.79 14.6649C19.0126 14.6649 18.2557 14.416 17.63 13.9547C16.4899 13.1611 15.1341 12.7356 13.745 12.7356C12.3559 12.7356 11.0001 13.1611 9.86 13.9547C9.2343 14.416 8.4774 14.6649 7.7 14.6649C6.9226 14.6649 6.1657 14.416 5.54 13.9547C4.4144 13.1356 3.0518 12.7072 1.66 12.7347H0V15.9447H1.61C2.39051 15.924 3.154 16.175 3.77 16.6547C4.908 17.4489 6.2623 17.8747 7.65 17.8747C9.0377 17.8747 10.392 17.4489 11.53 16.6547C12.1468 16.1765 12.9097 15.9257 13.69 15.9447C14.4708 15.9223 15.2348 16.1735 15.85 16.6547C16.9901 17.4484 18.3459 17.8738 19.735 17.8738C21.1241 17.8738 22.4799 17.4484 23.62 16.6547ZM23.62 22.3947C24.236 21.915 24.9995 21.664 25.78 21.6847H27.39V18.4747H25.78C24.4052 18.4581 23.0619 18.886 21.95 19.6947C21.3243 20.156 20.5674 20.4049 19.79 20.4049C19.0126 20.4049 18.2557 20.156 17.63 19.6947C16.4899 18.9011 15.1341 18.4757 13.745 18.4757C12.3559 18.4757 11.0001 18.9011 9.86 19.6947C9.2343 20.156 8.4774 20.4049 7.7 20.4049C6.9226 20.4049 6.1657 20.156 5.54 19.6947C4.4144 18.8757 3.0518 18.4472 1.66 18.4747H0V21.6847H1.61C2.39051 21.664 3.154 21.915 3.77 22.3947C4.908 23.1889 6.2623 23.6147 7.65 23.6147C9.0377 23.6147 10.392 23.1889 11.53 22.3947C12.1468 21.9165 12.9097 21.6657 13.69 21.6847C14.4708 21.6623 15.2348 21.9135 15.85 22.3947C16.9901 23.1884 18.3459 23.6138 19.735 23.6138C21.1241 23.6138 22.4799 23.1884 23.62 22.3947Z"
                                fill="currentColor" />
                        </svg>
                        DivoBlog
                    </a>
                </div>

                <div class="md:flex md:items-center md:gap-12">
                    <nav aria-label="Global" class="hidden md:block">
                        <ul class="flex items-center gap-6 text-sm">
                            <li>
                                <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> About </a>
                            </li>

                            <li>
                                <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> History </a>
                            </li>

                            <li>
                                <a class="text-gray-500 transition hover:text-gray-500/75" href="blog.php"> Blog </a>
                            </li>
                        </ul>
                    </nav>

                    <div class="flex items-center gap-4">
                        <div class="sm:flex sm:gap-4">
                            <a class="rounded-md bg-teal-600 px-5 py-2.5 text-sm font-medium text-white shadow"
                                href="../Authentifcation/login.php">
                                Login
                            </a>
                            <div class="hidden sm:flex">
                                <a class="rounded-md bg-gray-100 px-5 py-2.5 text-sm font-medium text-teal-600"
                                    href="../Authentifcation/register.php">
                                    Register
                                </a>
                            </div>
                        </div>
                        <div class="flex-shrink-0">
                            <button>
                                <img class="w-10 h-10 rounded-full mr-4" src="https://tailwindcss.com/img/jonathan.jpg"
                                    alt="Avatar of Jonathan Reinink">
                            </button>
                        </div>
                    </div>


                    <div class="block md:hidden">
                        <button class="rounded bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </header>

    <main>
        <!--Title-->
        <div class="text-center pt-10 md:pt-10">
            <p class="text-sm md:text-base text-[#009b92] font-bold"><?php echo $row['scheduled_date']?> <span
                    class="text-gray-900">/</span> GETTING STARTED</p>
            <h1 class="font-bold break-normal text-3xl md:text-5xl"><?php echo $row['title']?></h1>
        </div>

        <!--image-->
        <div class="container w-full max-w-6xl mx-auto bg-white bg-cover mt-8 mb-10 rounded" style=" height: 75vh" ;>
            <img src="../../asset/uploads/Articles/<?php echo $row['featured_image']?>" alt="art"
                class=" h-[27rem] w-[72rem]"></div>

        <!--Container-->
        <div class="container max-w-5xl mx-auto mt-[1rem]">

            <div class="mx-0 sm:mx-6">

                <div class="bg-white w-full p-8 md:p-24 text-xl md:text-2xl text-gray-800 leading-normal"
                    style="font-family:Georgia,serif;">

                    <!--Lead Para-->
                    <h1 class="font-bold break-normal text-2xl md:text-5xl"><?php echo $row['content']?></h1>

                    <p class="py-6">The basic blog page layout is available and all using the default Tailwind CSS
                        classes (although there are a few hardcoded style tags). If you are going to use this in your
                        project, you will want to convert the classes into components.</p>

                    <p class="py-6">Sed dignissim lectus ut tincidunt vulputate. Fusce tincidunt lacus purus, in mattis
                        tortor sollicitudin pretium. Phasellus at diam posuere, scelerisque nisl sit amet, tincidunt
                        urna. Cras nisi diam, pulvinar ut molestie eget, eleifend ac magna. Sed at lorem condimentum,
                        dignissim lorem eu, blandit massa. Phasellus eleifend turpis vel erat bibendum scelerisque.
                        Maecenas id risus dictum, rhoncus odio vitae, maximus purus. Etiam efficitur dolor in dolor
                        molestie ornare. Aenean pulvinar diam nec neque tincidunt, vitae molestie quam fermentum. Donec
                        ac pretium diam. Suspendisse sed odio risus. Nunc nec luctus nisi. Class aptent taciti sociosqu
                        ad litora torquent per conubia nostra, per inceptos himenaeos. Duis nec nulla eget sem dictum
                        elementum.</p>

                    <ol>
                        <li class="py-3">Maecenas accumsan lacus sit amet elementum porta. Aliquam eu libero lectus.
                            Fusce vehicula dictum mi. In non dolor at sem ullamcorper venenatis ut sed dui. Ut ut est
                            quam. Suspendisse quam quam, commodo sit amet placerat in, interdum a ipsum. Morbi sit amet
                            tellus scelerisque tortor semper posuere.</li>
                        <li class="py-3">Morbi varius posuere blandit. Praesent gravida bibendum neque eget commodo.
                            Duis auctor ornare mauris, eu accumsan odio viverra in. Proin sagittis maximus pharetra.
                            Nullam lorem mauris, faucibus ut odio tempus, ultrices aliquet ex. Nam id quam eget ipsum
                            luctus hendrerit. Ut eros magna, eleifend ac ornare vulputate, pretium nec felis.</li>
                        <li class="py-3">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere
                            cubilia Curae; Nunc vitae pretium elit. Cras leo mauris, tristique in risus ac, tristique
                            rutrum velit. Mauris accumsan tempor felis vitae gravida. Cras egestas convallis malesuada.
                            Etiam ac ante id tortor vulputate pretium. Maecenas vel sapien suscipit, elementum odio et,
                            consequat tellus.</li>
                    </ol>
                </div>


                <!--Subscribe-->
                <div class="container font-sans bg-green-100 rounded mt-8 p-4 md:p-24 text-center">
                    <h2 class="font-bold break-normal text-2xl md:text-4xl">Subscribe to Ghostwind CSS</h2>
                    <h3 class="font-bold break-normal font-normal text-gray-600 text-base md:text-xl">Get the latest
                        posts delivered right to your inbox</h3>
                    <div class="w-full text-center pt-4">
                        <form action="#">
                            <div class="max-w-sm mx-auto p-1 pr-0 flex flex-wrap items-center">
                                <input type="email" placeholder="youremail@example.com"
                                    class="flex-1 appearance-none rounded shadow p-3 text-gray-600 mr-2 focus:outline-none">
                                <button type="submit"
                                    class="flex-1 mt-4 md:mt-0 block md:inline-block appearance-none bg-green-500 text-white text-base font-semibold tracking-wider uppercase py-4 rounded shadow hover:bg-green-400">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /Subscribe-->
                <!--Author-->
                <div class="flex w-full items-center font-sans p-8 md:p-24">
                    <img class="w-10 h-10 rounded-full mr-4" src="http://i.pravatar.cc/300" alt="Avatar of Author">
                    <div class="flex-1">
                        <p class="text-base font-bold text-base md:text-xl leading-none">Ghostwind CSS</p>
                        <p class="text-gray-600 text-xs md:text-base">Tailwind CSS version of Ghost's Casper theme by <a
                                class="text-gray-800 hover:text-green-500 no-underline border-b-2 border-green-500"
                                href="https://www.tailwindtoolbox.com">TailwindToolbox.com</a></p>
                    </div>
                    <!--/Author-->
                </div>
            </div>
        </div>

        <div class="bg-gray-200">

            <div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">

                <div class="relative z-10 flex flex-col justify-center items-center h-full text-center">
                    <p class="text-4xl font-bold leading-tight mb-12">Latest Articles Added</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 gap-10">

                    <?php foreach($rows as $row): ?>
                        
                     <div class="border-r border-b border-l border-gray-400 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r flex flex-col justify-between leading-normal">
                        <a href="app/view/pages/blog.php">
                            <img src="../../asset/uploads/Articles/<?php echo $row['featured_image']?>" alt="Player Image"
                                class="w-full h-[16rem] mb-3">
                            <div class="p-4 pt-2">
                                <div class="mb-8">
                                    <p class="text-sm text-gray-600 flex items-center">
                                        <svg class="fill-current text-gray-500 w-3 h-3 mr-2"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path
                                                d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z">
                                            </path>
                                        </svg>
                                        Members only
                                    </p>
                                    <a href="#"
                                        class="text-gray-900 font-bold text-lg mb-2 hover:text-indigo-600 inline-block">
                                        <?= $row['title'] ?>
                                    </a>
                                    <p class="text-gray-700 text-sm"><?= $row['content'] ?> / Lorem ipsum dolor sit
                                        amet,consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem
                                        praesentium nihil.</p>
                                </div>
                                <div class="flex items-center">
                                    <a href="#"><img class="w-10 h-10 rounded-full mr-4"
                                            src="https://tailwindcss.com/img/jonathan.jpg"
                                            alt="Avatar of Jonathan Reinink"></a>
                                    <div class="text-sm">
                                        <a href="#"
                                            class="text-gray-900 font-semibold leading-none hover:text-indigo-600"><?= $row['username'] ?>
                                        </a>
                                        <p class="text-gray-600"><?= $row['created_at'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                     </div>
                    <?php endforeach ?>
                 </div>
            </div>
        </div>
    </main>

    <footer class="bg-gray-900">
        <div class="container max-w-6xl mx-auto flex items-center px-2 py-8">

            <div class="w-full mx-auto flex flex-wrap items-center">
                <div class="flex w-full md:w-1/2 justify-center md:justify-start text-white font-extrabold">
                    <a class="text-gray-900 no-underline hover:text-gray-900 hover:no-underline" href="#">
                        <span class="text-base text-gray-200">Ghostwind</span>
                    </a>
                </div>
                <div class="flex w-full pt-2 content-center justify-between md:w-1/2 md:justify-end">
                    <ul class="list-reset flex justify-center flex-1 md:flex-none items-center">
                        <li>
                            <a class="inline-block py-2 px-3 text-white no-underline" href="index.html">HOME</a>
                        </li>
                        <li>
                            <a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:underline py-2 px-3"
                                href="#">link</a>
                        </li>
                        <li>
                            <a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:underline py-2 px-3"
                                href="#">link</a>
                        </li>
                        <li>
                            <a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:underline py-2 px-3"
                                href="#">link</a>
                        </li>
                    </ul>
                </div>
            </div>



        </div>
    </footer>

    <script>
    /* Progress bar */
    //Source: https://alligator.io/js/progress-bar-javascript-css-variables/
    var h = document.documentElement,
        b = document.body,
        st = 'scrollTop',
        sh = 'scrollHeight',
        progress = document.querySelector('#progress'),
        scroll;
    var scrollpos = window.scrollY;
    var header = document.getElementById("header");

    document.addEventListener('scroll', function() {

        /*Refresh scroll % width*/
        scroll = (h[st] || b[st]) / ((h[sh] || b[sh]) - h.clientHeight) * 100;
        progress.style.setProperty('--scroll', scroll + '%');

        /*Apply classes for slide in bar*/
        scrollpos = window.scrollY;

        if (scrollpos > 100) {
            header.classList.remove("hidden");
            header.classList.remove("fadeOutUp");
            header.classList.add("slideInDown");
        } else {
            header.classList.remove("slideInDown");
            header.classList.add("fadeOutUp");
            header.classList.add("hidden");
        }

    });

    // scroll to top	
    const t = document.querySelector(".js-scroll-top");
    if (t) {
        t.onclick = () => {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            })
        };
        const e = document.querySelector(".scroll-top path"),
            o = e.getTotalLength();
        e.style.transition = e.style.WebkitTransition = "none", e.style.strokeDasharray = `${o} ${o}`, e.style
            .strokeDashoffset = o, e.getBoundingClientRect(), e.style.transition = e.style.WebkitTransition =
            "stroke-dashoffset 10ms linear";
        const n = function() {
            const t = window.scrollY || window.scrollTopBtn || document.documentElement.scrollTopBtn,
                n = Math.max(document.body.scrollHeight, document.documentElement.scrollHeight, document.body
                    .offsetHeight, document.documentElement.offsetHeight, document.body.clientHeight, document
                    .documentElement.clientHeight),
                s = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
            var l = o - t * o / (n - s);
            e.style.strokeDashoffset = l
        };
        n();
        const s = 100;
        window.addEventListener("scroll", (function(e) {
            n();
            (window.scrollY || window.scrollTopBtn || document.getElementsByTagName("html")[0]
                .scrollTopBtn) > s ? t.classList.add("is-active") : t.classList.remove("is-active")
        }), !1)
    }
    </script>

</body>

</html>