<!DOCTYPE html>
<html lang="en">
<head>
    <title> JavaScript Calculator </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1> Calculator </h1>
    <div class="formstyle">
        <form name="form1">
        <p id="history"></p>
            <input id="calc" type="text" name="answer"> <br> <br>
            <input type="button" value="1" id="1" onclick="addNumbersAndOperators(numbers = document.getElementById('1').value)">
            <input type="button" value="2" id="2" onclick="
                addNumbersAndOperators(numbers=document.getElementById('2').value)">
            <input type="button" value="3" id="3"
                onclick="addNumbersAndOperators(numbers=document.getElementById('3').value)">
            <input type="button" value="+" onclick="setEvaluation(), addNumbersAndOperators(numbers = '+')">
            <br> <br>

            <input type="button" value="4" onclick=" addNumbersAndOperators(numbers = 4)">
            <input type="button" value="5" onclick=" addNumbersAndOperators(numbers = 5)">
            <input type="button" value="6" onclick=" addNumbersAndOperators(numbers = 6)">
            <input type="button" value="-" onclick="setEvaluation(), addNumbersAndOperators(numbers = '-')">
            <br> <br>

           <input type="button" value="7" onclick=" addNumbersAndOperators(numbers = 7)">
            <input type="button" value="8" onclick=" addNumbersAndOperators(numbers = 8)">
            <input type="button" value="9" onclick=" addNumbersAndOperators(numbers = 9)">
            <input type="button" value="*" onclick="setEvaluation(), addNumbersAndOperators(numbers = '*')"">
            <br> <br>


            <input type="button" value="/" onclick="setEvaluation(), addNumbersAndOperators(numbers = '/')">
            <input type="button" value="0" onclick=" addNumbersAndOperators(numbers = 0)">
            <input type="button" value="." onclick="setEvaluation(), addNumbersAndOperators(numbers = '.')">
            <input type="button" value="x2" onclick="setEvaluation(), addNumbersAndOperators(numbers = 'x')">
            <input type="button" value="&radic;" onclick="setEvaluation(), addNumbersAndOperators(numbers = '&radic;')">
            <input type="button" value="=" onclick="getAnswer(), displayHistory()">
            <br>
            <input type="button" value="Clear All" id="clear" onclick="clearOutput();">
            <br>
        </form>
    </div>

    <script>

        var answer = '';
        var evaluationDone = false;
        const history = [];
        var histories = '';
        var square = '';
        var history1 = '';
        var history2  = '';
        var history3  = '';


        function addNumbersAndOperators(numbers) {
            if (evaluationDone && answer != '') {
                answer = '';
                document.getElementById('calc').value = '';
                evaluationDone = false;
            }

                answer += numbers;
                document.getElementById('calc').value = answer;
                histories = 1;
        }

        function getAnswer() {
            answer = document.getElementById('calc').value;

            if (answer.charAt(0).charCodeAt(0) === 8730) {
                squareRoot = answer.substring(1);
                history1  = squareRoot;
                squareRoot = Math.sqrt(squareRoot);
                answer = squareRoot;
                histories = 1;

            }
            else if (answer.charAt(answer.length - 1) == 'x') {
                square = answer.substring(0, answer.length - 1);
                history2 = answer.substring(0, answer.length - 1);
                square = square * square;
                answer = '' + square;
                histories = 2;
            }
            else {
                histories = 3;
            }
           history3 = answer;
           answer = document.getElementById('calc').value = eval(answer);
           evaluationDone = true;
        }

        function setEvaluation() {
            evaluationDone = false;
        }

        function clearOutput(){
            answer = '';
            document.getElementById('calc').value = '';
            document.getElementById('history').innerHTML = " ";
            history = '';
        }

        function displayHistory() {

            if (histories == 1) {
                history.push('&radic;' +  history1 + '=' + answer);
            }
            else if (histories == 2) {
                history.push(history2 + '*' + history2 + '=' + square);
            }
            else {
                history.push(history3 + '=' + answer);
            }

            histories = '';
            document.getElementById('history').innerHTML = history;
        }
    </script>
</body>
</html>