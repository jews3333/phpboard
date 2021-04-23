<? include $_SERVER['DOCUMENT_ROOT']."/head.php" ?>

    <div class="content">
        <form action="action.php" method="post" enctype="multipart/form-data">
            <table class="board-form">
                <caption></caption>
                <colgroup>
                    <col style="width:10%;"/>
                    <col />
                </colgroup>
                <tbody>
                    <tr>
                        <th>제목</th>
                        <td><input type="text" id="sj" name="sj" class="text"/></td>
                    </tr>
                    <tr>
                        <th>작성자</th>
                        <td><input type="text" id="writer" name="writer" class="text"/></td>
                    </tr>
                    <tr>
                        <th>내용</th>
                        <td><textarea id="cn" name="cn"></textarea></td>
                    </tr>
                    <tr>
                        <th>패스워드</th>
                        <td><input type="password" id="password" name="password" class="text"/></td>
                    </tr>
                    <tr>
                        <th>잠금</th>
                        <td><input type="checkbox" id="lock" name="lock" value="Y"/><label for="lock">비공개</label></td> 
                    </tr>
                    <tr>
                        <th>첨부파일</th>
                        <td><input type="file" id="file" name="file"/></td> 
                    </tr>
                <tbody>
            </table>
            <div class="btns">
                <button type="submit">작성완료</a>
            </div>
        </form>
    </div>
    
<? include $_SERVER['DOCUMENT_ROOT']."/foot.php" ?>