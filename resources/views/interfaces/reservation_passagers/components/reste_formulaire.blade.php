<fieldset class="form-group mt-3">

    <input name="email" type="email" class="form-control m-2" id="champCourriel" style="border-width:medium" placeholder="{{ $reservation_passagers_courriel }}">

    <input name="numero" type="tel" class="form-control m-2" id="champTelephone" style="border-width:medium" placeholder="{{ $reservation_passagers_numero }}" aria-describedby="defaultRegisterFormPhoneHelpBlock">
    <small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
        {{ $reservation_passagers_tel_necessaire }}
    </small>

</fieldset>
