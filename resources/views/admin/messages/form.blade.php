<div class="row">
    <div class="col-lg-6 col-md-12 form-group" id="send-select">
        <label for="user_id" class="required">Para</label>
        <select name="user_id" id="user_id" class="form-control select2"
            value="{{ old('user_id', $messages->user_id) }}">
            <option value="all">Todos</option>
            @foreach ($users as $user)
                <option @if ($messages->user_id == $user->id) selected @endif value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<label for="title" class="required">Título </label>
<input name="title" id="title" required value="{{ old('title', $messages->title) }}" type="text" class="form-control">
<div class="form-group">
    <label for="message" class="required">Mensagem </label>
    <textarea class="form-control" name="message" id="message" required
        value="{{ old('message', $messages->message) }}" rows="12"></textarea>
</div>
