<footer>
    <div class="footer">
        <div class="flex-img">
            <div class="first-img"><img src="{{asset('asset/site/css/icons-images/gerb.png')}}" alt="" /></div>
            <div class="second-img"><img src="{{asset('asset/site/css/icons-images/logo.svg')}}" alt="" /></div>
        </div>
        <div class="flex-info">
            <div>
                <ul class="ul-top">
                    @if(isset($footerMenusTop) && $footerMenusTop->count() > 0)
                        @foreach($footerMenusTop as $item)

                            <li><a  target="_blank" href="{{ $item->path }}">{{ $item->title }}</a></li>
                        @endforeach
                    @endif

                </ul>
                <ul class="ul-bottom">
                    @if(isset($footerMenusBottom) && $footerMenusBottom->count() > 0)
                        @foreach($footerMenusBottom as $item)

                            <li><a target="_blank" href="{{ $item->path }}">{{ $item->title }}</a></li>
                        @endforeach
                    @endif
                    <li>
                        <ul class="flex-icons">
                            @if(settings()->group('social_links')->get('linkedin_link'))

                                <li><a target="_blank" href="{{ settings()->group('social_links')->get('linkedin_link') }}"><img src="{{asset('asset/site/css/icons-images/linkedin.svg')}}" alt="linkedin" /></a></li>

                            @endif
                                @if(settings()->group('social_links')->get('facebook_link'))
                                    <li><a target="_blank"  href="{{ settings()->group('social_links')->get('facebook_link') }}"><img src="{{asset('asset/site/css/icons-images/facebook.svg')}}" alt="facebook" /></a></li>

                                @endif
                                <!-- @if(settings()->group('social_links')->get('instagram_link'))
                                    <li><a href="{{ settings()->group('social_links')->get('instagram_link') }}"><img src="{{asset('asset/site/css/icons-images/instagram.svg')}}" alt="instagram" /></a></li>

                                @endif -->
                                @if(settings()->group('social_links')->get('twitter_link'))
                                    <li><a target="_blank"  href="{{ settings()->group('social_links')->get('twitter_link') }}"><img src="{{asset('asset/site/css/icons-images/twitter.svg')}}" alt="twitter" /></a></li>

                                @endif
                        </ul>
                    </li>
                    <li><button class="subscribe sub-knopka">{{__('lang.buttons.subscribe')}}</button></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="webex-logo">
        <div class="webex">
            <a href="https://web-ex.tech">
                <img src="{{asset('asset/site/css/icons-images/new_logo_grey.webp')}}" />
                <span class="kes">ebEx</span><span class="myus-kes">Tech</span>
                <div class="website">Website Excellence Technologies</div>
            </a>
        </div>
    </div>

    <div class="subscribe-block">
        <div class="block-block">
            <div class="close">
                <div>&times;</div>
            </div>
            <div>{{ settings()->group(App::getLocale())->get('subscriber_modal_description') }}</div>
                <input class="email_sub" type="text" />
                <button class="subscribe btn_sub">{{__('lang.buttons.subscribe')}}</button>
            <span class="subscribe_error sub_message" style="display: none">{{ __('validation.subscribe_error') }}</span>
            <span class="subscribe_success sub_message" style="display: none">{{ __('validation.subscribe_success') }}</span>
            <span class="subscribe_message sub_message" style="display: none">{{ __('validation.subscribe_message') }}</span>
        </div>
    </div>
</footer>
<!--Start of Tawk.to Script-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/6038feea385de407571a66a5/1evfa7hsc';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
    $('.btn_sub').click(function (){
        //$('.sub_message').css('display','none')
        let email = $('.email_sub').val();
        $.ajax({
            url: "{{route('subscribe')}}",
            type: "POST",
            data: {
                email:email,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: (data) => {
                if(data=='email invalid'){
                    $('.subscribe_error').css('display','block')
                }
                else if(data=="error"){
                    $('.subscribe_message').css('display','block')
                }
                else if(data=="success"){
                    $('.subscribe_success').css('display','block')
                }
            },
        })
    })

    if($(this).width()<627){
        $('.page-link>.b-sev:nth-child(3)').before('<br><br>')
        $('.b-save-3').css("margin-left", "17px");
    }
    $( window ).resize(function() {
        if($(this).width()<627){
            $('.page-link>.b-sev:nth-child(3)').before('<br><br>')
            $('.b-save-3').css("margin-left", "17px");
        }else{
            $('.page-link>br').remove()
            $('.b-save-3').css("margin-left", "0");
        }
    });

</script>
