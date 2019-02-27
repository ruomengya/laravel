@extends('layout.bst')


@section('content')
    <div id="qrcode"></div>
    @parent
    <script src="{{URL::asset('/js/qrcode.min.js')}}"></script>

    <script>
        (function() {
                    var qrcode = new QRCode('qrcode', {
                                text: "{{$code_url}}",
                                width: 256,
                                height: 256,
                                colorDark : '#000000',
                                colorLight : '#ffffff',
                                correctLevel : QRCode.CorrectLevel.H
                            }
                    );
                }
        )()

    </script>
@endsection