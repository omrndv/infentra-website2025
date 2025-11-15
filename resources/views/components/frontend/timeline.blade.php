<div class="row m-0 py-4" style="background-color:white; border:2px solid #000; border-top:none;">
    <div class="col-12">

        <div class="d-flex flex-nowrap justify-content-start gap-5 position-relative px-4" style="overflow-x:auto;">

            <div style="
                position:absolute;
                top:25px;
                left:0;
                right:0;
                height:2px;
                border-top:2px dashed #999;
                z-index:1;
            "></div>

            @foreach ($timelines as $timeline)
            @php
            $is_active = $timeline['is_active'] ?? true;
            $dot_color = $is_active ? '#1e88e5' : '#c0d4e9';
            $text_color = $is_active ? '#000' : '#bbb';

            $date_text = $timeline['date_range']
            ?? (isset($timeline['date'])
            ? date('d M Y', strtotime($timeline['date']))
            : '-');
            @endphp

            <div class="text-center position-relative bg-white px-2"
                style="z-index:2; min-width:180px;">

                <span style="
                    display:block;
                    width:14px;
                    height:14px;
                    border-radius:50%;
                    background-color:{{ $dot_color }};
                    margin:0 auto 15px;
                "></span>

                <strong style="
                    font-weight:900;
                    font-size:1.05rem;
                    text-transform:uppercase;
                    color:{{ $text_color }};
                    display:block;
                    line-height:1.2;
                    min-height:40px;
                ">
                    {{ $timeline['title'] }}
                </strong>

                <span style="
                    display:block;
                    margin-top:8px;
                    font-size:0.9rem;
                    color:{{ $text_color }};
                ">
                    {{ $date_text }}
                </span>

            </div>
            @endforeach

        </div>

    </div>
</div>