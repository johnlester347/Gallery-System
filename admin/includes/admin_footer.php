  </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>

    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Views',     <?php echo $session->count; ?>],
          ['Photo',  <?php echo $photo_count = Photo::count_all(); ?>],
          ['Users',  <?php echo $users_count = User::count_all(); ?>],
          ['Comment', <?php echo $comment_count = Comment::count_all(); ?>]
        ]);

        var options = {
          legend: 'none',
          pieSliceText: 'label',
          title: 'Gallery System Daily Activities',
          backgroundColor: 'transparent'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Views',  <?php echo $session->count; ?>],
          ['Photo',  <?php echo $photo_count = Photo::count_all();?>],
          ['Users',  <?php echo $users_count = User::count_all();?>],
          ['Comment', <?php echo $comment_count = Comment::count_all();?>]
        ]);

        var options = {
          title: 'My Daily Activities',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
    
</body>

</html>
