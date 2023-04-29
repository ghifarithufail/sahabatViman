<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--My animate CSS-->
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title>VAR</title>

        <link rel="stylesheet" href="{{asset('template\assets/css/main.css')}}">

        <link rel="stylesheet" href="{{asset('template\assets/css/contacts.css')}}">
    </head>
    <body>
        <!-- navbar -->
            @include('front.includes.header')
        <!-- end navbar -->

        <section id="contact" class="contact">
            <!-- Container -->
            <div class="container mt-5 mb-4">
                <div class="contact-us row row-cols-lg-2 row-cols-sm-1 shadow rounded-3">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="row row-cols-2 ">
                            <div class="col text-center"><img src="img/1.png" class="img-fluid text-center text-md-center text-sm-center" alt=""></div>
                            <div class="col text-center"><img src="img/2.png" class="img-fluid text-center text-md-center text-sm-center mt-1" alt=""></div>
                            <div class="col text-center"><img src="img/3.png" class="img-fluid text-center text-md-center text-sm-center" alt=""></div>
                            <div class="col text-center"><img src="img/4.png" class="img-fluid text-center text-md-center text-sm-center mt-1" alt=""></div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-6 m-auto">
                        <div class="map-responsive m-4">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63456.98996356081!2d106.8766916!3d-6.2555795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f36d922448d5%3A0x83736dbd7ef2b25c!2sTebet%20Eco%20Park!5e0!3m2!1sen!2sid!4v1672223308300!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
            @include('front.includes.footer')
        <!-- end Footer -->

        @include('front.includes.js')
        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
    </body>
</html>
