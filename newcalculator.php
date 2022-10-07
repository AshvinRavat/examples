<!DOCTYPE html>
<html>
<head>
    <title>Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Calculator</h1>
    <div class="formstyle">
        <div id="history"></div>
        <form name="form">
            <input id="calc" type="text" name="answer"
                oninput="clearInputBoxOnEvolution();"
            >
            <div id="buttons"></div>
        </form>
        <input type="button" value="Clear All" id="clear"
            onclick="clearInputBoxAndHistory()"
        >
    </div>

    <script>
        var numbers = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
        var operators = ['+', '-', '*', '/', "&radic;", "x2", '%', '='];
        var inputBoxValue = '';
        var inputBox = document.getElementById("calc");
        var evaluationDone = false;
        var calculationHistory = [];

        for (i=0; i < numbers.length; i++) {
            numberButtons = document.createElement("button");
            numberButtons.innerHTML = numbers[i];
            numberButtons.setAttribute("value", i);
            numberButtons.setAttribute("onclick", 'addNumbersToInputBox(numberButtonValue = value)');
            numberButtons.setAttribute("type", "button");
            document.getElementById("buttons").appendChild(numberButtons);
        }

        for (i=0; i < operators.length; i++) {
            operatorButtons = document.createElement("button");
            operatorButtons.setAttribute("type", "button");
            operatorButtons.innerHTML = operators[i];
            operatorButtons.setAttribute("value", operators[i]);
            operatorButtons.setAttribute("onclick", 'addOperatorsToInputBox(operatorButtonValue = value)');
            if (operators[i] === '=') {
                operatorButtons.setAttribute("onclick", 'getInputBoxValueAndDisplayAnswerAndHistory()');
            }
            document.getElementById("buttons").appendChild(operatorButtons);
        }

        function addNumbersToInputBox(numberButtonValue) {
            if (evaluationDone) {
                document.getElementById('calc').value = '';
                evaluationDone = false;
            }
            inputBoxValue = document.getElementById('calc').value += numberButtonValue;
        }

        function addOperatorsToInputBox(operatorButtonValue) {
            if (operatorButtonValue === '=') {
                operatorButtonValue = '';
            }
            if (operatorButtonValue == '&radic;') {
                operatorButtonValue = "√";
            }
            if (operatorButtonValue == 'x2') {
                operatorButtonValue = "x";
            }
            inputBoxValue = document.getElementById('calc').value += operatorButtonValue;
            evaluationDone = false;
        }

        inputBox.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                getInputBoxValueAndDisplayAnswerAndHistory();
            }
        });

        function getInputBoxValueAndDisplayAnswerAndHistory() {
            inputBoxValue = document.getElementById('calc').value;
            getinputBoxValueForPercentage = inputBoxValue.replace('%', '/100');

            if (inputBoxValue.charAt(0) == '√') {
                removeRadicCharcter = inputBoxValue.substring(1);
                squareRootAnswer = Math.sqrt(removeRadicCharcter);
                calculationAnswer = squareRootAnswer;
                calculationHistory.push(inputBoxValue + '=' + calculationAnswer + "<br>");
             }
            else if (inputBoxValue.charAt(inputBoxValue.length - 1) == 'x') {
                removeXsquare = inputBoxValue.substring(0, inputBoxValue.length - 1);
                squareAnswer = removeXsquare * removeXsquare;
                calculationAnswer = squareAnswer;
                calculationHistory.push(inputBoxValue + '=' + calculationAnswer);
            }
            else if (getinputBoxValueForPercentage) {
                calculationAnswer = eval(getinputBoxValueForPercentage);
                calculationHistory.push(inputBoxValue + '=' + calculationAnswer);
            }
            else {
                calculationAnswer = eval(inputBoxValue);
                calculationHistory.push(inputBoxValue + '=' + calculationAnswer + "<br>");
            }
            evaluationDone = true;
            document.getElementById('calc').value = calculationAnswer;
            document.getElementById('history').innerHTML = "<p>" + calculationHistory + "</p> <br>";
        }

        function clearInputBoxOnEvolution() {
            if (evaluationDone) {
                inputBoxValue = document.getElementById('calc').value;
                    checkInputBoxValue = document.getElementById('calc').value.
                    charAt(inputBoxValue.length -1
                );

               for (i=0; i < operators.length; i++) {
                    if (operators[i] === checkInputBoxValue
                        && evaluationDone) {
                        evaluationDone = false;
                        return;
                    }

                    else if (evaluationDone) {
                        document.getElementById('calc').value = checkInputBoxValue;
                        evaluationDone = false;
                        return;
                    }
               }
            }
        }

       function clearInputBoxAndHistory() {
            document.getElementById('calc').value = '';
            document.getElementById('history').innerHTML = '';
        }
    </script>
</body>
</html>