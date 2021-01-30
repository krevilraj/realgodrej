<div class="col-12 col-lg-4 position-static">
  <!-- widgetQuoteFormCollapse -->
  <div class="collapse widgetQuoteFormCollapse" id="collapseQuoteForm">
    <!-- widgetForm -->
    <aside class="widget widgetForm bg-white hasShadow rounded text-left mb-0">
      <form action="javascript:void(0);">
        <!-- widgetFormtHead -->
        <header class="widgetFormtHead d-flex position-relative">
          <i class="icn ti-headphone-alt d-flex align-items-center justify-content-center flex-shrink-0"><span
                class="sr-only">icon</span></i>
          <div class="wrap">
            <strong class="textTitle d-block font-weight-normal">Lorem ipsum dolor sit
              amet</strong>
            <h3 class="font-weight-bold">Request A Quote</h3>
          </div>
        </header>
        <!-- form group -->

        @if (Session::has('success'))
          <div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong><i class="fa fa-thumbs-o-up"></i> Success!</strong>
            {!! session('success') !!}
          </div>
        @endif
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
        <button data-hover="submit now" class="btn btnTheme d-block w-100 text-uppercase" type="button" wire:click="insertContact"
                wire:loading.class="disabled">
                                        <span class="d-block btnText">Submit Now <i wire:loading wire:target="insertContact"
                                                                                          class="fas fa-spinner fa-spin"></i> </span>

        </button>

      </form>
    </aside>
  </div>
</div>