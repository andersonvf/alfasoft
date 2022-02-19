<div>
  <div class="mb-3">
    <label for="name" class="form-label">Nome</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ @$clients->name }}">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="E-mail" value="{{ @$clients->email }}">
  </div>
  <button type="submit" class="btn btn-outline-primary btn-lg active" role="button" aria-pressed="true">Salvar</button>
</div>