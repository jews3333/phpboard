<? include $_SERVER['DOCUMENT_ROOT']."/head.php" ?>

    <script>

        var overlap_check = false;

        function overlapCheckHandler(){
            if(signForm.id.value == ""){
                alert("아이디를 입력하세요");
                return false;
            }
            $.ajax({
                url:"./overlap_check.php",
                type:"post",
                data:{
                    'id' : signForm.id.value
                },
                success: function(result){
                    if(result.trim() == 'OK'){
                        overlap_check = true;
                        alert("사용가능한 아이디입니다.");
                    } else {
                        overlap_check = false;
                        alert("중복된 아이디입니다.");
                    }
                }
            });
        }

        function refreshCaptchaHandler(){
            document.getElementById("captcha").src = "./captcha.php?waste="+Math.random();
        }

        document.addEventListener("DOMContentLoaded", function(){
            signForm.onsubmit = function(e){
                if(!overlap_check){
                    alert("아이디 중복확인을 받지 않았습니다.");
                    return false;
                }
            }
        });
    </script>

    <div class="content">
        <form action="signup_action.php" method="post" name="signForm">
            <table class="sign-form">
                <caption></caption>
                <colgroup>
                    <col style="width:10%;"/>
                    <col />
                </colgroup>
                <tbody>
                    <tr>
                        <th>아이디</th>
                        <td><input type="text" name="id" class="text"/><a href="javascript:overlapCheckHandler();">중복체크</a></td>
                    </tr>
                    <tr>
                        <th>패스워드</th>
                        <td><input type="password" name="password" class="text"/></td>
                    </tr>
                    <tr>
                        <th>이름</th>
                        <td><input type="text" name="name" class="text"/></td>
                    </tr>
                    <tr>
                        <th>주소</th>
                        <td><input type="text" name="address" class="text"/></td> 
                    </tr>
                    <tr>
                        <th>성별</th>
                        <td>
                            <input type="radio" id="gender1" name="gender" value="1"/>
                            <label for="gender1">남자</label>
                            <input type="radio" id="gender2" name="gender" value="2"/>
                            <label for="gender2">여자</label>
                        </td> 
                    </tr>
                    <tr>
                        <th>이메일</th>
                        <td>
                            <input type="text" name="email1" class="text"/>
                            @
                            <input type="text" name="email2" class="text"/>
                        </td> 
                    </tr>
                    <tr>
                        <th>자동가입방지</th>
                        <td>
                            <img src="./captcha.php" alt="" id="captcha">
                            <input type="text" name="captcha" class="text"/>
                            <a href="javascript:refreshCaptchaHandler();">변경</a>
                        </td> 
                    </tr>
                <tbody>
            </table>
            <div class="btns">
                <button type="submit">가입하기</a>
            </div>
        </form>
    </div>
    
<? include $_SERVER['DOCUMENT_ROOT']."/foot.php" ?>