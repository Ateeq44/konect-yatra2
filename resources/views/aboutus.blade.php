@extends('layouts.app')
@section('content')

<main id="content" class="site-main">
    <section class="inner-banner-wrap">
        <div class="inner-baner-container" style="background-image: url(public/assets/images2/g2.jpg); background-position:center;">
            <div class="container">
                <div class="inner-banner-content">
                    <h1 class="inner-title" style="font-size:65px !important;">ABOUT US</h1>
                </div>
            </div>
        </div>
        <div class="inner-shape"></div>
    </section>
    <section class="about-section about-page-section">
        <div class="about-service-wrap">
            <div class="container">
                <div class="section-heading">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <h5 class="dash-style">The mission of Konnect Yatra</h5>
                            <h2>what people say</h2>
                        </div>
                        <div class="col-lg-6">
                            <div class="section-disc">
                                <p>
                                "For optimal engagement, it's crucial to recognize that readers are easily distracted by the readable content on a page. Embrace strategies that captivate and retain attention, ensuring a seamless flow of information for an enriched user experience."</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="client-section">
            <div class="container">
                
                <div class="row align-items-center d-flex">
                    <div class="col-lg-4 col-md-12 heading-bx p-lr">
                        <div class="video-bx">
                            <img src="{{ asset('assets/images2/map-01_2.jpg') }}" class="about_map">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 heading-bx p-lr">
                        <div class="video-bx">
                            <img src="{{ asset('assets/images2/map-02_2.jpg') }}" class="about_map">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 heading-bx p-lr">
                        <div class="video-bx">
                            <img src="{{ asset('assets/images2/YATRA-MAP_3.jpg') }}" class="about_map">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 heading-bx p-lr mt-4">
                        <div class="video-bx">
                            <img src="{{ asset('assets/images2/welcome.png') }}" class="about_map">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 heading-bx p-lr mt-4">
                        <div class="video-bx">
                            <img src="{{ asset('assets/images2/ministry.png') }}" class="about_map">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="client-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="section-heading">
                            <h2 class=" text-center">Register online on <br/> KONNECT-YATRA</h2>
                            <p>The first Gurdwara in the world was built by Guru Nanak in 1521-2 at Kartarpur. There are about 200 Gurdwaras in Britain.</p>

                            <p>The first Gurdwara in the world was built by Guru Nanak in 1521-2 at Kartarpur. There are about 200 Gurdwaras in Britain.

                            The literal meaning of the Punjabi word Gurdwara is 'the residence of the Guru', or 'the door that leads to the Guru'.</p>

                            <p> In a modern Gurdwara, the Guru is not a person but the book of Sikh scriptures called the Guru Granth Sahib.It is the presence of the Guru Granth Sahib that gives the Gurdwara its religious status, so any building containing the book is a Gurdwara.Although a Gurdwara may be called the residence of the Guru (meaning the residence of God), Sikhs believe that God is present everywhere.</p>

                            <p>Before the time of Guru Arjan Dev, the place of Sikh religious activities was known as a Dharamsala, which means place of faith</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</main>

@endsection
