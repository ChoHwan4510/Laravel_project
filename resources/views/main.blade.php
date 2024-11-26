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
                <div class="items" @click="openModal(1)">
                    <h3>Nuxt js Study</h3>
                    <div>Nuxt js 관련 공부소스</div>
                </div>
                <div class="items" @click="openModal(2)">
                    <h3>Toy Project</h3>
                    <div>심심해서 만들어본것들</div>
                </div>
            </div>
        </div>
    </section>
</body>
<script>

</script>