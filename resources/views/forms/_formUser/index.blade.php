@csrf


<div class="form-row">
    <div class="form-group col-md-4">
        <label for="name">Nome</label>
        <input type="text" class="form-control" placeholder="Nome" id="name" name="name"
            value="{{ isset($user->name) ? $user->name : old('name') }}" required autofocus />
    </div>
    <div class="form-group col-md-4">
        <label for="email">Email</label>
        <input type="email" class="form-control" placeholder="Email" id="email" name="email"
            value="{{ isset($user->email) ? $user->email : old('email') }}" required />
    </div>

    <div class="form-group col-md-4">
        <label for="level">Nivel de Acesso</label>
        <select name="level" id="level" class="form-control" required>
            @if (isset($user->level))
                <option value="{{ $user->level }}" class="text-primary h5" selected>
                    {{ $user->level }}
                </option>
            @else
                <option disabled selected>selecione o nivel de acesso</option>
            @endif

            @if (Auth::user()->level == 'Administrador')
                <option value="Administrador">Administrador</option>
                <option value="Comum">Comum</option>


            @endif

        </select>
    </div>
    <div class="form-group col-md-4">
        <label for="photo">Foto de Perfil </label>
        <input type="file" name="photo" id="photo" class="form-control">
        <small class="text-danger">Extensões permitidas: jpg, jpeg e png</small>
    </div>
    @if (Auth::user()->level == 'Administrador')
    <div class="form-group col-md-8">
        <label for="level">Permissões</label>
        <div class="form-check">
            <input name="permission[]" class="form-check-input" type="checkbox" value="Manter Produto" id="flexCheckDefault"  @if(isset($maintainProduct))
            checked
            @endif>
            <label class="form-check-label" for="flexCheckDefault">
             Manter Produto
            </label>
          </div>
          <div class="form-check">
            <input name="permission[]" class="form-check-input" type="checkbox" value="Manter Categorias" id="flexCheckChecked"

            @if(isset($maintainCategory))
            checked
            @endif>
            <label class="form-check-label" for="flexCheckChecked">
          Manter Categorias
            </label>
          </div>
          <div class="form-check">
            <input name="permission[]" class="form-check-input" type="checkbox" value="Manter Marcas" id="flexCheckChecked"
            @if(isset($keepBrand))
            checked
            @endif
       >
            <label class="form-check-label" for="flexCheckChecked">
          Manter Marcas
            </label>
          </div>


    </div>
    @endif
</div>
<hr class="my-4">
<div class="row mb-4">
    <div class="col-md-6">


        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" class="form-control" name="password"
                        autocomplete="new-password" placeholder="Password" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="password_confirmation">Confirmar Password</label>
                    <input type="password" class="form-control" id="password_confirmation"
                        name="password_confirmation" placeholder="Confirmar Password" />
                </div>
            </div>
        </div>


    </div>


    <div class="col-md-6">
        <b class="mb-2 text-dark">Requisitos de senhas</b>
        <p class="small text-dark mb-2"> Para criar uma nova senha, você deve atender a todos os seguintes requisitos:
        </p>
        <ul class="small text-dark pl-4 mb-0">
            <li>Mínimo 11 caracteres</li>
            <li>Pelo menos um caracter especial</li>
            <li>Pelo menos um número</li>
            <li>Pelo menos uma  letra maiúscula e uma letra minúscula</li>

        </ul>
    </div>
</div>
