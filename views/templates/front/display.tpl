Welcome to my Shop!


<ul>
<h1>Listado de archivos</h1>
{foreach from=$arrayArchivos key=nombre item=ruta}
        <li>
            <a href="{$ruta}">{$nombre}</a>
        </li>
{/foreach}
</ul>