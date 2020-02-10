<div id="editCategory" class="modal">
    <form method="POST" action="{{ route('categories.update') }}">
    @csrf
    <div class="modal-content">
        <h4>Editando categoría</h4>
            <div class="row">
                <input id="hidden-category-id" type="hidden" value="" name="category_id">
                <div class="input-field">
                    <input id="category-name" type="text" class="validate" name="name" value="" required>
                    <label for="name">Nombre</label>
                </div>
                <div class="input-field">
                    <input id="category-description" type="text" class="validate" name="description" value="" required>
                    <label for="description">Descripción</label>
                </div>
            </div>
    </div>
    <div class="modal-footer">
        <button id="edit-category" type="submit" class="waves-effect waves-green btn-flat">Editar
        </button>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
    </form>
</div>