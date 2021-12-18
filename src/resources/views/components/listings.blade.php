
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
        echo "<div class=\"listing-banner-" . $listing->type . "\"></div>";
      ?>
      <div class="listing-info">
        <div class="listing-title">{{ $listing->title }}</div>
      </div>
    </li>
    @endforeach
  <ul>
</div>