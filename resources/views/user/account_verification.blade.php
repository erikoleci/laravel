@extends('layouts.dashboard')
@section('style')
    <style>


    </style>
    <link rel="stylesheet" href="{{asset('css/toastr.css')}}">

@endsection
@section('content')

    <div style="padding-bottom: 2%;" class="page-content-wrapper" id="app">


            <div class="container-fluid">







            <!-- Central Modal Medium Success -->

            <!-- Central Modal Medium Success-->

    </div>
    </div>


    <!-- END wrapper -->




@endsection

@section('scripts')
    <script src="{{asset('js/toastr.min.js')}}"></script>

    <script>
                @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'warning':
                toastr.warning("{{ Session::get('message') }}", {positionClass: 'toast-top-center', containerId: 'toast-top-center'});
                break;

            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr.error("{{ Session::get('message') }}", {positionClass: 'toast-top-center', containerId: 'toast-top-center'});
                break;
        }
        @endif
    </script>
    <script>
        $('.input-cart-number').on('keyup change', function(){
            $t = $(this);

            if ($t.val().length > 3) {
                $t.next().focus();
            }

            var card_number = '';
            $('.input-cart-number').each(function(){
                card_number += $(this).val() + ' ';
                if ($(this).val().length == 4) {
                    $(this).next().focus();
                }
            })

            $('.credit-card-box .number').html(card_number);
        });

        $('#card-holder').on('keyup change', function(){
            $t = $(this);
            $('.credit-card-box .card-holder div').html($t.val());
        });

        $('#card-holder').on('keyup change', function(){
            $t = $(this);
            $('.credit-card-box .card-holder div').html($t.val());
        });

        $('#card-expiration-month, #card-expiration-year').change(function(){
            m = $('#card-expiration-month option').index($('#card-expiration-month option:selected'));
            m = (m < 10) ? '0' + m : m;
            y = $('#card-expiration-year').val();
            $('.card-expiration-date div').html(m + '/' + y);
        })

        $('#card-cvv').on('focus', function(){
            $('.credit-card-box').addClass('hover');
        }).on('blur', function(){
            $('.credit-card-box').removeClass('hover');
        }).on('keyup change', function(){
            $('.cvv div').html($(this).val());
        });


        /*--------------------
        CodePen Tile Preview
        --------------------*/
        setTimeout(function(){
            $('#card-cvv').focus().delay(1000).queue(function(){
                $(this).blur().dequeue();
            });
        }, 500);





        function SetTypeText(number)
        {
            var typeField = document.getElementById("card-number");
            typeField.innerHTML = GetCardType(number);
        }

        function GetCardType(number)
        {
            // visa

            var logo_img1 = document.getElementById('change1');
            var logo_img2 = document.getElementById('change2');


            var re = new RegExp("^4");
            if (String(number).match(re) != null){
                logo_img1.src = "{{asset('images/visa.png')}}";
                logo_img2.src = "{{asset('images/visa1.png')}}";}
            // Mastercard
            re = new RegExp("^5[1-5]");
            if (String(number).match(re) != null){
                logo_img1.src = "{{asset('images/master1.png')}}";
                logo_img2.src = "{{asset('images/master.png')}}";}

            // AMEX
            re = new RegExp("^3[47]");
            if (String(number).match(re) != null){
                logo_img1.src = "images/amex.png";
                logo_img2.src = "images/amex1.png";}



            re = new RegExp("^(5018|5020|5038|6304|6759|6761|6763[0-9]{8,15})");
            if (String(number).match(re) != null){
                logo_img1.src = "{{asset('images/maestro1.png')}}";
                logo_img2.src = "{{asset('images/maestro.png')}}";}


            return "";
        }


        function myFunction() {
            var x = document.getElementById("amount123").value;
            document.getElementById('myText').innerHTML = x +' .00 €';
            document.getElementById('myText1').innerHTML = x +' .00 €';
            document.getElementById('myText2').innerHTML = x +' .00 €';
        }



        let today = new Date().toISOString().slice(0, 10)

        document.getElementById('myText3').innerHTML = today;


    </script>
@endsection
