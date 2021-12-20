
<div id="listings">
  @auth
  <div id="listings-btn-ctn">
    <a href="/crlisting" class="">Add Listing</a>
  </div>
  @endauth
  <ul id="listings_container">
    @foreach ($listings as $listing)
    <li>
      <?php
        $tourny_slug = $listing->item_slug();
        echo "<a class=\"listlink\" href=\"/t/" . $tourny_slug . "\">";
      ?>
        <div>
          <?php
            echo "<div class=\"listing-banner-" . $listing->type . "\"></div>";
          ?>
          <h3>{{ $listing->title }}</h3>
        </div>
        {{-- <div class="listing-info">
          {{-- <div class="listing-title"></div>
        </div> --}}
      </a>
    </li>
    @endforeach
  <ul>
</div>