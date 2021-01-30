<div>
    <form>

        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><i class="fa fa-thumbs-o-up"></i> Success!</strong>
                {!! session('success') !!}
            </div>
    @endif
    <!-- form group -->
        <select name="contact-purpose" id="contact-purpose" wire:model="from" class="input-style input-style1">
            <option value="contact-us">Select your reason for contact</option>
            <option value="Career">Career</option>
            <option value="Media">Media</option>
            <option value="Product">Product</option>
            <option value="Partnership">Partnership</option>
            <option value="Sales">Sales</option>
            <option value="Investor">Investor</option>
        </select>
        <label for="enquiry_purpose" class="purpose-label">Please select purpose</label>
            <div class="row">
                <div class="form-group col-md-6">
                    <input class="input-style @error('first_name') is-invalid  @enderror  w-100 d-block" type="text"
                           placeholder="Enter your First Name here.."
                           wire:model="first_name"/>
                    @if ($errors->has('first_name'))
                        <span class="error invalid-feedback">{{ $errors->first('first_name') }}</span>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <input class="input-style @error('last_name') is-invalid  @enderror  w-100 d-block" type="text"
                           placeholder="Enter your Last Name here.."
                           wire:model="last_name"/>
                    @if ($errors->has('last_name'))
                        <span class="error invalid-feedback">{{ $errors->first('last_name') }}</span>
                    @endif
                </div>
            </div>

        <!-- form group -->
        <div class="form-group">
            <input class="input-style @error('phone') is-invalid  @enderror  w-100 d-block" type="tel"
                   placeholder="Enter your phone here.."
                   wire:model="phone"/>
            @if ($errors->has('phone'))
                <span class="error invalid-feedback">{{ $errors->first('phone') }}</span>
            @endif
        </div>

        <div class="form-group">
            <input class="input-style @error('address') is-invalid  @enderror  w-100 d-block" type="text"
                   placeholder="Enter your address here.."
                   wire:model="address"/>
            @if ($errors->has('address'))
                <span class="error invalid-feedback">{{ $errors->first('address') }}</span>
            @endif
        </div>
        <div class="form-group">
            <input class="@error('email') is-invalid  @enderror input-style w-100 d-block" type="email"
                   placeholder="Enter your email here.."
                   wire:model="email"/>
            @if ($errors->has('email'))
                <span class="error invalid-feedback">{{ $errors->first('email') }}</span>
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
        <button data-hover="Get A Quote" class="btn btnTheme d-block w-100 text-uppercase" type="button"
                wire:click="insertContact"
                wire:loading.class="disabled">Get A Quote

        </button>

    </form>

</div>


