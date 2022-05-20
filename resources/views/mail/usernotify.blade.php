<div>
      <h3>Today your attendance information:-</h3>      
      <h4>Login Time: {{ $attendances[0] }}</h4>
      <h4>Breakin Time: {{ $attendances[1] }}</h4>
      <h4>Breakout Time: {{ $attendances[2] }}</h4>
      <h4>Logout Time: {{ $attendances[3] }}</h4>

      <hr/>
      <h3>Today total working hour: {{ $total_working_hour }}</h3>
      <h3>Total Breakout: {{ $total_breakout }}</h3>
</div>