<? include $_SERVER['DOCUMENT_ROOT']."/db.php"; ?>

<? include $_SERVER['DOCUMENT_ROOT']."/head.php" ?>

    <div class="content">
        <form action="action.php" method="post">
            <table class="board">
                <caption></caption>
                <colgroup>
                    <col style="width:10%;"/>
                    <col />
                </colgroup>
                <thead>
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
                <tbody>
            </table>
            <div class="btns">
                <button type="submit">작성완료</a>
            </div>
        </form>
    </div>
    
<? include $_SERVER['DOCUMENT_ROOT']."/foot.php" ?>