<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Write something else you want</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
 
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
<table class="table table-bordered">
    <thead>
        <caption> 글쓰기장 </caption>
    <tbody>
        <form action="insert_result.php" method="post" encType="multiplart/form-data">
            
            
             <tr>
                <th>닉네임: </th>
                <td><input type="text" placeholder="닉네임. " name="NAME" class="form-control"/></td>
            </tr>
            
            <tr>
                <th>제목: </th>
                <td><input type="text" placeholder="제목을 입력하세요. " name="TITLE" class="form-control"/></td>
            </tr>
            <tr>
                <th>내용: </th>
                <td><textarea cols="10"  placeholder="내용을 입력하세요. " name="CONTENT" class="form-control"></textarea></td>
            </tr>
            
             <tr>
                <th>글 유형: </th>
                 <td>
                 <label><input type="checkbox" name="TYPE" value="QNA"> QNA</label>
      		 	 <label><input type="checkbox" name="TYPE" value="FREE"> FREE</label>
      		 	 <label><input type="checkbox" name="TYPE" value="NOTICE"> NOTICE</label>
      		 	 </td>
            </tr>
            
            <tr>
                <td colspan="2">
                    <input type="submit" value="등록" onclick="sendData()" class="pull-right"/>
                    <input type="button" value="reset" class="pull-left"/>
                    <input type="button" value="글 목록으로... " class="pull-right" onclick="location.href='./Content.php'"/>
                  
                </td>
            </tr>
           
    </tbody>
</table>
</div>
</body>
</html>
