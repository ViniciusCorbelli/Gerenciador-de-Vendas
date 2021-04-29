<div class="row">
    <div class="col-lg-12 col-md-12 form-group">
        <label for="product" class="required">Nome do Produto </label>
        <input name="product" id="product" required value="{{ old('product', $product->product) }}" type="text" class="form-control">
    </div>

    <div class="col-lg-6 col-md-12 form-group">
        <label for="price" class="required">Preço </label>
        <input name="price" id="price" required value="{{ old('price', $product->price) }}" type="number" class="form-control">
    </div>

    <div class="col-lg-6 col-md-12 form-group">
        <label for="category_id" class="required">Categoria </label>
        <select name="category_id" id="category_id" class="form-control select2" value="{{ old('category_id', $product->category_id) }}">
            <option></option>
            @foreach ($categories as $category)
            <option @if ($product->category_id == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
</div>
