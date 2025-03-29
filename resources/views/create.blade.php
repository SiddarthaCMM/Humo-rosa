<form action="{{ url('create') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="category" class="form-label">Categoría</label>
        <input type="text" name="category" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="ingredients" class="form-label">Ingredientes</label>
        <textarea name="ingredients" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label for="aroma" class="form-label">Aroma</label>
        <input type="text" name="aroma" class="form-control">
    </div>
    <div class="mb-3">
        <label for="Contenido" class="form-label">Contenido</label>
        <input type="text" name="Contenido" class="form-control">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Descripción</label>
        <textarea name="description" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Precio</label>
        <input type="number" name="price" class="form-control" step="0.01" required>
    </div>
    <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input type="number" name="stock" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Imagen</label>
        <input type="file" name="image" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
</form>