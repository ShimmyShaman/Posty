
@component('layouts.master')
  <div id="content_container">
    @include('components.user-header')
    <section id="tournament">
      <?php
        use App\Enums\TournamentState;

        echo "<h2>" . $tourny->title . "</h2>";
        echo "<h2>Tournament Start Date:" . strval($tourny->start_date) . "</h2>";
      ?>

      @switch($tourny->state)
        @case(TournamentState::Signup)
          <?php
            echo "<h2>Signed Up: " . strval($tourny->participants()->count()) . "</h2>";
          ?>
            
          @auth
          <?php
            if($already_signed_up) {
              echo "<h3>You are signed up!</h3>";
            } else {
              echo "<form action=\"\" method=\"POST\">";
              echo "  <input type=\"hidden\" name=\"_token\"";
              echo "     value=\"" . csrf_token() . "\">";
              echo "  <input type=\"hidden\" name=\"tid\"";
              echo "    value=\"" . strval($tourny->id) . "\">";
              echo "  <input type=\"submit\" value=\"Signup\">";
              echo "</form>";
            }
          ?>
          @else
            <h4>Login or register to sign up</h4>
          @endauth
            @break
        @case(TournamentState::Ongoing)
        @case(TournamentState::Complete)
          <h2>TODO</h2>
            @break
        @default
          <h2>Error Unknown Tournament State</h2>
              
      @endswitch
    </section>
  </div>
@endcomponent