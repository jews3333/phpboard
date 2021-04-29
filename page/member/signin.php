<? include $_SERVER['DOCUMENT_ROOT']."/head.php" ?>

    
    <div class="content">
        <form action="signin_action.php" method="post" name="signForm">
            <table class="sign-form">
                <caption></caption>
                <colgroup>
                    <col style="width:10%;"/>
                    <col />
                </colgroup>
                <tbody>
                    <tr>
                        <th>아이디</th>
                        <td><input type="text" name="id" class="text"/></td>
                    </tr>
                    <tr>
                        <th>패스워드</th>
                        <td><input type="password" name="password" class="text"/></td>
                    </tr>
                <tbody>
            </table>
            <div class="btns">
                <button type="submit">로그인</a>
            </div>
        </form>
    </div>
    
<? include $_SERVER['DOCUMENT_ROOT']."/foot.php" ?>