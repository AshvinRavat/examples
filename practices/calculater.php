<html>
<head>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1> Calculator</h1>
    <div class="formstyle"
        x-data="
        {
            number:
                [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9
            ],
            answer :''
        }">
        <form name="form">
            <input  id = "calc" type="text" name="answer" :value="answer"><br>
            <template x-for="numbers in number">
                <input type="button" :value="numbers"
                 x-text="numbers"
                 @click="answer += numbers"
                >
            </template>

                          <input type = "button" id="clear" value = "Clear All" @click = "answer = '' " >
                        <input type="button" value="." @click="answer += '.' ">
            <input type="button" value="+" @click="answer += '+' ">
            <input type="button" value="-" @click="answer += '-' ">
            <input type="button" value="*" @click="answer += '*' ">
            <input type="button" value="/" @click="answer += '/' ">
            <input type="button" value="=" @click="answer = eval(answer)">
        </form>
    </div>
</body>
</html>