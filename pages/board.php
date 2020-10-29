<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>N.N Laboratory Lab - HOSEO University</title>
    <!-- Bootstrap core CSS -->
    <link href="../materials/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../materials/offcanvas.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
   <?php include("Connection.php"); ?>
    <nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">異붽� 留곹겕</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../index.html">N.N. Lab</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse" aria-expanded="true" style>
          <ul class="nav navbar-nav">
            <li class="active"><a href="../index.html">Home</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Laboratory <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="laboratory.html">About Laboratory</a></li>
                  <li><a href="member.html">Laboratory Members</a></li>
                  <!--<li class="divider"></li>
                  <li class="dropdown-header">Nav header</li>-->
                </ul>
              </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Project <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li class="dropdown-header">In Progress</li>
                  <li class="divider"></li>
                  <li class="dropdown-header">Finished</li>
                  <li><a href="attendance.html">Attendance Book</a></li>
                </ul>
              </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Communuty <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="board.php">Board</a></li>
                  <li><a href="memory.html">Memory</a></li>
                </ul>
              </li>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->

    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">�빊遺쏙옙 占쎄텢占쎌뵠占쎈뱜</button>
          </p>
          <div class="jumbotron">
            <h1>寃뚯떆�뙋</h1>
            <!--<a class="btn btn-lg btn-success" href="#" role="button">Sign up today</a>-->
          </div>
            
            <tbody style = "width:100%">
					 <?php
					 echo "<table border=1>";
					 echo "<tr>";
					 echo "<th>湲� 踰덊샇</th><th>�젣紐�</th><th>�옉�꽦�옄</th><th>�궇吏�</th><th>湲� �쑀�삎</th>";
					 echo "</tr>";
                while($rows = mysqli_fetch_assoc($ret)){ //DB�뜝�럥�뱺 �뜝�룞�삕�뜝�럩�궋�뜝�럥彛� �뜝�럥�몥�뜝�럩逾졾뜝�럡�댉 �뜝�럥�빢 (�뜝�럥�� �뼨轅명�ｅ뜝占�)
                        if($total%2==0){
        ?>                      <tr class = "even">
                        <?php   }
                        else{
        ?>                      <tr>
                        <?php } ?>
                <td width = "50" align = "center"><?php echo $total?></td>
                <td width = "500" align = "center">
                <a href = "php/view.php?NUM=<?php echo $rows['NUM']?>">
                <?php echo $rows['TITLE']?></td>
                  <td width = "100" align = "center"><?php echo $rows['NAME']?></td>
                <td width = "200" align = "center"><?php echo $rows['DT']?></td>
                <td width = "200" align = "center"><?php echo $rows['TYPE']?></td>
                </tr>
        <?php
                $total++;
                }
                mysqli_close($con);
        ?>
			</tbody>
		</table>
		
		<tr>
		<input type="button" value="湲��옉�꽦" class="pull-right" onclick="location.href='../menu3/upboard.php'"/>
		</tr>
		
          </div><!--/row-->
        </div><!--/.col-xs-12.col-sm-9-->
<br>
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
          <div class="list-group">
            <a href="https://www.hoseo.ac.kr/" class="list-group-item" target = "blank">�샇�꽌���븰援�</a>
            <a href="https://portal.hoseo.edu/" class="list-group-item" target = "blank">�샇�꽌���븰援� �룷�꽭</a>
            <a href="https://learn.hoseo.edu/" class="list-group-item" target = "blank">�샇�꽌���븰援� 釉붾옓蹂대뱶</a>
            <a href="https://www.youtube.com/channel/UCAaswb7rlk3Y1R3PfxCB5Ig" class="list-group-item" target = "blank">�븰怨� 怨듭떇 YouTube Channel</a>
            <a href="https://www.youtube.com/watch?v=VblNV_gsLd4" class="list-group-item" target = "blank">�븰怨� �솉蹂� �쁺�긽1 (2018)</a>
            <a href="https://www.youtube.com/watch?v=oZtkhvYoNbI&t=228s" class="list-group-item" target = "blank">�븰怨� �솉蹂� �쁺�긽2 (2019)</a>
            <a href="https://www.youtube.com/watch?v=gupMYwGUWWk" class="list-group-item" target = "blank">�븰怨� �솉蹂� �쁺�긽3 (2020)</a>
          </div>
        </div><!--/.sidebar-offcanvas-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>Hyeonhak Choi & Jeasong Kim</p>
        <p>&copy; Bootstrap 2014</p>
      </footer>

    </div><!--/.container-->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../materials/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../materials/offcanvas.js"></script>
  </body>
</html>