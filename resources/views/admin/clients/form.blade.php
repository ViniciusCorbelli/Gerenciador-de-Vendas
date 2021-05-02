<div class="row">
    <div class="col-lg-4 col-md-12 form-group">
        <label for="name" class="required">Nome </label>
        <input name="name" id="name" required value="{{ old('name', $client->name) }}" type="text" class="form-control">
    </div>
    <div class="col-lg-4 col-md-12 form-group">
        <label for="email" class="required">E-mail </label>
        <input name="email" id="email" required value="{{ old('email', $client->email) }}" type="email" class="form-control">
    </div>
    <div class="col-lg-4 col-md-12 form-group">
        <label for="cpf" class="required">CPF </label>
        <input name="cpf" id="cpf" required value="{{ old('cpf', $client->cpf) }}" type="text" class="form-control">
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(function(){
            $('.select2').select2({
                placeholder: "Selecione",
                allowClear: true
            });
        });
        $('select[value]').each(function () {
            $(this).val($(this).attr('value'));
        });
        $('#cpf').mask('000.000.000-00', {reverse:true});
    </script>
@endpush
