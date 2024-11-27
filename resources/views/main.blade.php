<!DOCTYPE html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width. initial-scale=1.0"/>
	<title>나만의 놀이터</title>
	@vite('resources/scss/main.scss')
</head>
<body>
    <section class="main-container">
        <div class="main-wrapper">
            <h1 class="main-text">히나사랑해</h1>
            <div class="main-items-box">
                <div class="items" data-val="1">
                    <h3>Game Info</h3>
                    <div>게임소식, 게임정보</div>
                </div>
                <div class="items" data-val="2">
                    <h3>Play Ground</h3>
                    <div>간단한 웹게임</div>
                </div>
            </div>
        </div>
    </section>

    <section class="default-modal-container">
        <div class="default-modal-background"></div>
        <div class="default-modal-wrapper">
            <div class="modal-header">
                <div></div>
                <div class="modal-title-name">
                    <h1>간단한 웹게임</h1>
                </div>
                <div class="close-btn">
                    <i class="fi fi-br-cross"></i>
                </div>
            </div>
            <div class="modal-body">
                <div class="modal-items-box">
                    <div class="items">
                        <a href="#">애니메이션 단어퀴즈</a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <slot name="footer" />
            </div>
        </div>
    </section>
</body>
<script>    
    (function(){
        const main_items_dom = document.querySelectorAll(".main-items-box > .items");
        const default_modal_container_com = document.querySelector(".default-modal-container");
        const default_modal_background = document.querySelector(".default-modal-background");
        const modal_items_box = document.querySelector(".modal-items-box");
        const modal_title_name = document.querySelector(".modal-title-name");

        const game_info = [
            {title : "명조", link : "#",},
            {title : "블루아카이브", link : "#",},
        ];
        const web_game = [
            {title : "간단한 웹게임",link : "#"}
        ];

        const html_object = {
            modal_items : (acc, iter) => {
                let title = iter.title;
                let link = iter.link;
                
                let html = `
                <div class="items">
                    <a href="${link}">${title}</a>
                </div>
                `;
                return acc+=html;
            }
        };

        const event_object = () => {
            main_items_dom.forEach((btn) => {
                btn.addEventListener("click",(event) => {fn_object.main_modal_open(event)});
            });
            default_modal_background.addEventListener("click",() => {fn_object.main_modal_close()});
        };

        const fn_object = {
            //모달창 open
            main_modal_open: (e) => {
                const main_title = e.currentTarget.querySelector("h3").textContent;
                const item_type = Number(e.currentTarget.getAttribute("data-val"));
                let items_obj = {};
                switch(item_type){
                    case 1: items_obj = game_info; break;
                    case 2: items_obj = web_game; break;
                }
                if(Object.keys(items_obj).length === 0) return false;

                //모달 아이템html 생성
                let items_inner_html = items_obj.reduce(html_object.modal_items,"");

                modal_items_box.innerHTML = items_inner_html;
                modal_title_name.querySelector("h1").textContent = main_title;

                default_modal_container_com.style.display = "flex";


            },
            //모달창 close
            main_modal_close: ()=>{default_modal_container_com.style.display = "none";},
        };

        const init = () => {
            event_object();
        };
        init();
    })();

</script>