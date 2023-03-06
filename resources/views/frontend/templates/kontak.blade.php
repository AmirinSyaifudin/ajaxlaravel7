@extends('frontend.templates.eshopper')

@section('content')

<div id="contact-page" class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="contact-form">
                    <h2 class="title text-center">Google Maps</h2>
                    <div class="status alert alert-success" style="display: none"></div>
                    <form id="main-contact-form" class="contact-form row" name="contact-form" method="post">

                    <div class="col-md-12">
                        <style type="text/css" media="screen">
                            iframe {
                            width: 100%;
                            height: auto;
                            max-height: 400px;
                            }
                        </style>
                        <div class="kotak" style="border:solid 3px #eee; padding: 10px; border-radius: 5px; background-color: #F5F5F5;">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7930.3386078467065!2d106.82893243028725!3d-6.372131203377098!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ed5d166b756d%3A0x41d8cdc14c819774!2sDepok%20Town%20Square!5e0!3m2!1sen!2sid!4v1579565022446!5m2!1sen!2sid" width="600" height="600" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                            {{--  <iframe src="https://www.google.com/maps/place/Pati,+Kec.+Pati,+Kabupaten+Pati,+Jawa+Tengah/@-6.7566196,111.0376266,17z/data=!4m5!3m4!1s0x2e70d2e4706da60d:0x4027a76e352f270!8m2!3d-6.7486733!4d111.0379232" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>      --}}
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contact-info">
                    <h2 class="title text-center">Kontak Kami</h2>
                    <address>
                        <p></p>
                        <p>Ds. Sukolilo, RT /RW = 04 /08, Kec. Sukolilo Kab. PATI, JAWA TENGAH INDONESIA</p>
                        <p>Mobile: 081222213401</>
                        <p>Email: amirinsyaifudin6@gmail.com</>
                    </address>
                    <div class="social-networks">
                        <h2 class="title text-center">Social Networking</h2>
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
