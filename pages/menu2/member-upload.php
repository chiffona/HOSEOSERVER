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
        <caption> 프로필 작성 </caption>
    </thead>
    <tbody>
        <form action="member_result.php" method="post" encType="multiplart/form-data">
             <tr>
                <th>이름: </th>
                <td><input type="text" placeholder="이름. " name="NAME" class="form-control"/></td>
            </tr>
            
            <tr>
                <th>학년: </th>
                 <td>
                 <label><input type="checkbox" name="GRADE" value="1"> 1학년</label>
      		 	 <label><input type="checkbox" name="GRADE" value="2"> 2학년</label>
      		 	 <label><input type="checkbox" name="GRADE" value="3"> 3학년</label>
      		 	 <label><input type="checkbox" name="GRADE" value="4"> 4학년</label>
      		 	 <label><input type="checkbox" name="GRADE" value="대학원"> 대학원</label>
      		 	 </td>
            </tr>

            <tr>
                <th>핸드폰: </th>
                <td><input type="text" placeholder="휴대폰 번호 입력. " name="PHONENUM" class="form-control"/></td>
            </tr>
            <tr>
                <th>담당교수: </th>
                <td><textarea cols="text"  placeholder="교수 이름 " name="PROF" class="form-control"></textarea></td>
            </tr>
             <tr>
                <th>내용: </th>
                <td><input cols="10" rows="10"  placeholder="프로필을 입력하세요. " name="CONTENTS" class="form-control"></td>
            </tr>
            <tr>
        	<th>사진: </th>
        	<td><input type="file" id="real-input" class="image_inputType_file" name="PICTURE" accept="img/*" required multiple> 미구현 100px X 100px으로 변환 후 이메일로 보내주세요.</td>
			
        	</tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="등록" onclick="sendData()" class="pull-right"/>
                    <input type="button" value="reset" class="pull-left"/>
                    <input type="button" value="글 목록으로... " onclick="location.href='member.php'"/>
                </td>
            </tr>
        </form>
    </tbody>
</table>
</div>
</body>
</html>
