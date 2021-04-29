<? include $_SERVER['DOCUMENT_ROOT']."/head.php" ?>

    <script>
        function passwordPopupHandler(no){
            var popup = document.getElementById("passwordCheckPopup");
            popup.style.display = "block";

            var submit = popup.querySelector("button[type='submit']");
            submit.addEventListener("click", function(){
                var password = popup.querySelector("#password").value;
                $.ajax({
                    url: '/page/board/view_lock.php',
                    data: {
                        no: no,
                        password: password
                    },
                    type: 'POST',
                    dataType: 'json',
                    success: function(result){
                        if(result.check){
                            location.href = "/page/board/view.php?no="+no;
                        } else {
                            alert("패스트워 틀림");
                        }
                    },
                    error: function(error){
                        console.log(error);
                    }
                });
            });
            
        }
    </script>

    <?
        if(isset($_GET['catgo'])){
            $catagory = $_GET['catgo'];
        } else {
            $catagory = "SJ";
        }

        if(isset($_GET['search'])){
            $search = $_GET['search'];
        }
        
    ?>

    <div class="content">
        <div id="board-search">
            <form action="./" method="get">
                <div class="row">
                    <dl class="cell">
                        <dt>검색</dt>
                        <dd>
                            <select name="catgo">
                                <option value="SJ" <? if($catagory == "SJ"){ ?>selected<? } ?>>제목</option>
                                <option value="WRITER" <? if($catagory == "WRITER"){ ?>selected<? } ?>>글쓴이</option>
                                <option value="CN" <? if($catagory == "CN"){ ?>selected<? } ?>>내용</option>
                            </select>
                            <input type="text" class="text" name="search" require="required"/>
                            <button>검색</button>
                        </dd>
                    </dl>
                </div>
            </form>
        </div>
        <?
            if(isset($_GET['search'])){
        ?>
        <div id="search-text">
            <p>'<? echo $search ?>' 검색 결과</p>
        </div>
        <?
            }
        ?>
        <table class="board-list">
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
                    if(isset($_GET['page'])){
                        $page = $_GET['page'];
                    } else {
                        $page = 1;
                    }

                    if(isset($_GET['search'])){
                        $sql = mq("select * from ts_board where $catagory like '%$search%'");
                    } else {
                        $sql = mq("select * from ts_board");
                    }
                    

                    $row_num = mysqli_num_rows($sql);
                    $list = 5;
                    $block_count = 5;

                    $block_num = ceil($page/$block_count);
                    $block_start = (($block_num - 1) * $block_count) + 1;
                    $block_end = $block_start + $block_count - 1;

                    $total_page = ceil($row_num/$list);
                    
                    if($block_end > $total_page){
                        $block_end = $total_page;
                    }
                    $total_block = ceil($total_page/$block_count);
                    $start_num = ($page - 1) * $list;

                    if(isset($_GET['search'])){
                        $sql2 = mq("select * from ts_board where $catagory like '%$search%' order by NO desc limit $start_num, $list");
                    } else {
                        $sql2 = mq("select * from ts_board order by NO desc limit $start_num, $list");
                    }

                    while($board = $sql2->fetch_array()){
                        $title = $board["SJ"];
                        if(strlen($title)>30){
                            $title = str_replace($board["SJ"],mb_substr($board["SJ"],0,30,"utf-8")."...",$board["SJ"]);
                        }
                ?>
                <tr>
                    <td><? echo $board["NO"] ?></td>
                    <td class="title">
                        <? if($board["LOCK_YN"] == "N"){
                            
                            $date = date('Y-m-d', strtotime($board['CREATE_DATE']));
                            $now = date('Y-m-d');  
                            $new = "";  

                            if($date == $now){
                                $new = "<span>NEW</span>";
                            }
                        ?>
                            <a href="/page/board/view.php?no=<? echo $board["NO"] ?>"><? echo $new ?><? echo $board["SJ"] ?></a>
                        <? } else { 
                        ?>
                            <a href="javascript:passwordPopupHandler(<? echo $board["NO"] ?>);"><? echo $board["SJ"] ?></a>
                        <? } ?>
                    </td>
                    <td><? echo date('Y-m-d', strtotime($board['CREATE_DATE'])) ?></td>
                </tr>
                <? } ?>
            <tbody>
        </table>

        <div id="pagination">
            <?
                if($page <= 1){
                    echo "<a href='#none'>&lt;&lt;</a>";
                } else {
                    echo "<a href='?page=1'>&lt;&lt;</a>";
                }

                if($page <= 1){

                } else {
                    $prev = $page-1;
                    echo "<a href='?page=$prev'>&lt;</a>";
                }

                for($i=$block_start; $i<=$block_end; $i++){
                    if($page == $i){
                        echo "<a href='#none' class='active'>$i</a>";
                    } else {
                        echo "<a href='?page=$i'>$i</a>";
                    }
                }

                if($block_num >= $total_block){

                } else {
                    $next = $page + 1;
                    echo "<a href='?page=$next'>&gt;</a>";
                }

                if($page >= $total_page){
                    echo "<a href='#none'>&gt;&gt;</a>";
                } else {
                    echo "<a href='?page=$total_page'>&gt;&gt;</a>";
                }
            ?>
        </div>

        <div class="btns">
            <a href="/page/board/write.php">글작성</a>
        </div>
    </div>

    <div id="passwordCheckPopup">
        <input type="password" id="password" name="password" class="text"/>
        <button type="submit">입력</a>
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