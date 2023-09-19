<form action="/saveproject" method="POST">
    @csrf
    <label for="name">Nombre del proyecto:</label>
    <input type="text" name="name" id="name">
    <br>
    <label for="description">Descripcion del proyecto:</label>
    <input type="text" name="description" id="description">
    <button type="submit">Enviar</button>
</form>
