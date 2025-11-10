<div class="container">
    <div class="grid-container">
        <div class="logo">
            <img src="https://b3027566.smushcdn.com/3027566/wp-content/uploads/2023/02/cropped-logo_telkom_university.png?lossy=1&strip=1&webp=1" alt="Logo Kampus" />
        </div>
        <div class="logo">
            <img src="https://bif-pwt.telkomuniversity.ac.id/wp-content/uploads/2021/03/Logo-IF.png" alt="Logo Organisasi 1" />
        </div>
        <div class="logo">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS5fpZgvU5phApa6zpxqqAH6g53jDxf-0JJ-A&s" alt="Logo Organisasi 2" />
        </div>
    </div>

    <div class="banner banner--frame">
        <div class="card card-hero">
            <div class="card-body py-5">
                <h2 class="text-center">
                    {{ $appSettings['title'] }}
                </h2>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="information">
                        <h2 id="hero-heading">{{ $appSettings['heading'] }}</h2>
                        <div class="d-flex gap-3 mt-4">
                            <a href="#detail" class="btn btn-sm btn-rounded btn-secondary text-white">
                                <i class="fas fa-arrow-down"></i>
                                Detail
                            </a>
                            <a href="{{ route('register') }}" class="btn btn-sm btn-rounded btn-primary">
                                <i class="fas fa-user-plus"></i>
                                Daftar
                            </a>
                        </div>
                    </div>
                    <img
                        src="{{ $appSettings['mascot'] ?? '#' }}"
                        alt="mascot"
                        class="mascot-image"
                        loading="lazy" />
                </div>
            </div>
        </div>
    </div>
</div>