<? include $_SERVER['DOCUMENT_ROOT']."/db.php"; ?>

<? include $_SERVER['DOCUMENT_ROOT']."/head.php" ?>

    <div class="content">
        <table class="board">
            <caption></caption>
            <colgroup>
                <col style="width:10;"/>
                <col style="width:70%;"/>
                <col />
            </colgroup>
            <thead>
                <tr>
                    <th>번호</th>
                    <th>제목</th>
                    <th>날짜</th>
                </tr>
            </thead>
            <tbody>
                <?
                    $sql = mq("select * from ts_board order by NO desc");
                    while($board = $sql->fetch_array()){
                        $title = $board["SJ"];
                        if(strlen($title)>30){
                            $title = str_replace($board["SJ"],mb_substr($board["SJ"],0,30,"utf-8")."...",$board["SJ"]);
                        }
                ?>
                <tr>
                    <td><? echo $board["NO"] ?></td>
                    <td class="title"><a href=""><? echo $board["SJ"] ?></a></td>
                    <td><? echo $board["CREATE_DATE"] ?></td>
                </tr>
                <? } ?>
            <tbody>
        </table>
        <div class="btns">
            <a href="/page/board/write.php">글작성</a>
        </div>
    </div>

    <!-- Google 번역 -->
    <!-- <div id="google_translate_element" class="hd_lang"></div>
    <script>
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'ko',
                includedLanguages: 'en,ko,zh-CN,zh-TW,ja',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                autoDisplay: false
            }, 'google_translate_element');
        }
    </script>
    <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> -->
    <!-- //Google 번역 -->
    
<? include $_SERVER['DOCUMENT_ROOT']."/foot.php" ?>