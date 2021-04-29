<div class="row">
    <div class="col-lg-4 col-md-12 form-group">
        <label for="name" class="required">Nome </label>
        <input name="name" id="name" required value="{{ old('name', $user->name) }}" type="text" class="form-control">
    </div>
    <div class="col-lg-4 col-md-12 form-group">
        <label for="email" class="required">E-mail </label>
        <input name="email" id="email" required value="{{ old('email', $user->email) }}" type="email" class="form-control">
    </div>
    <div class="col-lg-4 col-md-12 form-group">
        <label for="cpf" class="required">CPF </label>
        <input name="cpf" id="cpf" required value="{{ old('cpf', $user->cpf) }}" type="text" class="form-control">
    </div>
    @can('is_admin', 'App\User')
        <div class="col-lg-4 col-md-12 form-group">
            <label for="is_admin" class="required">Tipo </label>
            <select name="is_admin" id="is_admin" class="form-control select2" value="{{ old('is_admin', $user->is_admin) }}">
                <option></option>
                <option value="0">Comum</option>
                <option value="1">Administrador</option>
            </select>
        </div>
    @endcan
    <div class="col-lg-4 col-md-12 form-group">
        <label for="password" class="required">Senha </label>
        <input name="password" id="password" required type="password" class="form-control">
    </div>
    <div class="col-lg-4 col-md-12 form-group">
        <label for="password_confirmation" class="required">Confirmação de senha </label>
        <input name="password_confirmation" id="password_confirmation" required type="password" class="form-control">
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
