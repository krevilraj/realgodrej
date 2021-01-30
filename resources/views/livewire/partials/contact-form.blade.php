<section class="contactAreaBlock contentBlock">
  <div class="container">
    <div class="row mb-5 align-items-center">
      <div class="col-12 col-md-5">
        <h2 class="text-uppercase">Get it touch</h2>
        <p><span class="fontRoboto">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</span>
        </p>
        <!-- ctAddress -->
        <address class="ctAddress text-dark">
          <ul class="list-unstyled">
            <li class="d-flex align-items-center">
              <i class="ei_icon_pin_alt icn text-center flex-shrink-0"><span class="sr-only">icon</span></i>
              <strong class="text font-weight-normal">{{getConfiguration('site_address')}}</strong>
            </li>
            <li class="d-flex align-items-center">
              <i class="ei_icon_mail_alt text-center icn flex-shrink-0"><span class="sr-only">icon</span></i>
              <strong class="text font-weight-normal"><a
                    href="mailto:{{getConfiguration('site_primary_email')}}">{{getConfiguration('site_primary_email')}}</a></strong>
            </li>
            <li class="d-flex align-items-center">
              <i class="ei_icon_mobile icn text-center flex-shrink-0"><span class="sr-only">icon</span></i>
              <strong class="text font-weight-normal"><a
                    href="tel:{{getConfiguration('site_primary_phone')}}">{{getConfiguration('site_primary_phone')}}</a></strong>
            </li>
          </ul>
        </address>
      </div>
      <div class="col-12 col-md-6 offset-xl-1 col-xl-6">
        <!-- widgetCtForm -->
        <aside class="widget widgetCtForm hasShadow bg-white mb-4">
          @if (Session::has('success'))
            <div class="alert alert-success alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong><i class="fa fa-thumbs-o-up"></i> Success!</strong>
              {!! session('success') !!}
            </div>
          @endif
          <form action="javascript:void(0);">
            <!-- form group -->
            <div class="form-group">
              <input class="@error('name') is-invalid  @enderror form-control w-100 d-block" type="text"
                     placeholder="Enter your name here.."
                     wire:model="name"/>
              @if ($errors->has('name'))
                <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
              @endif
            </div>
            <!-- form group -->
            <div class="form-group">
              <input class="@error('phone') is-invalid  @enderror form-control w-100 d-block" type="tel"
                     placeholder="Enter your phone here.."
                     wire:model="phone"/>
              @if ($errors->has('phone'))
                <span class="error invalid-feedback">{{ $errors->first('phone') }}</span>
              @endif
            </div>
            <div class="form-group">
              <input class="@error('email') is-invalid  @enderror form-control w-100 d-block" type="email"
                     placeholder="Enter your email here.."
                     wire:model="email"/>
              @if ($errors->has('email'))
                <span class="error invalid-feedback">{{ $errors->first('email') }}</span>
              @endif
            </div>
            <div class="form-group">
              <input class="@error('subject') is-invalid  @enderror form-control w-100 d-block" type="tel"
                     placeholder="Subject"
                     wire:model="subject"/>
              @if ($errors->has('subject'))
                <span class="error invalid-feedback">{{ $errors->first('subject') }}</span>
              @endif
            </div>
            <!-- form group -->
            <div class="form-group">
                <textarea class="@if ($errors->has('message')) is-invalid   @endif form-control d-block w-100"
                          wire:model.debounce.500ms="message"
                          placeholder="Your Message*"></textarea>
              @if ($errors->has('message'))
                <span class="error invalid-feedback ">{{ $errors->first('message') }}</span>
              @endif

            </div>
            <!-- button -->
            <button data-hover="Get A Quote" class="btn btnTheme d-block w-100 text-uppercase" type="button" wire:click="insertContact"
                    wire:loading.class="disabled">
                                        <span><i wire:loading wire:target="insertContact"
                                                 class="fas fa-spinner fa-spin"></i> <span class="d-block btnText">Get A Quote</span></span>

            </button>

          </form>
        </aside>
      </div>
    </div>

  </div>
</section>