<!-- Block mymodule -->
<div id="flxfilemanager_block_home" class="block">
  <h4>DESCARGAS!</h4>
  <div class="block_content">
    <p>Hello,
       {if isset($flxfilemanager) && $flxfilemanager}
           {$flxfilemanager}
       {else}
           World
       {/if}
       !       
    </p>   
    <ul>
      <li><a href="{$flxfilemanager_link}" title="Click this link">Click me!</a></li>
    </ul>
  </div>
</div>
<!-- /Block mymodule -->