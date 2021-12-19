
@component('layouts.master')
  <div id="content_container">
    @include('components.user-header')
    <section id="item_list">
      @include('components.tournament')
    </section>
  </div>
@endcomponent