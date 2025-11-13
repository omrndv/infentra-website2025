<div class="container">
    <div class="grid-container mb-4">
        <div>
            <img src="{{ asset('images/KAMPUS.png') }}" alt="Telkom University" />
        </div>
        <div>
            <img src="{{ asset('images/IF.png') }}" alt="Informatika" />
        </div>
        <div>
            <img src="{{ asset('images/HMIF.png') }}" alt="HMIF" />
        </div>
    </div>

    <div class="text-center mb-4">
        <div class="infentra-title-wrapper">
            <h1 class="infentra-title">
                <span class="infentra-main">INFENTRA</span>
                <span class="infentra-year">2025</span>
            </h1>
        </div>
        <div class="infentra-description">
            <p class="infentra-subtitle">INFORMATICS EVENT & KARYA</p>
            <p class="infentra-tagline">{{ $appSettings['heading'] }}</p>
        </div>
    </div>

    <div class="banner banner-pixel">
        <img src="{{ asset('images/banner.png') }}" alt="Coming Soon" class="banner-image" />
    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Jersey+25&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

    .grid-container {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
        align-items: center;
        max-width: 800px;
        margin: 0 auto;
        padding: 2rem 0;
    }

    .logo img {
        width: 100%;
        max-width: 150px;
        height: auto;
        display: block;
        margin: 0 auto;
    }

    .infentra-title-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 1rem;
    }

    .infentra-title {
        display: flex;
        align-items: center;
        gap: 0;
        font-family: 'Arial Black', 'Impact', sans-serif;
        font-weight: 900;
        letter-spacing: 0.05em;
        margin: 0;
        line-height: 1;
    }

    .infentra-main {
        font-size: 9.5rem;
        color: #1a1a1a;
        display: inline-block;
        letter-spacing: 0.1em;
        font-family: 'Jersey 25', sans-serif;
    }

    .infentra-year {
        font-size: 50px;
        color: #076FB8;
        display: inline-block;
        writing-mode: vertical-rl;
        text-orientation: mixed;
        transform: rotate(360deg);
        margin-left: 0.5rem;
        letter-spacing: 0.1em;
        line-height: 1;
        font-family: 'Jersey 25', sans-serif;
    }

    .infentra-description {
        max-width: 750px;
        margin: 0 auto;
        text-align: left;
    }

    .infentra-subtitle {
        color: #ED7497;
        font-weight: bold;
        font-size: 1.5rem;
        margin: 1rem 0 0.5rem 0;
        letter-spacing: 0.05em;
    }

    .infentra-tagline {
        font-size: 1.3rem;
        color: #666;
        max-width: 1100px;
        margin: 0 auto;
    }

    .banner-pixel {
        position: relative;
        width: 100%;
        max-width: 1200px;
        margin: 2rem auto;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    }

    .banner-image {
        width: 100%;
        height: auto;
        display: block;
        object-fit: cover;
    }


    @media (max-width: 992px) {
        .infentra-main {
            font-size: 8.7rem;
        }

        .infentra-year {
            font-size: 30px;
            margin-left: 0.3rem;
        }
    }


    @media (max-width: 794px) {

        .grid-container div img {
            width: 100%;
            max-width: 1000px;
            height: auto;
            display: block;
            margin: 0 auto;
        }

    }

    @media (max-width: 768px) {
        .grid-container {
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            padding: 1rem 0;
        }

        .grid-container div img {
            width: 100%;
            max-width: 1000px;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        .logo img {
            max-width: 80px;
        }

        .infentra-main {
            font-size: 6.3rem;
        }

        .infentra-year {
            font-size: 30px;
            margin-left: 0.3rem;
        }

        .infentra-subtitle {
            font-size: 1.1rem;
        }

        .infentra-tagline {
            font-size: 0.95rem;
        }

    }

    @media (max-width: 577px) {
        .grid-container div img {
            max-width: 100px;
        }

        .infentra-main {
            font-size: 5.5rem;
        }

        .infentra-year {
            font-size: 20px;
            margin-left: 0.2rem;
        }

        .infentra-description {
            max-width: 400px;
            margin: 0 auto;
            text-align: left;
        }

        .infentra-subtitle {
            font-size: 1rem;
        }

        .infentra-tagline {
            font-size: 0.85rem;
        }
    }

    @media (max-width: 450px) {
        .infentra-main {
            font-size: 4rem;
        }

        .infentra-year {
            font-size: 20px;
        }

        .infentra-description {
            max-width: 300px;
            margin: 0 auto;
            text-align: left;
        }
    }

    @media (max-width: 332px) {
        .infentra-main {
            font-size: 3.4rem;
        }

        .infentra-year {
            font-size: 20px;
        }

        .infentra-description {
            max-width: 300px;
            margin: 0 auto;
            text-align: left;
        }
    }
</style>