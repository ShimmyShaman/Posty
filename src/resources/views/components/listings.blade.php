
<div id="listings">
  <div>
    <button id="add_listing_btn">Add Listing</button>
  </div>
  <div>
    <ul id="listings_container">
      @foreach ($listings as $listing)
      <li>
        <div class="listing-banner">
          <?php
            echo "<div class=\"listing-banner-" . $listing->type . "\">bogus</div>";
          ?>
        </div>
        <div class="listing-info">
          <div class="listing-title">{{ $listing->title }}</div>
        </div>
      </li>
      @endforeach
    <ul>
  </div>
</div>