<div class="row">
    <div class="col-lg-6 col-md-12 form-group">
        <label for="product_id" class="required">Produto </label>
        <select name="product_id" id="product_id" class="form-control select2" value="{{ old('product_id', $sell->product_id) }}">
            <option></option>
            @foreach ($products as $product)
            <option @if ($sell->product_id == $product->id) selected @endif value="{{ $product->id }}">{{ $product->product }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-lg-6 col-md-12 form-group">
        <label for="amount" class="required">Quantidade </label>
        <input name="amount" id="amount" required value="{{ old('amount', $sell->amount) }}" type="number" class="form-control">
    </div>
</div>
