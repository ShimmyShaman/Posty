
@component('layouts.master')
  <div id="content_container">
    @include('components.user-header')
    <section id="tournament">
      <?php
        use App\Enums\TournamentState;

        echo "<h2>" . $tourny->title . "</h2>";
        echo "<h3>Start Date:" . strval($tourny->start_date) . "</h3>";
      ?>

      @switch($tourny->state)
        @case(TournamentState::Signup)
          @include('components.tournament.signup')
          @break
        @case(TournamentState::Ongoing)
          @include('components.tournament.ongoing')
          @break
        @case(TournamentState::Completed)
          @include('components.tournament.completed')
          @break
        @default
          <h2>Error Unknown Tournament State</h2>
              
      @endswitch
    </section>
  </div>
@endcomponent