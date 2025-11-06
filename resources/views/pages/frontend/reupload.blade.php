<x-layouts.auth title="Upload Ulang Dokumen Tim">
    <div class="page-content d-flex align-items-center justify-content-center">
        <div class="row w-100 mx-0 auth-page">
            <div class="col-md-8 col-xl-6 mx-auto">
                <div class="card mt-4">
                    <div class="card-body px-4 py-4">
                        <h4 class="mb-3 text-center">Upload Ulang Dokumen Tim {{ $team->name }}</h4>
                        <p class="text-muted text-center mb-4">
                            Lengkapi ulang dokumen yang diminta oleh panitia.
                        </p>

                        <form method="POST" action="{{ route('reupload.store', $team) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="leader_card" class="form-label fw-bold">Kartu Pelajar / Mahasiswa Ketua</label>
                                <input type="file" class="form-control" name="leader_card" accept="image/*">
                            </div>

                            @foreach ($team->members as $i => $member)
                            <div class="mb-3">
                                <label for="member_card_{{ $i }}" class="form-label fw-bold">
                                    Kartu Pelajar / Mahasiswa {{ $member->name }}
                                </label>
                                <input type="file" class="form-control" name="member_card_{{ $i }}" accept="image/*">
                            </div>
                            @endforeach

                            <div class="mb-3">
                                <label for="payment_proof" class="form-label fw-bold">Bukti Pembayaran Baru</label>
                                <input type="file" class="form-control" name="payment_proof" accept="image/*">
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mt-3">
                                Kirim Pembaruan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.auth>