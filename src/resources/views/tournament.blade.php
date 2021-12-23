
@component('layouts.master')
  <div id="content_container">
    @include('components.user-header')
    <section id="tournament">
      <?php
        use App\Enums\TournamentState;

        echo "<h2>" . $tourny->title . "</h2>";
        switch($tourny->state) {
          case TournamentState::Signup: {
            echo "<h2>Tournament Start Date:" . strval($tourny->start_date) . "</h2>";
            echo "<h2>Signed Up: " . strval($tourny->participants()->count()) . "</h2>";
          } break;
          case TournamentState::Ongoing:
          case TournamentState::Complete:
            echo "<h2>TODO</h2>";
            break;
          default: {
            echo "Error Unknown Tournament State";
          } break;
        };
      ?>
      @auth
      <form action="signup" method="POST">
        @csrf
        <?php
          echo "<input type=\"hidden\" id=\"tid\" name=\"tid\"";
          echo " value=\"" . strval($tourny->id) . "\">"
        ?>
        <input type="submit" value="Signup">
      </form>
      @else
        <h4>Login or register to sign up</h4>
      @endauth
    </section>
  </div>
@endcomponent