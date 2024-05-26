<!-- Modal -->
<div class="modal fade" id="usercreateModal" data-bs-backdrop="static" data-bs-keyboard="false" 
    tabindex="-1" aria-labelledby="usercreateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="usercreateModalLabel">Nuevo</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('usuarios.store')}}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
                    <div id="emailHelp" class="form-text">WDigite un correo electronico valido</div>
                  </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Nombres</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="name-help" required>
                    <div id="name-help" class="form-text">Digite los nombres de tecnico</div>
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" aria-describedby="last-name-help" required>
                    <div id="last-name-help" class="form-text">Digite los apellidos del tecnico</div>
                </div>
                <div class="mb-3">
                    <label for="sel-doc-type" class="form-label">Tipo Documento</label>
                    <select class="form-select" aria-label="Sleccione el tipo de documento" id="doc_type" name="doc_type">
                        <option value="CC">CC</option>
                        <option value="PA">PA</option>
                        <option value="CE">CE</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="document" class="form-label">Numero Documento</label>
                    <input type="text" class="form-control" id="document" name="document" aria-describedby="doc-number-help" required>
                    <div id="doc-number-help" class="form-text">Digite el numero de documento</div>
                </div>
                <div class="mb-3">
                    <label for="phone_number" class="form-label">Celular</label>
                    <input type="number" class="form-control" id="phone_number" name="phone_number" aria-describedby="mobile-help" required>
                    <div id="mobile-help" class="form-text">Digite el numero de celular</div>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Dirección</label>
                    <input type="text" class="form-control" id="address" name="address" aria-describedby="mobile-help" maxlength="120" >
                    <div id="mobile-help" class="form-text">Digite el la direccion fisitca del usuario</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="is_technical" name="is_technical">
                    <label class="form-check-label" for="is-technical">Es tecnico de ruta</label>
                  </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </form>
        </div>
    </div>
</div>