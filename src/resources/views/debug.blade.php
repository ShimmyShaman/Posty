

@component('layouts.master')
<div>
    <h1>Debug Page</h1>
    <h3>Debug Value:
    <?php
        echo strval($debug);
    ?>
    </h3>
</div>
@endcomponent