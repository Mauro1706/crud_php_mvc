<br/>
<h1 class="text-center text-primary">Update User</h1>
<br/>
<div class="panel panel-body">
    <form method="post" action="?pagina=Users&metodo=gravar">
        <div class="mb-3 row">
            <label for="staticName" class="col-sm-2 col-form-label">Name: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="staticName" name="name" value="{{name}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Email: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="staticEmail" name="email" value="{{email}}">
            </div>
        </div>
        <div class="col-sm-12 text-center">
            <input type="hidden" name="id" value="{{id}}"/>
            <button type="submit" class="btn btn-primary">Gravar</button>
            <a class="btn btn-danger" href="http://localhost/mauro_crud/?metodo=index&pagina=Users">Back</a>
        </div>
    </form>
</div>