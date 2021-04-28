<br/>
<h1 class="text-center text-primary">All Users</h1>
<br/>
<div class="panel panel-body">
    <table class="table table-responsive table-bordered">
        <thead>
        <tr class="text-center">
            <th>ID</th>
            <th>NOME</th>
            <th>EMAIL</th>
            <th><a class="btn btn-primary" href="http://localhost/mauro_crud/?metodo=update&pagina=Users">New</a></th>
        </tr>
        </thead>
        <tbody>
        {% for user in users %}
        <tr>
            <td>{{ user.id }}</td>
            <td>{{ user.name }}</td>
            <td>{{ user.email }}</td>
            <td class="text-center">
                <a class="btn btn-warning" href="http://localhost/mauro_crud/?metodo=update&pagina=Users&id={{user.id}}">Update</a>
                <a class="btn btn-danger"
                   href="http://localhost/mauro_crud/?metodo=delete&pagina=Users&id={{user.id}}">Delete</a>
            </td>
        </tr>
        {% endfor %}
        </tbody>
    </table>
</div>

