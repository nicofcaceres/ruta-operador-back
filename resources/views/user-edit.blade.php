<!-- Modal -->
<div class="modal fade" id="userEditModal-{{$user->id}}" data-bs-backdrop="static" data-bs-keyboard="false" 
    tabindex="-1" aria-labelledby="userEditModal-{{$user->id}}-Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="userEditModal-{{$user->id}}-Label">Editando usuario {{$user->email}} </h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('usuarios.update',['usuario' => $user->id])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Nombres</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="name-help" required value="{{$user->name}}">
                    <div id="name-help" class="form-text">Digite los nombres de tecnico</div>
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" aria-describedby="last-name-help" required value="{{$user->last_name}}">
                    <div id="last-name-help" class="form-text">Digite los apellidos del tecnico</div>
                </div>
                <div class="mb-3">
                    <label for="sel-doc-type" class="form-label">Tipo Documento</label>
                    <select class="form-select" aria-label="Sleccione el tipo de documento" id="doc_type" name="doc_type">
                        <option value="CC" @if($user->doc_type=='CC')selected @endif>CC</option>
                        <option value="PA" @if($user->doc_type=='PA')selected @endif>PA</option>
                        <option value="CE" @if($user->doc_type=='CE')selected @endif>CE</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="document" class="form-label">Numero Documento</label>
                    <input type="text" class="form-control" id="document" name="document" aria-describedby="doc-number-help" required value="{{$user->document}}">
                    <div id="doc-number-help" class="form-text">Digite el numero de documento</div>
                </div>
                <div class="mb-3">
                    <label for="phone_number" class="form-label">Celular</label>
                    <input type="number" class="form-control" id="phone_number" name="phone_number" aria-describedby="mobile-help" required value="{{$user->phone_number}}">
                    <div id="mobile-help" class="form-text">Digite el numero de celular</div>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Dirección</label>
                    <input type="text" class="form-control" id="address" name="address" aria-describedby="mobile-help" maxlength="120" >
                    <div id="mobile-help" class="form-text">Digite el la direccion fisitca del usuario</div>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="is_technical" name="is_technical"  @if ($user->is_technical==1)checked @endif>
                    <label class="form-check-label" for="is-technical">Es tecnico de ruta</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </form>
        </div>
    </div>
</div>